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
            'active_m'=>'evaluation/form_evaluation',
            'service'=>$service
        ]);
    }

    function store_evaluation(Request $request){
        $arr_sub_area_id = explode(",",$request->sub_area_id);
        $arr_score = explode(",",$request->score);
        $project_code = $request->project_code;
        $exp_date_evaluation = explode("/",$request->date_evaluation);
        $format_date_sql = $exp_date_evaluation[2]."-".$exp_date_evaluation[0]."-".$exp_date_evaluation[1];
        $get_duplicate_evaluation = DB::table('evaluation')->
        join('setup_sub_area','setup_sub_area.id','=','evaluation.sub_area_id')->
        join('setup_area','setup_area.id','=','setup_sub_area.area_id')->
        where('project_code',$project_code)->
        where('appraisal_date',$format_date_sql)->
        where('setup_area.location_id',$request->location_id)->
        get();
        if($get_duplicate_evaluation->count() > 0){
            $confirmation = ['message' => 'Error : Duplicated Data', 'icon' => 'error', 'redirect' => '/evaluation/form_evaluation']; 
        }else{
            for($i=0;$i<count($arr_sub_area_id);$i++){
                $post = array(
                    'project_code' => $project_code,
                    'appraisal_date'   => $format_date_sql,
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
        }
        
        return response()->json($confirmation);
    }

    function get_year_evaluation_project_per_location(Request $request){
            $project_code = $request->project_code;
            $location_id = $request->location_id;
            $sql = 'select year(appraisal_date)AS year_project from evaluation a
            INNER JOIN setup_sub_area b ON b.id = a.sub_area_id
            INNER JOIN setup_area c ON c.id = b.area_id
            INNER JOIN setup_location d ON d.id = c.location_id
            INNER JOIN setup_region e ON e.id = d.region_id
            where a.project_code ="'.$project_code.'"'; 
            if($request->location_id != ""){
                $sql = $sql."and d.id = '".$location_id."'";
            }
            $sql = $sql." group by year(appraisal_date)";
            
            $get_year = DB::select($sql);
            return response()->json($get_year);
    }
}
