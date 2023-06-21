<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetScoreModel;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Facades\Auth;
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

    function createScore(Request $request){
        return view('setting.score.create',[
            'title' => 'Setting',
            'active_gm' => 'score',
            'active_m'=>'Set Score'
          ]);
    }

    function setScore(Request $request){
        $arr_score = explode(",",$request->score);
        $arr_initial = explode(",",$request->initial);
        $arr_category = explode(",",$request->category);
        $exp_period_date = explode("/",$request->period_date);
        $format_sql_date = $exp_period_date[2]."-".$exp_period_date[0]."-".$exp_period_date[1];
        $is_active = $request->is_active;

        // check duplicate based on project code and period date
        $isDuplicate = SetScoreModel::checkDuplicate($request->project_code,$format_sql_date);
        if($isDuplicate->count() > 0){
            $confirmation = ['title' => 'Error Duplicate Data', 'messages' => 'Tidak boleh ada Project Code dan Period Date yang sama','icon' => 'error'];
        }else{
            $getHeaderId = SetScoreModel::getMaxIdHeader();
            $idHeader = $getHeaderId->id_header > 0 ? $getHeaderId->id_header + 1: 1;
            $post = array(
                'id_header' => $idHeader,
                'project_code' => $request->project_code,
                'period_date' => $format_sql_date,
                'is_current_active' => $is_active,
                'created_by' => Auth::user()->id
            );
            if(isset($is_active)== 1){
                SetScoreModel::currentSetInActiveOldByProject($request->project_code);
            }
            $insert_set_header_score = SetScoreModel::InsertScoreHeader($post);
            for($i = 0;$i < count($arr_category); $i++){
                $post_detail = array(
                    'score' => $arr_score[$i],
                    'category' => $arr_category[$i],
                    'initial' => $arr_initial[$i],
                    'id_header' => $idHeader
                );
                $insert_set_detail_score = SetScoreModel::InsertScoreDetailPerProject($post_detail);
            //    $insert_set_score = SetSocreModel
            }

            if($insert_set_header_score){
                $confirmation = ['title' => 'Set Score success added', 'icon' => 'success'];
            }else{
                $confirmation = ['title' => 'Set Score error added', 'icon' => 'error'];
            }
        }

        return response()->json($confirmation);
    }
}
