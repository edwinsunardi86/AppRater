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
        ->join('detail_set_score_per_project','header_set_score.id','=','detail_set_score_per_project.id_header')->get();
        return $getData;
    }
}
