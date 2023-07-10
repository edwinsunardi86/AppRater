<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 
class ClientModel extends Model
{
    use HasFactory;
    static function getDataClient($arr_where=null, $arr_where_not=null){
        $query = DB::table('m_client');
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
}
