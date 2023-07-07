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
        $sql = "SELECT e.fullname AS nama_user_client,f.fullname AS nama_user_pic,sign_date_client,e.sign_binary AS sign_client FROM sign_approval a
        INNER JOIN setup_location b ON a.location_id = b.id
        INNER JOIN setup_region c ON b.region_id = c.id
        INNER JOIN setup_project d ON d.project_code = c.project_code
        LEFT JOIN users e ON a.client = e.id
        LEFT JOIN users f ON a.pic = f.id
        WHERE d.project_code = '".$project_code."' AND b.id = '$location_id' AND period_project = '$month-$year'";
        $query = DB::select($sql);
        return $query;
    }

    static function getDataScoreMonthlyPerLocation($project_code,$location_id,$month,$year){
        $query = DB::table('report_summary_monthly_per_location')
        ->where('project_code','=',$project_code)
        ->where('location_id',$location_id)
        ->whereRaw("DATE_FORMAT(appraisal_date,\"%Y\") = $year")
        ->whereRaw("DATE_FORMAT(appraisal_date,\"%b\") = \"$month\"")
        ->select('sub_area_id','sub_area_name','service_code','service_name',DB::Raw("
        AVG(score) AS score"),'initial')
        ->groupBy('sub_area_id');
        return $query->get();
    }

    static function getDataScoreMonthlyPerLocationGroupService($project_code,$location_id,$month,$year){
        $query = DB::table('report_summary_monthly_per_location')
        ->where('project_code','=',$project_code)
        ->where('location_id',$location_id)
        ->whereRaw("DATE_FORMAT(appraisal_date,\"%Y\") = \"$year\"")
        ->whereRaw("DATE_FORMAT(appraisal_date,\"%b\") = \"$month\"")
        ->select('service_code','service_name',DB::Raw("
        AVG(score) AS score"))
        ->groupBy('service_code');
        return $query->get();
    }

    static function average_satisfaction($project_code,$month,$year,$location_id){
        $query_avg_score = DB::table('score_evaluation')
        ->join('header_evaluation','header_evaluation.id_header','=','score_evaluation.id_header') 
        ->join('setup_sub_area','setup_sub_area.id','=','score_evaluation.sub_area_id')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->select(DB::Raw('AVG(score) AS score'),'m_client.client_name','project_name','location_name','critic_recommend');
        if($project_code != ""){
            $query_avg_score = $query_avg_score->where('setup_project.project_code',$project_code);
        }
        
        if($location_id != ""){
            $query_avg_score = $query_avg_score->where('setup_location.id',$location_id);
        }

        if($month != "" && $year != ""){
            $query_avg_score = $query_avg_score->whereRaw("DATE_FORMAT(appraisal_date,'%Y-%b')='".$year."-".$month."'");
        }

        $query_avg_score = $query_avg_score->first();
        return $query_avg_score;
    }

    static function getScoreM($project_code,$bulan,$tahun,$score){
        $query = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->where('project_code',$project_code)
        ->whereRaw("period_date IN(SELECT MAX(period_date) FROM header_set_score WHERE DATE_FORMAT(period_date,'%b') = \"$bulan\" AND DATE_FORMAT(period_date,'%Y') = \"$tahun\" AND CEIL(score) >= \"$score\" GROUP BY project_code,DATE_FORMAT(period_date,'%m'))GROUP BY score")->first();
        return $query;
    }

    static function getScoreM_var2($project_code,$bulan,$tahun,$score){
        $query = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->where('project_code',$project_code)
        ->whereRaw("period_date IN(SELECT MAX(period_date) FROM header_set_score WHERE DATE_FORMAT(period_date,'%m') = \"$bulan\" AND DATE_FORMAT(period_date,'%Y') = \"$tahun\" AND CEIL(score) >= \"$score\" GROUP BY project_code,DATE_FORMAT(period_date,'%m'))GROUP BY score")->first();
        return $query;
    }

    static function getListCategoryPerPeriodDate($project_code,$bulan,$tahun){
        $query = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->where('project_code',$project_code)
        ->whereRaw("period_date IN(SELECT MAX(period_date) FROM header_set_score WHERE DATE_FORMAT(period_date,'%b') = \"$bulan\" AND DATE_FORMAT(period_date,'%Y') = \"$tahun\" GROUP BY project_code,DATE_FORMAT(period_date,'%m'))GROUP BY score ASC")->get();
        return $query;
    }
}
