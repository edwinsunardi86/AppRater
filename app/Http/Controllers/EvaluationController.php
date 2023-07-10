<?php

namespace App\Http\Controllers;

use App\Models\EvaluationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SetScoreModel;
use Illuminate\Support\Facades\Mail;

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
        $arr_recommend = explode(",",$request->recommend);
        $arr_score = explode(",",$request->score);
        $exp_date_evaluation = explode("/",$request->date_evaluation);
        $format_date_sql = $exp_date_evaluation[2]."-".$exp_date_evaluation[0]."-".$exp_date_evaluation[1];
        $get_duplicate_evaluation = DB::table('header_evaluation')->
        where('appraisal_date',$format_date_sql)->
        where('location_id',$request->location_id)->
        get();
        if($get_duplicate_evaluation->count() > 0){
            $confirmation = ['message' => 'Error : Duplicated Data', 'icon' => 'error', 'redirect' => '/evaluation/form_evaluation']; 
        }else{
            $getData = DB::table('header_evaluation')->select(DB::Raw('MAX(id_header) AS id_header'))->first();
            $idHeader = $getData->id_header > 0 ? $getData->id_header + 1: 1;
            $post_header = array(
                'id_header'=>$idHeader,
                'location_id'=>$request->location_id,
                'appraisal_date'=>$format_date_sql,
                'created_by'=>Auth::user()->id
            );
            $insert_header = DB::table('header_evaluation')->insert($post_header);
            if(!$insert_header){
                echo 'insert table header_evaluation failed'; die();
            }else{
                for($i=0;$i<count($arr_sub_area_id);$i++){
                    $post = array(
                        'id_header'         => $idHeader,
                        'sub_area_id'       => $arr_sub_area_id[$i],
                        'critic_recommend'  => $arr_recommend[$i],
                        'score'             => $arr_score[$i],
                        'created_by'        => Auth::id()
                    );
                    $insert_score_evaluation = DB::table('score_evaluation')->insert($post);
                    if(!$insert_score_evaluation){
                        echo 'insert table header_evaluation failed'; die();
                    }
                }
            }
            
            if($insert_header && $insert_score_evaluation){
                $confirmation = ['message' => 'Rating successfully added', 'icon' => 'success', 'redirect' => '/evaluation/form_evaluation'];
                $getDataClient = EvaluationModel::getDataClientByLocationId($request->location_id);
                $data['client_name'] = $getDataClient->client_name;
                $data['location_name'] = $getDataClient->location_name;
                $data['rater'] = Auth::user()->fullname;
                $data['date_appraisal'] = $request->date_evaluation;
                $data['email'] = Auth::user()->email;
                Mail::to($data['email'])->send(new \App\Mail\FormatEmail($data));
            }else{
                $confirmation = ['message' => 'Rating failed added', 'icon' => 'error', 'redirect' => '/evaluation/form_evaluation']; 
            }
        }
        return response()->json($confirmation);
    }

    function get_year_evaluation_project_per_location(Request $request){
            $project_code = $request->project_code;
            $location_id = $request->location_id;
            $sql = 'select year(appraisal_date)AS year_project from score_evaluation a
            INNER JOIN header_evaluation b ON a.id_header = b.id_header
            INNER JOIN setup_location c ON c.id = b.location_id
            INNER JOIN setup_region d ON d.id = c.region_id
            WHERE d.project_code ="'.$project_code.'"'; 
            if($request->location_id != ""){
                $sql = $sql."AND b.location_id = '".$location_id."'";
            }
            $sql = $sql." group by year(appraisal_date)";
            $get_year = DB::select($sql);
            return response()->json($get_year);
    }

    function setScoreCurrentActiveScoreInEvaluation(Request $request){
        $query_builder = SetScoreModel::getCurrentActiveByProject($request->project_code);
        return response()->json($query_builder);
    }

    function getDataTemplateSubArea(Request $request){
        $exp_date_evaluation = explode("/",$request->date_evaluation);
        $date = $exp_date_evaluation[2]."-".$exp_date_evaluation[0]."-".$exp_date_evaluation[1];
        $getArea = EvaluationModel::getDataTemplateSubAreaPerPeriod($request->location_id,$date);
        return response()->json($getArea);
    }
}
