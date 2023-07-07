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
}
