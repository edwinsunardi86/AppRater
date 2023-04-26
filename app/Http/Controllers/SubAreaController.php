<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;

class SubAreaController extends Controller
{
    function index(){
        return view('project.sub_area.index',[
            'title' => 'Setup Sub Area',
            'active_gm' => 'Setup Project',
            'active_m'=>'sub_area',
        ]);
    }

    function get_datatable_sub_area(){
        $db = DB::table('setup_sub_area')->join('setup_area','setup_area.id','=','setup_sub_area.area_id')->join('setup_location','setup_location.id','=','setup_area.location_id')->join('setup_region','setup_region.id','=','setup_location.region_id')->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('m_client','m_client.id','=','setup_project.client_id')->select('setup_sub_area.id','setup_sub_area.sub_area_name',DB::raw('setup_sub_area.description AS sub_area_description'),'setup_area.area_name',DB::raw('setup_area.description AS area_description'),'location_name','setup_location.address',DB::Raw('setup_location.description AS location_description'),'region_name',DB::Raw('setup_region.description AS region_description'))->get();
        return Datatables::of($db)->addColumn('action', function($row){
            $btn = "<a href='/sub_area/detail_sub_area/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/sub_area/edit_sub_area/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteSubArea_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/sub_area/delete_sub_area/$row->id\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteSubArea($row->id,'$row->sub_area_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
            </form>
            ";
            return $btn;
        })->make();
    }

    function add_sub_area(){
        return view('project.sub_area.create',[
            'title' => 'Master Sub Area',
            'active_gm' => 'Setup Project',
            'active_m'=>'sub_area'
          ]);
    }

    public function store_sub_area(Request $request){
        for($i=0;$i<count($request->sub_area);$i++){
            $post = array(
                'sub_area_name'=>$request->sub_area[$i]['sub_area_name'],
                'area_id'=>$request->area_id,
                'description'=>$request->sub_area[$i]['sub_area_description']
            );
            DB::table('setup_sub_area')->insert($post);
        }
        $confirmation = ['message' => 'Data Sub Area success added','icon' => 'success', 'redirect'=>'/sub_area'];
        return response()->json($confirmation);
    }

    public function detail_sub_area($id){
        $get_sub_area = DB::table('setup_sub_area')->join('setup_area','setup_area.id','=','setup_sub_area.area_id')->join('setup_location','setup_area.location_id','=','setup_location.id')->join('setup_region','setup_location.region_id','=','setup_region.id')->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('m_client','m_client.id','=','setup_project.client_id')->join('m_service','m_service.service_code','=','setup_area.service_code')->select(DB::Raw('setup_area.id AS area_id'),'area_name',DB::Raw('setup_area.description AS area_description,setup_location.id AS location_id,setup_sub_area.id AS sub_area_id,setup_sub_area.description AS sub_area_description'),'location_name','setup_location.address','sub_area_name',DB::Raw('setup_region.id AS region_id'),'region_name',DB::Raw('setup_region.description AS region_description'),'m_service.service_code','service_name','setup_project.project_code','project_name',DB::Raw('m_client.id AS client_id'),'client_name')->where('setup_sub_area.id',$id)->first();
        return view('project.sub_area.detail',[
            'sub_area' => $get_sub_area,
            'title' => 'Master Sub Area',
            'active_gm' => 'Setup Project',
            'active_m'=>'sub_area'
        ]);
    }

    public function edit_sub_area($id){
        $get_sub_area = DB::table('setup_sub_area')
        ->join('setup_area','setup_area.id','=','setup_sub_area.area_id')
        ->join('setup_location','setup_area.location_id','=','setup_location.id')
        ->join('setup_region','setup_location.region_id','=','setup_region.id')
        ->join('setup_project','setup_project.project_code','=','setup_region.project_code')
        ->join('m_client','m_client.id','=','setup_project.client_id')
        ->join('m_service','m_service.service_code','=','setup_area.service_code')
        ->select(DB::Raw('setup_area.id AS area_id'),'area_name',DB::Raw('setup_area.description AS area_description,setup_location.id AS location_id,setup_sub_area.id AS sub_area_id,setup_sub_area.description AS sub_area_description'),'location_name','setup_location.address','sub_area_name',DB::Raw('setup_region.id AS region_id'),'region_name',DB::Raw('setup_region.description AS region_description'),'m_service.service_code','service_name','setup_project.project_code','project_name',DB::Raw('m_client.id AS client_id'),'client_name')->where('setup_sub_area.id',$id)->first();
        return view('project.sub_area.edit',[
            'sub_area' => $get_sub_area,
            'title' => 'Setup Sub Area',
            'active_gm' => 'Setup Project',
            'active_m'=>'sub_area'
        ]);
    }

    public function update_sub_area(Request $request){

        $post = array(
            'area_id'=>$request->area_id,
            'sub_area_name'=>$request->sub_area_name,
            'description'=>$request->sub_area_description,
        );
        $update = DB::table('setup_sub_area')->where('id',$request->sub_area_id)->update($post);
        if($update){
            $confirmation = ['message' => 'Data Sub Area success updated','icon' => 'success', 'redirect'=>'/sub_area'];
        }else{
            $confirmation = ['message' => 'Data Sub Area failed updated','icon' => 'error', 'redirect'=>'/sub_area'];
        }

        return response()->json($confirmation);
    }
    
    public function delete_sub_area(Request $request){
        $get_evaluation = DB::table('evaluation')->where('sub_area_id',$request->sub_area_id)->get();
        $sub_area_id = $request->sub_area_id;
        $get_data_sub_area = DB::table('setup_sub_area')->where('id',$sub_area_id)->first();
        if($get_evaluation->count() > 0){
            $confirmation = ['message' => 'The data for this sub area has already been assessed','icon' => 'error', 'redirect'=>'/sub_area'];
        }else{
            $delete_data_sub_area = DB::table('setup_sub_area')->where('id',$sub_area_id)->delete($sub_area_id);
            if($delete_data_sub_area){
                $confirmation = ['message' => 'Data Sub Area ' . $get_data_sub_area->sub_area_name . ' success deleted', 'icon' => 'success', 'redirect' => '/sub_area'];
            }else{
                $confirmation = ['message' => 'Data Sub Area ' . $get_data_sub_area->sub_area_name . ' failed deleted', 'icon' => 'error', 'redirect' => '/sub_area'];
            }
        }
        
        return response()->json($confirmation);
    }

    public function get_data_sub_area_to_selected(Request $request){
        $get_sub_area = DB::table('setup_sub_area')->join('setup_area','setup_area.id','=','setup_sub_area.area_id')->join('setup_location','setup_area.location_id','=','setup_location.id')->join('m_service','setup_area.service_code','=','m_service.service_code')->select(DB::Raw('setup_area.id AS area_id'),'area_name',DB::Raw('setup_sub_area.id AS sub_area_id'),'sub_area_name','m_service.service_code', 'service_name')->where('setup_location.id',$request->location_id);
        return response()->json($get_sub_area->get());
    }
}
