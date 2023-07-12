<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TemplateAreaModel extends Model
{
    use HasFactory;

    static function getConflictPeriodPerlocationId($location_id,$start_date){
        $query = DB::table('header_template')
        ->where('location_id','=',$location_id)
        ->where('finish_date','>=', $start_date)->get();
        return $query;
    }

    static function insert_header_template($post){
        $query = DB::table('header_template')->insert($post);
        return $query;
    }

    static function getMaxIdHeaderTemplate(){
        $query = DB::table('header_template')->select(DB::raw('MAX(id) AS max_id'))->first();
        return $query;
    }

    static function insert_template_area($post){
        $query = DB::table('template_area')->insert($post);
        return $query;
    }

    static function getMaxIdTemplateArea(){
        $query = DB::table('template_area')->select(DB::raw('MAX(id) AS max_id'))->first();
        return $query;
    }

    static function insert_template_sub_area($post){
        $query = DB::table('template_sub_area')->insert($post);
    }
    
    static function getDataTemplateArea($arr_where=null,$arr_where_not=null){
        $query = DB::table('template_area');
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

    static function getDataTemplateSubArea($arr_where=null,$arr_where_not=null){
        $query = DB::table('template_sub_area');
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

    static function getDataTemplateArea2(){
        $query = DB::table('header_template AS a')
        ->join('setup_location AS b','a.location_id','=','b.id')
        ->join('template_area AS c','a.id','=','c.id_header')
        ->select(DB::Raw('a.id,location_name,CONCAT(DATE_FORMAT(start_date,"%d-%m-%Y")," - ",DATE_FORMAT(finish_date,"%d-%m-%Y")) AS period,COUNT(area_name) as count_area_name'))
        ->groupBy('location_id')->get();
        return $query;
    }

    static function getDataDetailTemplateArea($location_id){
        $query = DB::table('header_template AS a')
        ->join('setup_location AS b','a.location_id','=','b.id')
        ->join('template_area AS c','c.id_header','=','a.id')
        ->join('m_service AS d','d.service_code','=','c.service_code')
        ->where('a.location_id',$location_id)->get();
        return $query;
    }
}
