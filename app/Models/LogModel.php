<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LogModel extends Model
{
    use HasFactory;

    static public function checkExistingInputRateGroupYear($project_code){
        $query = DB::table('report_summary_monthly_per_location')
        ->select(DB::Raw("YEAR(appraisal_date) AS \"period\""))
        ->where('project_code',$project_code)
        ->groupBy('period')
        ->get();
        return $query;
    }

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

    static public function checkExistingInputRatePerLocationByMonth($project_code,$month,$year){
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
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"$month\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"status\"")
        )
        ->groupBy('location_id')->get();
        return $query;
    }

    static public function checkExistingInputRatePercentageByMonth($project_code,$month,$year){
        $period = $month."-".$year;
        $query = DB::table('header_evaluation')
        ->join('setup_location','setup_location.id','=','header_evaluation.location_id')
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->select(DB::Raw("DISTINCT setup_project.project_code,
        ((SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")
        -(SELECT COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$period\" THEN id_header END)))
        / (SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")*100 AS 'percentage_not_yet',
        COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$period\" THEN id_header END) 
        / (SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")*100 AS 'percentage_done'"))
        ->where("setup_project.project_code1",$project_code)
        ->get();
        return $query;
    }

        

// SELECT((SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,"%m-%Y") <= "$period" AND DATE_FORMAT(finish_date,"%m-%Y") >= "$period")
// -(SELECT COUNT(CASE WHEN DATE_FORMAT(appraisal_date,"%Y") = '2023' AND DATE_FORMAT(appraisal_date,"%m") = '05' THEN id_header END) FROM header_evaluation)) 
// / (SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,"%m-%Y") <= "$period" AND DATE_FORMAT(finish_date,"%m-%Y") >= "$period")*100 AS 'percentage'
}
