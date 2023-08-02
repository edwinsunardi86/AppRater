<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PinaltyModel extends Model
{
    use HasFactory;

    static function getDataPinalty(){
        $query = DB::table('header_pinalty')
        ->join('detail_pinalty','header_pinalty.id_header','=','detail_pinalty.id_header')
        ->join('detail_set_score_per_project','detail_set_score_per_project.score','=','detail_pinalty.score')
        ->join('header_set_score', function($join){
            $join->on('header_set_score.id_header','=','header_pinalty.id_header_set_score');
            $join->on('detail_set_score_per_project.id_header','=','header_pinalty.id_header_set_score');
            
        })
        ->join('setup_project','setup_project.project_code','=','header_set_score.project_code')
        ->selectRaw("header_pinalty.id_header,setup_project.project_code,project_name, CONCAT(header_pinalty.start_date,\" s/d \",header_pinalty.finish_date) AS 'period',GROUP_CONCAT(\" \", detail_set_score_per_project.category, \"(\",detail_pinalty.score,\")\",\" : \",
        percent_pinalty,\" %\") AS 'pinalty_score'")
        ->get();
        return $query;
    }

    static function getDataHeaderPinalty($id_header){
        $query = DB::table('header_pinalty')
        ->join('header_set_score','header_set_score.id_header','=','header_pinalty.id_header_set_score')
        ->join('setup_project','setup_project.project_code','=','header_set_score.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->select('setup_project.project_code','project_name','client_id','client_name','header_pinalty.id_header','header_pinalty.start_date','header_pinalty.finish_date','id_header_set_score')
        ->where('header_pinalty.id_header',$id_header);
        return $query->first();
    }

    static function getDataDetailPinaltyScore($id_header){
        $query = DB::table('detail_pinalty')
        ->join('header_pinalty','header_pinalty.id_header','=','detail_pinalty.id_header')
        ->join('detail_set_score_per_project',function($join){
            $join->on('detail_set_score_per_project.id_header','=','header_pinalty.id_header_set_score');
            $join->on('detail_set_score_per_project.score','=','detail_pinalty.score');
        })
        ->select('header_pinalty.id_header','detail_set_score_per_project.score','category','detail_pinalty.percent_pinalty')
        ->where('header_pinalty.id_header',$id_header);
        return $query->get();
    }

    static function getDataPinaltyByProject($project_code){
        $query = DB::table('header_pinalty')
        ->join('detail_pinalty','header_pinalty.id_header','=','detail_pinalty.id_header')
        ->join('detail_set_score_per_project','detail_set_score_per_project.score','=','detail_pinalty.score')
        ->join('header_set_score', function($join){
            $join->on('header_set_score.id_header','=','header_pinalty.id_header_set_score');
            $join->on('detail_set_score_per_project.id_header','=','header_pinalty.id_header_set_score');
            
        })
        ->join('setup_project','setup_project.project_code','=','header_set_score.project_code')
        ->selectRaw("header_pinalty.id_header,setup_project.project_code,project_name, CONCAT(header_pinalty.start_date,\" s/d \",header_pinalty.finish_date) AS 'period',GROUP_CONCAT(\" \", detail_set_score_per_project.category, \"(\",detail_pinalty.score,\")\",\" : \",
        percent_pinalty,\" % \n\") AS 'pinalty_score'")
        ->where("header_set_score.project_code",$project_code)
        ->get();
        return $query;
    }
}
