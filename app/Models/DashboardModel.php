<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DashboardModel extends Model
{
    use HasFactory;

    static function getDataEvaluationProjectmonthlyPerYear($project_code,$region_id,$location_id,$year){
        $query = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select('setup_project.project_code','setup_project.project_name','service_name',DB::Raw('AVG(score) AS score'),DB::Raw('DATE_FORMAT(appraisal_date,"%b") AS month'),'m_client.client_name',DB::Raw('setup_location.id AS location_id'),'location_name','m_service.service_code')
        ->where(['setup_project.project_code'=>$project_code]);
        if($region_id != ""){
            $query = $query->where('setup_region.id','=',$region_id);
        }
        if($location_id != ""){
            $query = $query->where('setup_location.id','=',$location_id);
        }
        if($year != ""){
            $query=$query->whereRaw('YEAR(appraisal_date) = '.$year);
        }
        
        $query = $query->groupBy('setup_project.project_code')
        ->groupBy('m_service.service_code')
        ->groupByRaw('DATE_FORMAT(appraisal_date,"%m")')
        ->orderByRaw('DATE_FORMAT(appraisal_date,"%m") ASC')
        ->get();

        return $query;
    }

    static function getDataSummarymonthlyPerLocation($project_code, $region_id, $location_id, $year){
        $sql = "SELECT location_id, location_name, IFNULL(AVG(CASE WHEN month = 'Jan' THEN score END),0) AS Jan, IFNULL(AVG(CASE WHEN month = 'Feb' THEN score END),0) AS Feb, IFNULL(AVG(CASE WHEN month = 'Mar' THEN score END),0) AS Mar, IFNULL(AVG(CASE WHEN month = 'Apr' THEN score END),0) AS Apr, IFNULL(AVG(CASE WHEN month = 'May' THEN score END),0) AS May, IFNULL(AVG(CASE WHEN month = 'Jun' THEN score END),0) AS Jun, IFNULL(AVG(CASE WHEN month = 'Jul' THEN score END),0) AS Jul, IFNULL(AVG(CASE WHEN month = 'Aug' THEN score END),0) AS Aug, IFNULL(AVG(CASE WHEN month = 'Sep' THEN score END),0) AS Sep, IFNULL(AVG(CASE WHEN month = 'Oct' THEN score END),0) AS Oct, IFNULL(AVG(CASE WHEN month = 'Nov' THEN score END),0) AS Nov, IFNULL(AVG(CASE WHEN month = 'Dec' THEN score END),0) AS 'Dec' FROM report_summary_per_location";
        if($project_code !=""){
            $sql = $sql." WHERE project_code = '".$project_code."'";
        }
        if($region_id !=""){
            $sql = $sql." AND region_id = '".$region_id."'";
        }

        if($location_id !=""){
            $sql = $sql." AND location_id = '".$location_id."'";
        }
        
        if($year !=""){
            $sql = $sql." AND year = '".$year."'";
        }

        $sql = $sql." GROUP BY location_id";
        $query = DB::select($sql);
        return $query;
    }
}
