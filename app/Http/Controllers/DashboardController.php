<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;
class DashboardController extends Controller
{
    public function dashboard_v1(){
        return view('dashboard.dashboard_v1',[
            'title'=>'Dashboard V1',
            'active_gm'=>'Dashboard',
            'active_m'=>'dashboard_v1'
        ]);
    }

    function get_appraisal_weekly(Request $request){
        $month_project = $request->month_project;
        $year_project = $request->year_project;
        $project_code = $request->project_code;
        $location_id = $request->location_id;
        $sql="SELECT a.project_code,YEARWEEK(appraisal_date) AS week_appraisal,ROUND(AVG(score)) AS score,DATE_FORMAT(appraisal_date,\"%Y\") AS YEAR, DATE_FORMAT(appraisal_date,\"%m\") AS MONTH FROM evaluation a 
        INNER JOIN setup_sub_area b ON a.sub_area_id = b.id
        INNER JOIN setup_area c ON b.area_id = c.id
        INNER JOIN setup_project d ON d.project_code = a.project_code
        WHERE DATE_FORMAT(appraisal_date,\"%m\") = \"$month_project\" AND DATE_FORMAT(appraisal_date,\"%Y\") = \"$year_project\" AND a.project_code = \"$project_code\" AND c.location_id = \"$location_id\" 
        GROUP BY WEEK(appraisal_date),a.project_code ORDER BY appraisal_date DESC";
        $get_data = DB::select($sql);
        return response()->json($get_data);
    }

    function dailyAppraisalPerWeek(Request $request){
        $query = DB::table('setup_location')->join('setup_region','setup_region.id','=','setup_location.region_id')->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('evaluation','evaluation.project_code','=','setup_project.project_code')->join('setup_area','setup_area.location_id','=','setup_location.id')->join('setup_sub_area','setup_sub_area.area_id','setup_area.id')->where('setup_location.id',$request->location_id)->where(DB::Raw('YEARWEEK(appraisal_date)'),$request->year_project.$request->week_project)->get();
        // return response()->json($query);
        return Datatables::of($query)->make(true);
    }
}
