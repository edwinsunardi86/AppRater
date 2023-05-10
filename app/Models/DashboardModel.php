<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DashboardModel extends Model
{
    use HasFactory;

    static function getDataEvaluationProjectMonthlyPerYear($project_code,$location_id,$year){
        $query = DB::table('evaluation')
        ->join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select('setup_project.project_code','setup_project.project_name','service_name',DB::Raw('AVG(score) AS score'),DB::Raw('DATE_FORMAT(appraisal_date,"%m") AS MONTH'),'m_client.client_name',DB::Raw('setup_location.id AS location_id'),'location_name','m_service.service_code')
        ->where(['setup_project.project_code'=>$project_code]);
        if($location_id != ""){
            $query = $query->where('setup_location.id','=',$location_id);
        }
        $query=$query->whereRaw('YEAR(appraisal_date) = '.$year)
        ->groupBy('setup_project.project_code')
        ->groupBy('m_service.service_code')
        ->groupByRaw('DATE_FORMAT(appraisal_date,"%m")')
        ->get();

        return $query;
    }
}
