<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    function index(){
        return view('master.area.index',[
            'title' => 'Master Area',
            'active_gm' => 'Master',
            'active_m'=>'area',
        ]);
    }

    function get_datatable_area(){
        $db = DB::table('m_area')->join('m_service','m_service.service_code','m_area.service_code')->join('m_location','m_location.id','=','m_area.location_id')->join('m_region','m_region.id','=','m_location.region_id')->select('m_area.id','m_area.area_name','m_area.description','m_service.service_name','location_name','m_location.address',DB::Raw('m_location.description AS location_description'),'region_name',DB::Raw('m_region.description AS region_description'))->get();
        return Datatables::of($db)->addColumn('action', function($row){
            $btn = "<a href='/area/detail_area/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/area/edit_area/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteArea_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/area/delete_area/$row->id\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteArea($row->id,'$row->area_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
            </form>
            ";
            return $btn;
        })->make();
    }

    function add_area(){
        $data_service = DB::table('m_service')->get();
        return view('master.area.create',[
            'title' => 'Master Area',
            'active_gm' => 'Master',
            'active_m'=>'area',
            'service'=>$data_service
          ]);
    }

    public function store_area(Request $request){
        // for($i=0;$i<count($request->area);$i++){
        //     $post = array(
        //         'area_name'=>$request->area[$i]['area_name'],
        //         'location_id'=>$request->location_id,
        //         'service_code'=>$request->area[$i]['service'],
        //         'description'=>$request->area[$i]['area_description']
        //     );
        //     DB::table('m_area')->insert($post);
        // }
        $post = array(
            'area_name'=>$request->area_name,
            'location_id'=>$request->location_id,
            'service_code'=>$request->service,
            'description'=>$request->description,
            'created_by'=>Auth::id()
        );
        $insert_area = DB::table('m_area')->insert($post);
        if($insert_area){
            $confirmation = ['message' => 'Data Area success added','icon' => 'success', 'redirect'=>'/area'];
        }else{
            $confirmation = ['message' => 'Data Area failed added','icon' => 'error', 'redirect'=>'/area'];
        }
        
        return response()->json($confirmation);
    }

    public function detail_area($id){
        $get_area = DB::table('m_area')->join('m_service','m_service.service_code','m_area.service_code')->join('m_location','m_area.location_id','=','m_location.id')->join('m_region','m_location.region_id','=','m_region.id')->select('m_area.area_name',DB::Raw('m_area.description AS area_description'),'m_service.service_name','location_name','m_location.address',DB::Raw('m_location.description AS location_description'),'region_name',DB::Raw('m_region.description AS region_description'))->where('m_area.id',$id)->first();
        return view('master.area.detail',[
            'area' => $get_area,
            'title' => 'Master Area',
            'active_gm' => 'Master',
            'active_m'=>'area'
        ]);
    }

    public function edit_area($id){
        $get_area = DB::table('m_area')->join('m_service','m_service.service_code','m_area.service_code')->join('m_location','m_area.location_id','=','m_location.id')->join('m_region','m_location.region_id','=','m_region.id')->select('m_area.area_name',DB::Raw('m_area.id AS area_id,m_area.description AS area_description'),'m_service.service_code','m_service.service_name',DB::Raw('m_location.id AS location_id'),'location_name','m_location.address',DB::Raw('m_location.description AS location_description'),'region_name',DB::Raw('m_region.description AS region_description'))->where('m_area.id',$id)->first();
        $get_service = DB::table('m_service')->get();
        return view('master.area.edit',[
            'area' => $get_area,
            'service' => $get_service,
            'title' => 'Master Area',
            'active_gm' => 'Master',
            'active_m'=>'area'
        ]);
    }

    public function update_area(Request $request){
        $get_sub_area = DB::table('m_sub_area')->where('area_id',$request->area_id)->get();
        $post = array(
            'service_code'=>$request->service,
            'description'=>$request->description,
        );
        if($get_sub_area->count() > 0){
            $confirmation = ['message' => 'Data Area contains one or several data sub area','icon' => 'error', 'redirect'=>'/area'];
        }else{
            $update_area = DB::table('m_area')->where('id',$request->area_id)->update($post);
            if($update_area){
                $confirmation = ['message' => 'Data Area success updated','icon' => 'success', 'redirect'=>'/area'];
            }else{
                $confirmation = ['message' => 'Data Area failed updated','icon' => 'error', 'redirect'=>'/area'];
            }
            
        }
        return response()->json($confirmation);
    }

    public function delete_area(Request $request){
        $area_id = $request->area_id;
        $get_data_area = DB::table('m_area')->where('id',$area_id)->first();
        $delete_data_area = DB::table('m_area')->where('id',$area_id)->delete($area_id);
        $get_sub_area = DB::table('m_sub_area')->where('area_id',$request->area_id)->get();
        if($get_sub_area->count() > 0){
            $confirmation = ['message' => 'Data Area contains one or several data sub area','icon' => 'error', 'redirect'=>'/area'];
        }else{
            if($delete_data_area){
                $confirmation = ['message' => 'Data Area ' . $get_data_area->area_name . ' berhasil dihapus', 'icon' => 'success', 'redirect' => '/area'];
              }else{
                $confirmation = ['message' => 'Data Area ' . $get_data_area->area_name . ' berhasil dihapus', 'icon' => 'success', 'redirect' => '/area'];
              }
        }
        return response()->json($confirmation);
    }

    public function get_data_area_to_selected(Request $request){
        $db = DB::table('m_area')->select('m_area.id','m_area.area_name',DB::Raw('m_area.description AS area_description'))->get();
        return response()->json($db);
    }

    function get_data_description_area_by_id($id){
        $db = DB::table('m_area')->select(DB::Raw('m_area.description AS area_description'))->where('m_area.id',$id)->first();
        return response()->json($db);
    }
    function get_data_service(){
        $data_service = DB::table('m_service')->get();
        return response()->json($data_service);
    }
}
