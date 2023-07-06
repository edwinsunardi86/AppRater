<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateAreaModel;
use Illuminate\Support\Facades\Auth;
class TemplateAreaController extends Controller
{
    function index(){

    }
    
    function create(){
        return view('project.template_area.create',
        [
            'title' => 'Template Area',
            'active_gm' => 'Template Area',
            'active_m'=>'template_area'
        ]
        );
    }

    function storeDataTemplateArea(Request $request){
        // var_dump($request->arr_data[0][1]['data']);
        // var_dump($request->arr_data[0][0]);
        // echo $request->arr_data[0][0]['areaName'];
        // echo count($request->arr_data);
        $exp_start_date = explode("/",$request->start_date);
        $exp_finish_date = explode("/",$request->finish_date);
       
        $start_date = $exp_start_date[2]."-".$exp_start_date[0]."-".$exp_start_date[1];
        $finish_date = $exp_finish_date[2]."-".$exp_finish_date[0]."-".$exp_finish_date[1];
        $post_header = array(
            'location_id'=>$request->location_name,
            'start_date'=>$start_date,
            'finish_date'=>$finish_date,
        );
        // check periode tanggal bila ada data location id yang sama dengan input
        $checkConflictPeriod = TemplateAreaModel::getConflictPeriodPerlocationId($request->location_id,$start_date);
        echo $checkConflictPeriod->count(); die();
        if($checkConflictPeriod->count() > 0){
            $confirmation = ['message' => 'There is your period conflict', 'icon' => 'success', 'redirect' => '/template_area/create'];
            echo 'dup';
        }else{
            $max_id = TemplateAreaModel::getMaxHeaderTemplate();
            $post_header = array(
                'id'            => $max_id->max_id == null ? 1 : $max_id->max_id+1,
                'location_id'   => $request->location_id,
                'start_date'    => $start_date,
                'finish_date'   => $finish_date,
                'created_by'    => Auth::id()    
            );

            TemplateAreaModel::insert_header_template($post_header);
            $i = 0;
            for($i = 0 ; $i < count($request->arr_data); $i++){
                echo $request->arr_data[$i][0]['areaName'];
            }
        }

       
        
    }
}
