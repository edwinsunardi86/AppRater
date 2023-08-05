<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ManagementFeeModel extends Model
{
    use HasFactory;

    static function getDataManagementFee($id=null){
        $query = DB::table('management_fee AS a')
        ->join('setup_location AS b','a.location_id','=','b.id')
        ->join('header_pinalty AS c','c.id_header','=','a.id_header_pinalty')
        ->join('detail_pinalty AS d','d.id_header','=','c.id_header')
        ->join('header_set_score AS e','e.id_header','=','c.id_header_set_score')
        ->join('detail_set_score_per_project AS f',function($join){
            $join->on('f.id_header','=','e.id_header');
            $join->on('f.score','=','d.score');
        });
        if($id){
            $query = $query->where('a.id',$id);
        }
        $query = $query->select('c.id_header AS id_header_pinalty','a.id','a.location_id','b.location_name','fee',DB::Raw('GROUP_CONCAT(" ",d.score,"(" , f.category , ")"," : ",d.percent_pinalty,"%") AS description_pinalty'),'a.start_date','a.finish_date')
        ->groupBy('a.id');
        if($id){
            $query = $query->first();
        }else{
            $query = $query->get();
        }
        return $query;
    }
}
