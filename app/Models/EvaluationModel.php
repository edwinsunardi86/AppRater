<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class EvaluationModel extends Model
{
    use HasFactory;

    static function getDataTemplateSubAreaPerPeriod($location_id,$date){
        $query = DB::table('template_sub_area')
        ->join('template_area','template_area.id','=','template_sub_area.id_area')
        ->join('header_template','header_template.id','=','template_area.id_header')
        ->join('m_service','m_service.service_code','=','template_area.service_code')
        ->where('location_id',$location_id)
        ->where('start_date','<=',$date)
        ->where('finish_date','>=',$date)
        ->select(DB::Raw('template_area.id AS id_area,template_area.area_name,template_sub_area.id AS id_sub_area,template_sub_area.sub_area_name AS sub_area_name,template_area.service_code AS service_code'))
        ->get();
        return $query;
    }
}
