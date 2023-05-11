<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;
use App\Models\DashboardModel;
use PDO;

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
        INNER JOIN setup_project d ON d.project_code = a.project_code WHERE a.project_code = \"$project_code\"";
        if($location_id != ""){
            $sql = $sql." AND c.location_id = \"$location_id\"";
        }

        if($year_project != ""){
            $sql = $sql." AND DATE_FORMAT(appraisal_date,\"%m\") = \"$month_project\" AND DATE_FORMAT(appraisal_date,\"%Y\") = \"$year_project\"";
        }
        // WHERE DATE_FORMAT(appraisal_date,\"%m\") = \"$month_project\" AND DATE_FORMAT(appraisal_date,\"%Y\") = \"$year_project\" AND a.project_code = \"$project_code\" AND c.location_id = \"$location_id\"";

        $sql= $sql." GROUP BY WEEK(appraisal_date),a.project_code ORDER BY appraisal_date DESC";
        $get_data = DB::select($sql);
        return response()->json($get_data);
    }

    function dailyAppraisalPerWeek(Request $request){
        // $query = DB::table('setup_location AS a')
        // ->join('setup_region AS b','b.id','=','a.region_id')
        // ->join('setup_project AS c','c.project_code','=','b.project_code')
        // ->join('evaluation AS d','d.project_code','=','c.project_code')
        // ->join('setup_area AS e','e.location_id','=','a.id')
        // ->join('setup_sub_area AS f','f.area_id','=','e.id')
        // ->where('c.project_code',$request->project_code);
        $sql ="SELECT * FROM setup_location AS a 
        INNER JOIN setup_region AS b ON b.id = a.region_id 
        INNER JOIN setup_project AS c ON c.project_code = b.project_code 
        INNER JOIN evaluation AS d ON d.project_code = c.project_code 
        INNER JOIN setup_area AS e ON e.location_id = a.id 
        INNER JOIN setup_sub_area AS f ON f.area_id = e.id AND d.sub_area_id = f.id WHERE c.project_code = '".$request->project_code."'";
        if($request->region_id != ""){
            $sql = $sql.' AND b.id = '.$request->region_id;
        }
        if($request->location_id != ""){
            $sql = $sql.' AND a.id = '.$request->location_id;
        }
        if($request->year_project){
            $sql = $sql.' AND YEARWEEK(appraisal_date)='.$request->year_project.$request->week_project;
        }
        $query = DB::select($sql);
        // $query=$query->whereRaw('YEARWEEK(appraisal_date)='.$request->year_project.$request->week_project)->get();
        // var_dump($query);
        return Datatables::of($query)->make(true);
    }

    function getDataEvaluationProjectMonthlyPerYear(Request $request){
        $query = DashboardModel::getDataEvaluationProjectMonthlyPerYear($request->project_code,$request->region_id,$request->location_id,$request->year);
        return response()->json($query);
    }
}
