<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LogModel extends Model
{
    use HasFactory;

    

    static public function checkExistingInputRateMonthlyPerLocation($project_code,$year){
        $query = DB::table('setup_location')
        ->leftJoin('header_evaluation','setup_location.id','=','header_evaluation.location_id')
        ->leftJoin('users','users.id','=','header_evaluation.created_by')
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->whereRaw("date_format(appraisal_date,\"%Y\")=$year")
        ->where('setup_project.project_code',$project_code)
        ->select(
            "location_id",
            "location_name",
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"01\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Jan\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"02\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Feb\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"03\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Mar\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"04\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Apr\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"05\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Mei\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") = \"06\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"June\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") = \"07\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"July\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"08\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Aug\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"09\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Sep\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"10\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Oct\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"11\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Nov\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"12\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Dec\"")
        )
        ->groupBy('location_id')->get();
        return $query;
    }

    static function getDatalogSignReport($project_code,$month,$year){
        $query = DB::table('log_sign_report')
        ->join('setup_location','log_sign_report.location_id','=','setup_location.id')
        ->join('m_service','m_service.service_code','=','log_sign_report.service_code')
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code');
        if($month != "" && $year !=""){
            $query = $query->where('period',$month."-".$year);
        }
        if($project_code != "")
        {
            $query = $query->where('setup_project.project_code',$project_code);
        }
        return $query->get();
    }


// SELECT((SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= "$period" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= "$period")
// -(SELECT COUNT(CASE WHEN DATE_FORMAT(appraisal_date,"%Y") = '2023' AND DATE_FORMAT(appraisal_date,"%m") = '05' THEN id_header END) FROM header_evaluation)) 
// / (SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= "$period" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= "$period")*100 AS 'percentage'
}
