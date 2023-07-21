<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LogModel extends Model
{
    use HasFactory;

    

    

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
