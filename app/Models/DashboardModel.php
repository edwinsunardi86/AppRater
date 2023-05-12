<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DashboardModel extends Model
{
    use HasFactory;

    static function getDataEvaluationProjectMonthlyPerYear($project_code,$region_id,$location_id,$year){
        $query = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select('setup_project.project_code','setup_project.project_name','service_name',DB::Raw('AVG(score) AS score'),DB::Raw('DATE_FORMAT(appraisal_date,"%b") AS MONTH'),'m_client.client_name',DB::Raw('setup_location.id AS location_id'),'location_name','m_service.service_code')
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

    static function getDataSummaryMonthlyPerLocation($project_code, $region_id, $location_id, $year){
        // $sql = "SELECT d.region_id,e.region_name,c.location_id,location_name,DATE_FORMAT(appraisal_date,'%b') AS MONTH,AVG(score) AS score FROM evaluation a
        //     INNER JOIN setup_sub_area b ON a.sub_area_id = b.id
        //     INNER JOIN setup_area c ON c.id = b.area_id
        //     INNER JOIN setup_location d ON d.id = c.location_id
        //     INNER JOIN setup_region e ON e.id = d.region_id
        //     INNER JOIN setup_project f ON f.project_code = e.project_code
        //     WHERE f.project_code = '".$project_code."'";
        $sql = "SELECT * FROM report_summary_per_location a
        INNER JOIN setup_location b ON a.location_id = b.id
        INNER JOIN setup_region c ON c.id = b.region_id
        INNER JOIN setup_project d ON d.project_code = c.project_code
        ";
        if($project_code !=""){
            $sql = $sql." AND d.project_code = '".$project_code."'";
        }
        if($region_id !=""){
            $sql = $sql." AND e.id = '".$region_id."'";
        }

        if($location_id !=""){
            $sql = $sql." AND d.id = '".$location_id."'";
        }
        
        if($year !=""){
            $sql = $sql." AND DATE_FORMAT(appraisal_date,'%Y') = '".$year."'";
        }
        $query = DB::select($sql);
        return $query;
    }
    
}
