<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $query = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select('m_service.service_code','m_service.service_name','setup_sub_area.sub_area_name',DB::Raw('IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 1 THEN score END),0) AS score_week1,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 2 THEN score END),0) AS score_week2,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 3 THEN score END),0) AS score_week3,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 4 THEN score END),0) AS score_week4,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 5 THEN score END),0) AS score_week5,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 6 THEN score END),0) AS score_week6'))
        ->where('setup_project.project_code',$request->project_code)
        ->whereRaw("MONTH(appraisal_date) = '".$request->month."' AND YEAR(appraisal_date) = '".$request->year."' AND setup_location.id = '".$request->location_id."'")
        ->groupBy("setup_sub_area.id")
        ->get();
        return response()->json($query);
    }

    function downloadPDFReportScorePerLocation($project_code,$location_id,$month,$year){
        $query = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select('m_service.service_code','m_service.service_name','setup_sub_area.sub_area_name',DB::Raw('IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 1 THEN score END),0) AS score_week1,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 2 THEN score END),0) AS score_week2,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 3 THEN score END),0) AS score_week3,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 4 THEN score END),0) AS score_week4,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 5 THEN score END),0) AS score_week5,
        IFNULL(AVG(CASE WHEN(WEEK(appraisal_date) - WEEK(DATE_FORMAT(appraisal_date,"%Y-%m-01")))+1 = 6 THEN score END),0) AS score_week6'))
        ->where('setup_project.project_code',$project_code)
        ->whereRaw("MONTH(appraisal_date) = '".$month."' AND YEAR(appraisal_date) = '".$year."' AND setup_location.id = '".$location_id."'")
        ->groupBy("setup_sub_area.id")
        ->get();
        $pdf = PDF::loadView('pdf.documentScoreSatisfaction',[
            'query'=>$query
        ]);
        return $pdf->download('invoice.pdf');
    }
}
