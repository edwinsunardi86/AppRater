<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SetScoreModel extends Model
{
    use HasFactory;
    static function getListScoreM(){
        $getData = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->join('setup_project','setup_project.project_code','=','header_set_score.project_code')
        ->select('setup_project.project_code','project_name','period_date','is_current_active',DB::Raw('GROUP_CONCAT(category,"(",initial,":",score,")") AS kategori_nilai'))->groupBy('header_set_score.id_header','project_code','period_date')->get();
        return $getData;
    }

    static function InsertScoreHeader($post){
        $insertScore = DB::table('header_set_score')->insert($post);
        return $insertScore;
    }

    static function InsertScoreDetailPerProject($post){
        $query = DB::table('detail_set_score_per_project')->insert($post);
        return $query;                                                                                                                                                                                                
    }
    static function getMaxIdHeader(){
        $getMaxIdHeader = DB::table('header_set_score')->select(DB::Raw('MAX(id_header) AS id_header'))->first();
        return $getMaxIdHeader;
    }

    static function getCurrentActiveByProject($project_code){
        $query = DB::table('header_set_score')
        ->select('project_code','score','category','initial')
        ->join('detail_set_score_per_project', 'header_set_score.id_header','=','detail_set_score_per_project.id_header')->where('project_code',$project_code)->where('is_current_active',1)->get();
        return $query;
    }

    static function currentSetInActiveOldByProject($project_code){
        $query = DB::table('header_set_score')->where('project_code',$project_code)->update(['is_current_active'=>0]);
        return $query;
    }

    //check duplicated based on project code and period date
    static function checkDuplicate($project_code,$period_date){
        $query = DB::table('header_set_score')->where(['project_code'=>$project_code])->where(['period_date'=>$period_date])->get();
        return $query;
    }

    static function getListScoreByProject($project_code){
        $getData = DB::table('header_set_score')
        ->join('detail_set_score_per_project','header_set_score.id_header','=','detail_set_score_per_project.id_header')
        ->join('setup_project','setup_project.project_code','=','header_set_score.project_code')
        ->select('header_set_score.id_header','setup_project.project_code','project_name','start_date','finish_date','is_current_active',DB::Raw('GROUP_CONCAT(category,"(",initial,":",score,")") AS kategori_nilai'))
        ->where('header_set_score.project_code',$project_code)
        ->groupBy('header_set_score.id_header','project_code')->get();
        return $getData;
    }
}
