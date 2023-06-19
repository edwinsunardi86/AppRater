<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetScoreModel;
use Yajra\DataTables\DataTables as DataTables;
class SetScoreController extends Controller
{
    function index(){
        return view('setting.score.index',[
            'active_gm' => 'Setting',
            'active_m' =>   'score',
            'title'     => 'Set Score'
        ]);
    }

    function getListScore(){
        $getData = SetScoreModel::getListScoreM();
        // return response()->json($getData);
        return DataTables::of($getData)->addIndexColumn()->addColumn('action',function(){
            $btn = "<a href=\"score/editScore\" class=\"btn btn-sm btn-warning\">Edit</a>";
            return $btn;
        })->make();
    }
}
