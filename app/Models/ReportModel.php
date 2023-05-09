<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ReportModel extends Model
{
    use HasFactory;

    static function getDataScorePerLocation($project_code,$location_id,$month,$year){
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
        return $query;
    }

    static function getDataPICnCLientPerPeriodProject($project_code, $location_id, $month, $year){
        // $query = DB::table('sign_approval')
        // ->join('setup_location','sign_approval.location_id','=','setup_location.id')
        // ->join('setup_region','setup_location.region_id','=','setup_region.id')
        // ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        // ->join('users','users.id','=','sign_approval.client')
        // ->where(['setup_project.project_code'=>$project_code, 'setup_location.id'=>$location_id,'period_project'=>$month."-".$year])->first();

        $sql = "SELECT e.fullname AS nama_user_client,f.fullname AS nama_pic FROM sign_approval a
        INNER JOIN setup_location b ON a.location_id = b.id
        INNER JOIN setup_region c ON b.region_id = c.id
        INNER JOIN setup_project d ON d.project_code = c.project_code
        LEFT JOIN users e ON a.client = e.id
        LEFT JOIN users f ON a.pic = f.id
        WHERE d.project_code = '".$project_code."' AND b.id = '$location_id' AND period_project = '$month-$year'";
        $query = DB::select($sql);
        return $query;
    }
}
