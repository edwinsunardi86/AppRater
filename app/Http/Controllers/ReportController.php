<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReportModel;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    function report_weekly(){
        return view('report.report_weekly',[
            'title' => 'Report Weekly',
            'active_gm' => 'Report',
            'active_m'=>'report/report_weekly'
        ]);
    }

    function getDataProjectCurrentEvaluation(Request $request){
        $query = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select('setup_project.project_code','setup_project.project_name','service_name',DB::Raw('AVG(score) AS score'),DB::Raw('DATE_FORMAT(appraisal_date,"%m") AS MONTH'),'m_client.client_name',DB::Raw('setup_location.id AS location_id'),'location_name','m_service.service_code')
        ->where(['m_client.id'=>$request->client_id,'setup_project.project_code'=>$request->project_code])
        ->whereRaw('YEAR(appraisal_date) = DATE_FORMAT(NOW(),"%Y")')
        ->groupBy('setup_project.project_code')
        ->groupBy('m_service.service_code')
        ->groupBy('setup_location.id')
        ->groupByRaw('DATE_FORMAT(appraisal_date,"%m")')
        ->get();
        // var_dump($query);
        $groupLocation = $query->groupBy('location_id');
        $location = array();
        foreach($groupLocation as $row){
            array_push($location,array('location_id'=>$row[0]->location_id,'location_name'=>$row[0]->location_name));
        }
        return response()->json(array('location'=>$location,'data'=>$query));
    }

    function report_score_per_location(Request $request){
        $get_m_service = DB::table('m_service')->orderBy('service_code','desc');
        return view('report.view_report_score_per_location',[
            'title' => 'Report Score Per Location',
            'active_gm' => 'Report',
            'active_m'=>'report/reportScorePerLocation',
            'service'=>$get_m_service->get()
        ]);
    }

    function get_data_score_per_location(Request $request){
        $data = ReportModel::getDataScorePerLocation($request->project_code,$request->location_id,$request->month,$request->year);
        return response()->json($data);
    }

    function downloadPDFReportScorePerLocation($project_code,$location_id,$month,$year){
        $data = ReportModel::getDataScorePerLocation($project_code,$location_id,$month,$year);
        $first_date_sql = date_create($year.'-'.$month.'-01');
        $first_date = date_format($first_date_sql,'D, M 1 '.$year);
        $find_last_date = date('Y-m-t',strtotime($year.'-'.$month.'-01'));
        $last_date_sql = date_create($find_last_date);
        $last_date = date_format($last_date_sql,'D, M 1 '.$year);
        $first_week = date("W", strtotime($year.'-'.$month.'-01'));
        $last_week = date("W", strtotime($find_last_date));
        
        $sql_work_day = "SELECT (DATEDIFF('$find_last_date','$year-$month-01'))-((WEEK('$find_last_date')-WEEK('$year-$month-01'))*2) - (CASE WHEN WEEKDAY('$find_last_date') = 6 THEN 1 ELSE 0 END) - (CASE WHEN WEEKDAY('$find_last_date') = 5 THEN 1 ELSE 0 END) AS work_day";
        $work_days = DB::select($sql_work_day);

        $query_avg_score = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->select(DB::Raw('AVG(score) AS score'),'m_client.client_name')
        ->where('setup_project.project_code',$project_code)
        ->first();

        $approval = ReportModel::getDataPICnCLientPerPeriodProject($project_code,$location_id,$month,$year);
        // $approval->clie
        // var_dump($approval); die();
        // echo $approval[0]->sign_client; die();
        if($query_avg_score->score >= 74){
            $rating = 'KB';
        }elseif($query_avg_score->score >= 89 ){
            $rating = 'B';
        }elseif($query_avg_score->score >= 95){
            $rating = 'CB';
        }elseif($query_avg_score->score == 100){
            $rating = 'SB';
        }

        $datetime_client = date_create($approval[0]->sign_date_client);
        $date_client = date_format($datetime_client,'d F Y');
        $pdf = PDF::loadView('pdf.documentScoreSatisfaction',[
            'query'                 =>  $data,
            'year'                  =>  $year,
            'month'                 =>  $month,
            'first_date'            =>  $first_date,
            'last_date'             =>  $last_date,
            'first_week'            =>  $first_week,
            'last_week'             =>  $last_week,
            'work_days'             =>  $work_days,
            'avg_score_location'    =>  $query_avg_score,
            'rating'                =>  $rating,
            'user_client'           =>  $approval[0]->nama_user_client,
            'user_pic'              =>  $approval[0]->nama_user_pic,
            'sign_client'           =>  $approval[0]->sign_client,
            'date_client'           =>  $date_client
        ]);
        //return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }

    function approvalByClient(Request $request){
        $get_sign_approval = DB::table('sign_approval')
        ->join('usersauthority','usersauthority.user_id','=','sign_approval.client')
        ->join('users','users.id','=','usersauthority.user_id')
        ->join('setup_location','setup_location.id','=','sign_approval.location_id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        // ->where('usersauthority.location_id',$request->location_id)
        // ->where('period_project',$request->month.'-'.$request->year)
        ->get();
        if($get_sign_approval->count() > 0){
            $confirmation = ['title'=>'Warning!','message' => 'Project'.$get_sign_approval[0]->project_name.'dengan periode '.$request->month.'-'.$request->year.' sudah diapprove oleh'.$get_sign_approval[0]->fullname, 'icon' => 'error'];
        }else{
            $post = array(
                'client'            =>  Auth::user()->id,
                'location_id'       =>  $request->location_id,
                'period_project'    =>  $request->month.'-'.$request->year,
                'sign_date_client'  =>  date("Y-m-d H:i:s")
            );
            DB::table('sign_approval')->insert($post);
            $confirmation = ['title'=>'Warning!','message' => 'Project ini dengan periode '.$request->month.'-'.$request->year.' success approve', 'icon' => 'success'];
        }
        // var_dump($get_sign_approval); die();
        return response()->json($confirmation);
    }
}
