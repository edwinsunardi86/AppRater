<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $sql = "SELECT a.project_code,WEEK(appraisal_date) AS week_appraisal,ROUND(AVG(score)) AS score,DATE_FORMAT(appraisal_date,\"%Y\") AS YEAR, DATE_FORMAT(appraisal_date,\"%m\") AS MONTH FROM evaluation a INNER JOIN setup_project_detail b ON a.project_code = b.project_code AND a.sub_area_id = b.sub_area_id INNER JOIN m_sub_area c ON c.id = b.sub_area_id INNER JOIN m_area d ON c.area_id = d.id WHERE DATE_FORMAT(appraisal_date,\"%m\") = \"$month_project\" AND DATE_FORMAT(appraisal_date,\"%Y\") = \"$year_project\" AND a.project_code = \"$project_code\" AND d.location_id = \"$location_id\" GROUP BY WEEK(appraisal_date),a.project_code ORDER BY appraisal_date DESC";
        $sql="SELECT a.project_code,WEEK(appraisal_date) AS week_appraisal,ROUND(AVG(score)) AS score,DATE_FORMAT(appraisal_date,\"%Y\") AS YEAR, DATE_FORMAT(appraisal_date,\"%m\") AS MONTH FROM evaluation a 
        INNER JOIN setup_sub_area b ON a.sub_area_id = b.id
        INNER JOIN setup_area c ON b.area_id = c.id 
        WHERE DATE_FORMAT(appraisal_date,\"%m\") = \"$month_project\" AND DATE_FORMAT(appraisal_date,\"%Y\") = \"$year_project\" AND a.project_code = \"$project_code\" AND c.location_id = \"$location_id\" 
        GROUP BY WEEK(appraisal_date),a.project_code ORDER BY appraisal_date DESC";
        //echo $sql; die();
        $get_data = DB::select($sql);
        // var_dump($get_data);
        return response()->json($get_data);
    }
}
