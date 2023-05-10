<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;
use App\Models\DashboardModel;
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
        $query = DB::table('setup_location AS a')->
        join('setup_region AS b','b.id','=','a.region_id')->
        join('setup_project AS c','c.project_code','=','b.project_code')->
        //join('evaluation AS d','d.project_code','=','c.project_code')->
        join('setup_area AS e','e.location_id','=','a.id')->
        join('setup_sub_area AS f','f.area_id','e.id')->
        where('setup_location.id',$request->location_id)->
        where(DB::Raw('YEARWEEK(appraisal_date)'),$request->year_project.$request->week_project)->get();
        // var_dump($query);
        return Datatables::of($query)->make(true);
    }

    function getDataEvaluationProjectMonthlyPerYear(Request $request){
        $query = DashboardModel::getDataEvaluationProjectMonthlyPerYear($request->project_code,$request->location_id,$request->year);
        // var_dump($query);
        $groupLocation = $query->groupBy('location_id');
        $location = array();
        foreach($groupLocation as $row){
            array_push($location,array('location_id'=>$row[0]->location_id,'location_name'=>$row[0]->location_name));
        }
        return response()->json(array('location'=>$location,'data'=>$query));
    }
}
