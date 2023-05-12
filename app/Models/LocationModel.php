<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LocationModel extends Model
{
    use HasFactory;

    public static function getLocation($project_code = null,$region_id = null, $location_id = null){
        $query = DB::table('setup_location AS a')
        ->join('setup_region AS b','a.region_id','=','b.id')
        ->join('setup_project AS c','c.project_code','=','b.project_code')
        ->select('a.region_id','b.region_name','a.id AS location_id','a.location_name','c.project_code','c.project_name');
        if(!empty($project_code)){
            $query = $query->where('c.project_code', $project_code);
        }
        if(!empty($region_id)){
            $query = $query->where('b.id', $region_id);
        }
        if(!empty($location_id)){
            $query = $query->where('a.id',$location_id);
        }
        return $query->get();
    }
}
