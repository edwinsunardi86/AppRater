<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateAreaModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables as DataTables;
class TemplateAreaController extends Controller
{
    function index(){
        return view('project.template_area.index',
        [
            'title' => 'Template Area',
            'active_gm' => 'Template Area',
            'active_m'=>'template_area'
        ]
        );
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
        // var_dump($request->arr_data[0][1]['data'][0]); die();
        //echo count($request->arr_data[0][1]['data']); die();
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
        if($checkConflictPeriod->count() > 0){
            $confirmation = ['message' => 'There is your period conflict', 'icon' => 'error', 'is_valid' => '0'];
        }else{
            $max_header = TemplateAreaModel::getMaxIdHeaderTemplate();
            $max_header = $max_header->max_id == null ? 1 : $max_header->max_id+1;
            $post_header = array(
                'id'            => $max_header,
                'location_id'   => $request->location_id,
                'start_date'    => $start_date,
                'finish_date'   => $finish_date,
                'created_by'    => Auth::id()    
            );

            TemplateAreaModel::insert_header_template($post_header);
            for($i = 0 ; $i < count($request->arr_data); $i++){
                $max_id_area = TemplateAreaModel::getMaxIdTemplateArea();
                $max_id_area = $max_id_area->max_id == null ? 1 : $max_id_area->max_id+1;
                $post_area = array(
                    'id_header' => $max_header,
                    'id'        => $max_id_area,
                    'area_name' => $request->arr_data[$i][0]['areaName'],
                    'service_code' => $request->arr_data[$i][0]['serviceCode']
                );
                TemplateAreaModel::insert_template_area($post_area);
                $getSubAreaName = $request->arr_data[$i][1]['data'];
                // var_dump($getSubAreaName);
                foreach($getSubAreaName as $row){
                    $post_sub_area = array(
                        'id_area'=>$max_id_area,
                        'sub_area_name'=>$row['sub_area_name']
                    );
                    TemplateAreaModel::insert_template_sub_area($post_sub_area);
                }               
            }
            $confirmation = ['message' => 'Insert Template Area Success', 'icon' => 'success', 'is_valid' => '1','redirect' => '/template_area/create'];
        }
        return response()->json($confirmation);
    }

    function getDataTableTemplateArea(){
        $getData = TemplateAreaModel::getDataTemplateArea2();
        return DataTables::of($getData)->addColumn('action',function($row){
            $btn = "<a href='/template_area/detail_template_area/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>";
            return $btn;
        })->make();
        var_dump($getData);
    }
}
