<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
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

    static function getDataScoreMonthlyPerLocation($project_code,$location_id,$month,$year,$service_code){
        $query = DB::table('report_summary_monthly_per_location')
        ->where('project_code','=',$project_code)
        ->where('location_id',$location_id);
        if($service_code !=""){
            $query = $query->where('service_code',$service_code);
        }
        if($month != "" && $year != ""){
            $query = $query->whereRaw("DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$month-$year\"")
            ->select('sub_area_id','sub_area_name','service_code','service_name',DB::Raw("
            AVG(score) AS score"),'initial')
            ->groupBy('sub_area_id');
            return $query->get();
        }
    }

    static function getDataScoreMonthlyPerLocationGroupService($project_code,$location_id,$month,$year,$service_code=null){
        $query = DB::table('report_summary_monthly_per_location')
        ->where('project_code','=',$project_code)
        ->where('location_id',$location_id)
        ->whereRaw("DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$month-$year\"")
        ->select('service_code','service_name',DB::Raw("
        AVG(score) AS score"))
        ->groupBy('service_code');
        return $query->get();
    }

    static function average_satisfaction($project_code,$month,$year,$location_id,$service_code=null){
        // $query_avg_score = DB::table('score_evaluation')
        // ->join('header_evaluation','header_evaluation.id_header','=','score_evaluation.id_header') 
        // ->join('template_sub_area','template_sub_area.id','=','score_evaluation.sub_area_id')
        // ->join('template_area','template_area.id','=','template_sub_area.id_area')
        // ->join('header_template','header_template.id','=','template_area.id_header')
        // ->join('setup_location','header_template.location_id','=','setup_location.id')
        // ->join('setup_region','setup_location.region_id','=','setup_region.id')
        // ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        // ->join('m_client','m_client.id','=','setup_project.client_id')
        // ->select(DB::Raw('AVG(score) AS score'),'m_client.client_name','project_name','location_name','service_code','critic_recommend');
        // if($project_code != ""){
        //     $query_avg_score = $query_avg_score->where('setup_project.project_code',$project_code);
        // }
        
        // if($location_id != ""){
        //     $query_avg_score = $query_avg_score->where('setup_location.id',$location_id);
        // }

        // if($month != "" && $year != ""){
        //     $query_avg_score = $query_avg_score->whereRaw("DATE_FORMAT(appraisal_date,'%Y-%m')='".$year."-".$month."'");
        // }
        // if($service_code !=""){
        //     $query_avg_score = $query_avg_score->where('service_code',$service_code);
        // }
        // $query_avg_score = $query_avg_score->first();
        // return $query_avg_score;

        $query = DB::table('report_summary_monthly_per_location')
        ->where('project_code','=',$project_code)
        ->where('location_id',$location_id);
        if($service_code !=""){
            $query = $query->where('service_code',$service_code);
        }
        if($month != "" && $year != ""){
            $query = $query->whereRaw("DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$month-$year\"")
            ->select('project_name','sub_area_id','sub_area_name','service_code','service_name',DB::Raw("
            AVG(score) AS score"),'initial','location_name','client_name');
            return $query->first();
        }
    }

    static function getScoreM($project_code,$bulan,$tahun,$score){
        $query = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->where('project_code',$project_code);
        $query=$query->whereRaw("DATE_FORMAT(start_date,\"%m-%Y\") <=\"$bulan-$tahun\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >=\"$bulan-$tahun\" AND CEIL(score) >= \"$score\" GROUP BY score")->first();
        return $query;
    }

    static function getScoreM_var2($project_code,$bulan,$tahun,$score){
        $query = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->where('project_code',$project_code)
        ->whereRaw("DATE_FORMAT(start_date,\"%m-%Y\") <= \"$bulan-$tahun\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$bulan-$tahun\" AND score >= $score")->first();
        // ->whereRaw("period_date IN(SELECT MAX(period_date) FROM header_set_score WHERE DATE_FORMAT(period_date,'%m') <= \"$bulan\" AND DATE_FORMAT(period_date,'%Y') = \"$tahun\" AND CEIL(score) >= \"$score\" GROUP BY project_code,DATE_FORMAT(period_date,'%m'))GROUP BY score")->first();
        return $query;
    }

    static function getListCategoryPerPeriodDate($project_code,$bulan,$tahun){
        $query = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->where('project_code',$project_code)
        // ->whereRaw("period_date IN(SELECT MAX(period_date) FROM header_set_score WHERE DATE_FORMAT(period_date,'%Y-%m') <= \"$tahun-$bulan\" GROUP BY project_code,DATE_FORMAT(period_date,'%m')) GROUP BY score")->get();
        ->whereRaw('DATE_FORMAT(start_date,"%m-%Y") <="'.$bulan."-".$tahun.'" AND DATE_FORMAT(finish_date,"%m-%Y") >="'.$bulan."-".$tahun.'" GROUP BY score')->get();
        return $query;
    }

    static function insertLogSignReport($post){
        $query = DB::table('log_sign_report')->insert($post);
        return $query;
    }

    static function getAlreadySignReport($location_id,$period,$service_code){
        $query = DB::table('log_sign_report')
        ->where('location_id',$location_id)
        ->where('service_code',$service_code)
        ->where("period",$period)->first();
        return $query;
    }

    static function getDataService($arr_where=null, $arr_where_not=null){
        $query = DB::table('m_service');
        if($arr_where){
                $query->where($arr_where);
        }
        if($arr_where_not){
            $query = $query->whereNot(function($query) use($arr_where_not) {
                $query->where($arr_where_not);
            });
        }
        return $query;
    }

    static public function checkExistingInputRateGroupYear($project_code){
        $query = DB::table('report_summary_monthly_per_location')
        ->select(DB::Raw("YEAR(appraisal_date) AS \"period\""))
        ->where('project_code',$project_code)
        ->groupBy('period')
        ->get();
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
        ->groupBy('setup_location.id')->get();
        return $query;
    } 

    static public function checkExistingInputRatePercentageByMonth($project_code,$month,$year){
        $period = $month."-".$year;
        $evaluationMonthlyPerlocation = DB::table('header_evaluation')->groupByRaw('location_id,DATE_FORMAT(appraisal_date,"%m-%Y")');
        #$evaluationMonthlyPerlocation = DB::table('header_evaluation')->groupByRaw('location_id');
        $query = DB::table('setup_location')
        ->joinSub($evaluationMonthlyPerlocation,'header', function(JoinClause $join){
            $join->on('setup_location.id','=','header.location_id');
        })
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->select(DB::Raw("setup_project.project_code,FLOOR(((SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")-(SELECT COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$period\" THEN id_header END)))        
        / (SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")*100) AS 'percentage_not_yet',
        ((SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")-(COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$period\" THEN id_header END))) AS 'qty_not_yet',
        FLOOR(COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$period\" THEN id_header END) / (SELECT COUNT(*) FROM header_template WHERE DATE_FORMAT(start_date,\"%m-%Y\") <= \"$period\" AND DATE_FORMAT(finish_date,\"%m-%Y\") >= \"$period\")*100) AS 'percentage_done',
        COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m-%Y\") = \"$period\" THEN id_header END) AS qty_done"))
        ->where("setup_project.project_code",$project_code)
        ->first();
        return $query;
    }

    static public function checkExistingInputRateMonthlyPerLocation($project_code,$year){
        $query = DB::table('setup_location')
        // ->leftJoin('header_evaluation','setup_location.id','=','header_evaluation.location_id')
        ->leftJoin(DB::Raw("(SELECT * FROM header_evaluation WHERE DATE_FORMAT(appraisal_date,\"%Y\") = $year) AS header_evaluation"),'header_evaluation.location_id','=','setup_location.id')
        ->leftJoin('users','users.id','=','header_evaluation.created_by')
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        // ->whereRaw("date_format(appraisal_date,\"%Y\")=$year")
        ->where('setup_project.project_code',$project_code)
        ->select(
            "location_id",
            "location_name",
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"01\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Jan\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"02\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Feb\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"03\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Mar\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"04\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Apr\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"05\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"May\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") = \"06\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Jun\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") = \"07\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Jul\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"08\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Aug\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"09\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Sep\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"10\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Oct\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"11\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Nov\""),
            DB::Raw("CASE WHEN COUNT(CASE WHEN DATE_FORMAT(appraisal_date,\"%m\") =\"12\" THEN header_evaluation.id_header END)  > 0 THEN 1 ELSE 0 END AS \"Dec\"")
        )
        ->groupBy('setup_location.id')->get();
        return $query;
    }

    static public function checkExistingSignRateMonthlyPerLocation($project_code,$year){
        $query = DB::table('setup_location AS a')
        ->leftJoin(DB::Raw('(SELECT 
        location_id, 
        service_code,
        start_date,
        finish_date
      FROM 
        (
          SELECT 
            DISTINCT ht.location_id, 
            ta1.service_code,
            start_date,
            finish_date
          FROM 
            template_area ta1 
            LEFT JOIN `header_template` ht ON ta1.id_header = ht.id
          GROUP BY 
            service_code,
            ht.location_id,
            ht.id
        ) AS sub) AS ta'),'a.id','=','ta.location_id')
        ->join('m_service AS e','e.service_code','=','ta.service_code')
        ->join('setup_region AS f','f.id','=','a.region_id')
        ->where('f.project_code',$project_code)
        ->selectRaw("
        a.id AS location_id,location_name,
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"01-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"01-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_jan',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"01-$year\" AND lsr.location_id = a.id),\"\") AS 'Jan',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"02-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"02-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_feb',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"02-$year\" AND lsr.location_id = a.id),\"\") AS 'Feb',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"03-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"03-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_mar',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"03-$year\" AND lsr.location_id = a.id),\"\") AS 'Mar',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"04-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"04-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_apr',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"04-$year\" AND lsr.location_id = a.id),\"\") AS 'Apr',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"05-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"05-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_may',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"05-$year\" AND lsr.location_id = a.id),\"\") AS 'May',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"06-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"06-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_jun',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"06-$year\" AND lsr.location_id = a.id),\"\") AS 'Jun',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"07-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"07-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_jul',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"07-$year\" AND lsr.location_id = a.id),\"\") AS 'Jul',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"08-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"08-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_aug',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"08-$year\" AND lsr.location_id = a.id),\"\") AS 'Aug',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"09-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"09-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_sep',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"09-$year\" AND lsr.location_id = a.id),\"\") AS 'Sep',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"10-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"10-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_oct',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"10-$year\" AND lsr.location_id = a.id),\"\") AS 'Oct',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"11-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"11-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_nov',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"11-$year\" AND lsr.location_id = a.id),\"\") AS 'Nov',
        IFNULL(GROUP_CONCAT(CASE WHEN DATE_FORMAT(ta.start_date,\"%m-%Y\") <= \"12-$year\" AND DATE_FORMAT(ta.finish_date,\"%m-%Y\") >= \"12-$year\" THEN CONCAT(\"[\",LEFT(UPPER(ta.service_code),1),\"]\") END),\"\") as 'service_dec',
        IFNULL((SELECT GROUP_CONCAT(CONCAT(\"[\",LEFT(UPPER(service_code),1),\"]\")) FROM log_sign_report lsr WHERE period = \"12-$year\" AND lsr.location_id = a.id),\"\") AS 'Dec'
        ")
        ->groupBy('a.id')->get();
        return $query;
    }

    static function getDataLogSignReport(){
        $query = DB::table('log_sign_report')
        ->select('location_name','period','service_name','log_sign_report.filename','fullname')
        ->join('setup_location','setup_location.id','=','log_sign_report.location_id')
        ->join('m_service','m_service.service_code','=','log_sign_report.service_code')
        ->join('users','users.id','=','log_sign_report.created_by');
        return $query->get();
    }

    public static function getDataSummaryFeePinalty($project_code,$year,$service_code){
        $month = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
        $str_query = "";
        $arr_digit = 0;
        for($i=1;$i<=12;$i++){
            $comma = $i==12 ? "" : ",";
            $str_query .= "AVG(CASE WHEN DATE_FORMAT(appraisal_date,\"%c-%Y\") = \"$i-$year\" THEN se.score END) AS score_".$month[$arr_digit].",
            (SELECT category FROM detail_set_score_per_project WHERE id_header = hss.id_header AND (score+1) > AVG(CASE WHEN DATE_FORMAT(appraisal_date,\"%c-%Y\") = \"$i-$year\" THEN se.score END) ORDER BY score ASC LIMIT 1) AS category_".$month[$arr_digit].",
            ROUND(((SELECT percent_pinalty FROM detail_pinalty WHERE id_header = hmf.id_header_pinalty AND (score+1) > AVG(CASE WHEN DATE_FORMAT(appraisal_date,\"%c-%Y\") = \"$i-$year\" THEN se.score END) ORDER BY score ASC LIMIT 1)  / 100) * amount,4) AS amount_pinalty_".$month[$arr_digit].$comma;
            $arr_digit++;
        }
        $query = DB::table('header_evaluation AS he')
        ->join('score_evaluation AS se','se.id_header','=','he.id_header')
        ->join('setup_location AS sl','sl.id','=','he.location_id')
        ->join('header_template AS ht','ht.location_id','=','sl.id')
        ->join('template_area AS ta','ta.id_header','=','ht.id')
        // ->join('template_sub_area AS tsa','tsa.id_area','=','ta.id')
        ->join('template_sub_area AS tsa',function(JoinClause $join){
            $join->on('tsa.id_area','=','ta.id');
            $join->on('tsa.id','=','se.sub_area_id');
        })
        ->join('setup_region AS sr', 'sr.id','=','sl.region_id')
        ->join('setup_project AS sp', 'sp.project_code','=','sr.project_code')
        ->join('header_set_score AS hss', function(JoinClause $join){
            $join->on('hss.project_code','=','sp.project_code');
            $join->on('hss.start_date','<=','he.appraisal_date');
            $join->on('hss.finish_date','>=','he.appraisal_date');
        })
        ->leftJoin('header_management_fee AS hmf',function(JoinClause $join){
            $join->on('hmf.id_header_template','=','ht.id');
            $join->on('hmf.start_date','<=','he.appraisal_date');
            $join->on('hmf.finish_date','>=','he.appraisal_date');
        })
        ->leftJoin('detail_management_fee AS dmf',function(JoinClause $join){
            $join->on('dmf.id_header','=','hmf.id_header');
            $join->on('dmf.service_code','=','ta.service_code');
        })
        ->leftJoin('header_pinalty AS hp', function(JoinClause $join){
            $join->on('hp.id_header','=','hmf.id_header_pinalty');
            $join->on('hp.start_date','<=','he.appraisal_date');
            $join->on('hp.finish_date','>=','he.appraisal_date');
        })
        ->where('sp.project_code',$project_code)
        ->where("ta.service_code",$service_code)
        ->select('ht.location_id','location_name','ta.service_code',
        DB::Raw($str_query))
        ->groupBy('ht.location_id','ta.service_code')
        ->get();
        return $query;
    }

}
