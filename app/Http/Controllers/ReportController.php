<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReportModel;
use App\Models\User;
use App\Models\DatabaseModel;
use Illuminate\Support\Facades\Auth;
use App\Mail\NotificationSignReport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;
use PhpOffice\PhpSpreadsheet\IOFactory as IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yajra\DataTables\DataTables as DataTables;
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

    function approvalSignReportScoreMonthly(Request $request){
        $data = ReportModel::getDataScoreMonthlyPerLocation($request->project_code,$request->location_id,$request->month,$request->year,$request->service_code);
            $avgSatisfactionPerService = ReportModel::getDataScoreMonthlyPerLocationGroupService($request->project_code,$request->location_id,$request->month,$request->year);
            $avg_satisfaction = ReportModel::average_satisfaction($request->project_code,$request->month,$request->year,$request->location_id,$request->service_code);
            $rating = ReportModel::getScoreM($request->project_code,$request->month,$request->year,$avg_satisfaction->score);
            $getListCategoryPerPeriod = ReportModel::getListCategoryPerPeriodDate($request->project_code,$request->month,$request->year);
            $service = ReportModel::getDataService(array('service_code'=>$request->service_code))->first();
        if($data->count() > 0){
            $arr_category = array();
            foreach($getListCategoryPerPeriod as $row){
                array_push($arr_category,array('score'=>$row->score,'category'=>$row->initial));
            } 
            $pdf = PDF::loadView('pdf.documentScoreSatisfaction',[
                'project_code'      => $request->project_code,
                'month'             => $request->month,
                'year'              => $request->year,
                'service_name'      => $service->service_name,
                'project_name'      => $avg_satisfaction->project_name,
                'location_name'     => $avg_satisfaction->location_name,
                'service'           => $avgSatisfactionPerService,
                'signature_client'  => $request->signature,
                'date_sign_client'  => date("j-F-Y"),
                'data'              => $data,
                'rating'            => $rating->initial,
                'avg_satisfaction'  => $avg_satisfaction,
                'arr_category'      =>  $arr_category
                ]
            );
            $period = $request->month."-".$request->year;
            $getAlreadySignReport = ReportModel::getAlreadySignReport($request->location_id,$period,$request->service_code);
            $subject = "Report Bulanan Penilaian SLA ".$avg_satisfaction->location_name." ".$request->month."-".$request->year;
            $detail['project_name'] = $avg_satisfaction->project_name;
            $detail['location_name'] = $avg_satisfaction->location_name;
            $detail['period'] = $request->month." - ".$request->year;
            $detail['inputer'] = Auth::user()->fullname;
            $getUser = User::getUser(array('role'=>2))->get();
            if($getAlreadySignReport){
                // return response()->download(public_path('storage/report/'.$getAlreadySignReport->filename));
                $path = 'public/report/'.$getAlreadySignReport->filename;
                foreach($getUser as $row){
                    Mail::to([$row->email,Auth::user()->email])->send(new NotificationSignReport($row->email,$row->fullname,$detail['location_name'],$detail['period'],$subject,$detail,$getAlreadySignReport->filename,$path));
                }
                $confirmation = ['title'=>'Warning!','message' => 'You have already sign', 'icon' => 'error'];
            }else{
                // $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                // $pdf = public_path($filename);
                $content = $pdf->download()->getOriginalContent();
                $filename = "ReportScoreMonthly".$request->month."-".$request->year."_".$avg_satisfaction->location_name."_".$request->service_code;
                Storage::put('public/report/'.$filename.".pdf",$content);
                $pdf->save(public_path().'/'.$filename);
                $path = 'public/report/'.$filename.".pdf";
                foreach($getUser as $row){
                    Mail::to([$row->email,Auth::user()->email])->send(new NotificationSignReport($row->email,$row->fullname,$detail['location_name'],$detail['period'],$subject,$detail,$filename.".pdf",$path));
                    // Mail::to([$row->email])->send(new NotificationSignReport($row->email,$row->fullname,$detail['location_name'],$detail['period'],$subject,$detail,$filename.".pdf",$path));
                }
                $post_sign = array(
                    'location_id'   =>  $request->location_id,
                    'service_code'  => $request->service_code,
                    'period'        =>  $request->month."-".$request->year,
                    'filename'      => $filename.".pdf",
                    'created_by'    => Auth::id()
                );
                ReportModel::insertLogSignReport($post_sign);
                $confirmation = ['title'=>'Warning!','message' => 'Thanks for your sign, this report will send automaticaly to our email', 'icon' => 'success'];
                // return response()->download($pdf);
            }
        }else{
            $confirmation = ['title'=>'Warning!','message' => 'There are no data input SLA', 'icon' => 'error'];
        }
        return response()->json($confirmation);
    }

    function approvalByClient(Request $request){
        $get_sign_approval = DB::table('sign_approval')
        ->join('usersauthority','usersauthority.user_id','=','sign_approval.client')
        ->join('users','users.id','=','usersauthority.user_id')
        ->join('setup_location','setup_location.id','=','sign_approval.location_id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->get();
        if($get_sign_approval->count() > 0){
            $confirmation = ['title'=>'Warning!','message' => 'Project'.$get_sign_approval[0]->project_name.'dengan periode '.$request->month.'-'.$request->year.' sudah diapprove oleh'.$get_sign_approval[0]->fullname, 'icon' => 'error'];
        }else{
            $post = array(
                'client'            =>  Auth::user()->id,
                'location_id'       =>  $request->location_id,
                'period_project'    =>  $request->month.'-'.$request->year,
                'sign_date_client'  =>  date("Y-m-d H:i:s"),
                'created_by'        => Auth::id()
            );
            DB::table('sign_approval')->insert($post);
            $confirmation = ['title'=>'Warning!','message' => 'Project ini dengan periode '.$request->month.'-'.$request->year.' success approve', 'icon' => 'success'];
        }
        return response()->json($confirmation);
    }

    function reportScoreMonthlyPerLocation(){
        $get_m_service = DB::table('m_service')->orderBy('service_code','desc');
        return view('report.reportScoreMonthlyPerLocation',[
            'title' => 'Score Monthly Per Location',
            'active_gm' => 'Report',
            'active_m'=>'report/reportScoreMonthlyPerLocation',
            'service'=>$get_m_service->get()
        ]);
    }

    function getDataScoreMonthlyPerLocation(Request $request){
        $data_score = ReportModel::getDataScoreMonthlyPerLocation($request->project_code,$request->location_id,$request->month,$request->year,$request->service_code);
        $avg_satisfaction = ReportModel::average_satisfaction($request->project_code,$request->month,$request->year,$request->location_id,$request->service_code);
        $data = array('data_score'=>$data_score,'avg'=>$avg_satisfaction);
        return response()->json($data);
    }

    function getCategory(Request $request){
        $getCategory = ReportModel::getScoreM($request->project_code,$request->month,$request->year,$request->score);
        return response()->json($getCategory);
    }

    function getCategory_var2(Request $request){
        $getCategory = ReportModel::getScoreM_var2($request->project_code,$request->month,$request->year,$request->score);
        return response()->json($getCategory);
    }

    public function getInputRateMonthlyPerLocation(Request $request){
        $getData = ReportModel::checkExistingInputRateMonthlyPerLocation($request->project_code,$request->year_project);
        return response()->json($getData);
    }

    public function getInputrateMonthlyPercentageByMonth(Request $request){
        $getData = ReportModel::checkExistingInputRatePercentageByMonth($request->project_code,$request->month_project,$request->year_project);
        return response()->json($getData);
    }

    public function getInputRatePeriodYearPerProject(Request $request){
        $getData = ReportModel::checkExistingInputRateGroupYear($request->project_code);
        return response()->json($getData);
    }

    public function getSignReportPeriodYearOfProject(Request $request){
        $getData = ReportModel::checkExistingSignRateMonthlyPerLocation($request->project_code,$request->year_project);
        return response()->json($getData);
    }

    public function chartProgressInputSLA(){
        return view('report.chart_progress_input_sla',[
            'title' => 'Chart Progress Input SLA By Month',
            'active_gm' => 'Report',
            'active_m'=> 'report/chartProgressInputSLA'
        ]);
    }

    public function exportProgressInputRateArea(Request $request){
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Report Progress Input Rate SLA');
        $activeWorksheet->setCellValue('A4','Location Name')
                        ->setCellValue('B4','Jan')
                        ->setCellValue('C4','Feb')
                        ->setCellValue('D4','Mar')
                        ->setCellValue('E4','Apr')
                        ->setCellValue('F4','May')
                        ->setCellValue('G4','Jun')
                        ->setCellValue('H4','Jul')
                        ->setCellValue('I4','Aug')
                        ->setCellValue('J4','Sep')
                        ->setCellValue('K4','Oct')
                        ->setCellValue('L4','Nov')
                        ->setCellValue('M4','Dec');
        $getData = ReportModel::checkExistingInputRateMonthlyPerLocation($request->project_code,$request->year_project);
        $i = 5;
        foreach($getData as $row){
            $activeWorksheet->setCellValue('A'.$i,$row->location_name);
            $activeWorksheet->setCellValue('B'.$i,$row->Jan);
            $activeWorksheet->setCellValue('C'.$i,$row->Feb);
            $activeWorksheet->setCellValue('D'.$i,$row->Mar);
            $activeWorksheet->setCellValue('E'.$i,$row->Apr);
            $activeWorksheet->setCellValue('F'.$i,$row->May);
            $activeWorksheet->setCellValue('G'.$i,$row->Jun);
            $activeWorksheet->setCellValue('H'.$i,$row->Jul);
            $activeWorksheet->setCellValue('I'.$i,$row->Aug);
            $activeWorksheet->setCellValue('J'.$i,$row->Sep);
            $activeWorksheet->setCellValue('K'.$i,$row->Oct);
            $activeWorksheet->setCellValue('L'.$i,$row->Nov);
            $activeWorksheet->setCellValue('M'.$i,$row->Dec);
            $i++;
        }

        $spreadsheet->createSheet();
        $sheet2 = $spreadsheet->getSheet(1);
        $sheet2->setCellValue('A1','Report Check Existing Sign report');
        $sheet2->setCellValue('A4','Location Name')
                        ->setCellValue('B4','Jan')
                        ->setCellValue('C4','Feb')
                        ->setCellValue('D4','Mar')
                        ->setCellValue('E4','Apr')
                        ->setCellValue('F4','May')
                        ->setCellValue('G4','Jun')
                        ->setCellValue('H4','Jul')
                        ->setCellValue('I4','Aug')
                        ->setCellValue('J4','Sep')
                        ->setCellValue('K4','Oct')
                        ->setCellValue('L4','Nov')
                        ->setCellValue('M4','Dec');
        $getData = ReportModel::checkExistingSignRateMonthlyPerLocation($request->project_code,$request->year_project);
        $i = 5;
        foreach($getData as $row){
            $sheet2->setCellValue('A'.$i,$row->location_name)
            ->setCellValue('B'.$i,$row->Jan."(".$row->service_jan.")")
            ->setCellValue('C'.$i,$row->Feb."(".$row->service_feb.")")
            ->setCellValue('D'.$i,$row->Mar."(".$row->service_mar.")")
            ->setCellValue('E'.$i,$row->Apr."(".$row->service_apr.")")
            ->setCellValue('F'.$i,$row->May."(".$row->service_may.")")
            ->setCellValue('G'.$i,$row->Jun."(".$row->service_jun.")")
            ->setCellValue('H'.$i,$row->Jul."(".$row->service_jul.")")
            ->setCellValue('I'.$i,$row->Aug."(".$row->service_aug.")")
            ->setCellValue('J'.$i,$row->Sep."(".$row->service_sep.")")
            ->setCellValue('K'.$i,$row->Oct."(".$row->service_oct.")")
            ->setCellValue('L'.$i,$row->Nov."(".$row->service_nov.")")
            ->setCellValue('M'.$i,$row->Dec."(".$row->service_dec.")");
            $i++;
        }
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    function log_sign_report(){
        return view('report.report_log_sign',[
            'title' => 'Report Log Sign',
            'active_gm' => 'Report',
            'active_m'=>'report/log_sign_report'
        ]);
    }

    function getDataTableSignReport(){
        $getData = ReportModel::getDataLogSignReport();
        return DataTables::of($getData)->make();
    }

    function getFileNameSignReport($filename){
        return response()->download(storage_path('app/public/report/'.$filename));
    }

    function summary_fee_pinalty(){
        return view('report.summary_fee_pinalty',[
            'title' => 'Report ',
            'active_gm' => 'Report',
            'active_m'=>'report/summary_fee_pinalty'
        ]);
    }
}
