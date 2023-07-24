<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PinaltyModel extends Model
{
    use HasFactory;

    static function getDataPinalty(){
        // $query = "SELECT project_name, CONCAT(a.start_date,\" s/d \",a.finish_date) AS 'period',GROUP_CONCAT(\" \",b.score,\" : \",percentage_pinalty,\" \") AS 'pinalty_score' FROM header_pinalty a
        // INNER JOIN detail_pinalty b ON a.id_header = b.id_header
        // INNER JOIN setup_project c ON a.project_code = c.project_code
        // INNER JOIN header_set_score d ON a.id_header_set_score = d.id_header";

        $query = DB::table('header_pinalty')
        ->join('detail_pinalty','header_pinalty.id_header','=','detail_pinalty.id_header')
        ->join('setup_project','setup_project.project_code','=','header_pinalty.project_code')
        ->join('header_set_score','header_set_score.id_header','=','header_pinalty.id_header_set_score')
        ->join('detail_set_score_per_project','detail_set_score_per_project.id_header','=','header_set_score.id_header')
        ->join('detail_set_score_per_project', function($join){
            $join->on('detail_set_score_per_project.id_header','=','header_pinalty.id_header');
            $join->on('detail_set_score_per_project.id_header','=','header_pinalty.id_header_set_score');
            $join->on('detail_set_score_per_project.score','=','header_pinalty.score');
        })
        ->selectRaw("project_name, CONCAT(header_pinalty.start_date,\" s/d \",header_pinalty.finish_date) AS 'period',GROUP_CONCAT(\" \", detail_set_score_per_project.category, detail_pinalty.score,\" : \", 
        percentage_pinalty,\" \") AS 'pinalty_score'")
        ->where("detail_pinalty.score","=","detail_set_score_per_project.score")
        ->get();
        return $query;
    }
}
