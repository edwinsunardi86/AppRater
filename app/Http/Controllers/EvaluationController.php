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

    function get_year_evaluation_project_per_location(Request $request){
            $project_code = $request->project_code;
            $location_id = $request->location_id;
            // $get_report = DB::table('evaluation')->join('setup_project_detail','setup_project_detail.project_code = evaluation.project_code','AND','setup_project_detail.sub_area_id = evaluation.sub_area_id')->get();
            $get_year = DB::select(DB::Raw('select year(appraisal_date)AS year_project from evaluation a inner join setup_project_detail b ON b.project_code = a.project_code and b.sub_area_id = a.sub_area_id INNER JOIN m_sub_area c ON c.id = b.sub_area_id
            INNER JOIN m_area d ON d.id = c.area_id
            INNER JOIN m_location e ON e.id = d.location_id
            where a.project_code ="'.$project_code.'" and e.id = "'.$location_id.'" group by year(appraisal_date)'));
            return response()->json($get_year);
        }
}
