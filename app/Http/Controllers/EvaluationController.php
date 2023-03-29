<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    function form_evaluation(){
        $service = DB::table('m_service')->get();
        return view('evaluation.form_evaluation',[
            'title' => 'Evaluation Project',
            'active_gm' => 'Evaluation',
            'active_m'=>'form_evaluation',
            'service'=>$service
        ]);
    }

    function store_evaluation(Request $request){
        $arr_sub_area_id = explode(",",$request->sub_area_id);
        $arr_score = explode(",",$request->score);
        $project_code = $request->project_code;
        $exp_date_evaluation = explode("/",$request->date_evaluation);
        
        for($i=0;$i<count($arr_sub_area_id);$i++){
            $post = array(
                'project_code' => $project_code,
                'appraisal_date'   => $exp_date_evaluation[2]."-".$exp_date_evaluation[0]."-".$exp_date_evaluation[1],
                'sub_area_id'  => $arr_sub_area_id[$i],
                'score'        => $arr_score[$i],
                'created_by'   => Auth::id()   
            );
            $insert_evaluation = DB::table('evaluation')->insert($post);
        
        }
        if($insert_evaluation){
            $confirmation = ['message' => 'Rating successfully added', 'icon' => 'success', 'redirect' => '/evaluation/form_evaluation']; 
        }else{
            $confirmation = ['message' => 'Rating failed added', 'icon' => 'error', 'redirect' => '/evaluation/form_evaluation']; 
        }
        return response()->json($confirmation);
    }
}
