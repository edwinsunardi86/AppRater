<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ManagementFeeModel extends Model
{
    use HasFactory;

    static function getDataManagementFee(){
        $query = DB::table(DB::Raw("(SELECT hmf.location_id,hmf.id_header,id_header_pinalty,start_date,finish_date,GROUP_CONCAT(service_name,\" : \",amount) AS amount_service FROM header_management_fee hmf
        INNER JOIN detail_management_fee dmf ON hmf.id_header = dmf.id_header
        INNER JOIN m_service ms ON ms.service_code = dmf.service_code
        GROUP BY hmf.id_header) AS a"))
        ->join('setup_location AS b','a.location_id','=','b.id')
        ->join(DB::Raw("(SELECT hp.id_header,hp.start_date,hp.finish_date,dp.score,category,GROUP_CONCAT(dp.score,\"(\",dsspp.category,\") :\", dp.percent_pinalty,\"%\") AS description_pinalty FROM header_pinalty hp
        INNER JOIN detail_pinalty dp ON hp.id_header = dp.id_header
        INNER JOIN header_set_score hss ON hss.id_header = hp.id_header_set_score
        INNER JOIN detail_set_score_per_project dsspp ON dsspp.id_header = hss.id_header AND dp.score = dsspp.score
        GROUP BY hp.id_header) AS c"),"c.id_header","=","a.id_header_pinalty")
        // ->join('header_pinalty AS c','c.id_header','=','a.id_header_pinalty')
        // ->join('detail_pinalty AS d','d.id_header','=','c.id_header')
        // ->join('header_set_score AS e','e.id_header','=','c.id_header_set_score')
        // ->join('detail_set_score_per_project AS f',function($join){
        //     $join->on('f.id_header','=','e.id_header');
        //     $join->on('f.score','=','d.score');
        // })
        ->join('detail_management_fee AS g','g.id_header','=','a.id_header')
        ->join('m_service AS h','h.service_code','=','g.service_code');
        
        $query = $query->select('c.id_header AS id_header_pinalty','a.id_header','a.location_id','b.location_name','amount_service','description_pinalty','a.start_date','a.finish_date')
        ->groupBy('a.id_header')->get();
        return $query;
    }

    static function getMaxIdHeaderManagementFee(){
        $query = DB::table('header_management_fee')->select(DB::Raw('MAX(id_header) AS id_header'))->first();
        return $query;
    }

    static function getDataHeaderManagementFee($arrWhere){
        $query = DB::table('header_management_fee AS a')
        ->join(DB::Raw("(SELECT hp.id_header,hp.start_date,hp.finish_date,dp.score,category,GROUP_CONCAT(dp.score,\"(\",dsspp.category,\") :\", dp.percent_pinalty,\"%\") AS description_pinalty FROM header_pinalty hp
        INNER JOIN detail_pinalty dp ON hp.id_header = dp.id_header
        INNER JOIN header_set_score hss ON hss.id_header = hp.id_header_set_score
        INNER JOIN detail_set_score_per_project dsspp ON dsspp.id_header = hss.id_header AND dp.score = dsspp.score
        GROUP BY hp.id_header) AS b"),"b.id_header","=","a.id_header_pinalty")
        ->join('header_template AS c','a.id_header_template','=','c.id')
        ->join('setup_location AS d','d.id','=','c.location_id')
        ->select('b.id_header AS id_header_pinalty','a.id_header','a.id_header_template','d.location_name','description_pinalty','a.start_date','a.finish_date')
        ->where($arrWhere)->first();
        return $query;
    }

    static function getDataDetailManagementFee($arrWhere){
        $query = DB::table('detail_management_fee AS a')
        ->join('m_service AS b','a.service_code','=','b.service_code')
        ->where($arrWhere)
        ->get();
        return $query;
    }
}
