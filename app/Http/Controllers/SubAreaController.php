<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;

class SubAreaController extends Controller
{
    function index(){
        return view('master.sub_area.index',[
            'title' => 'Master Sub Area',
            'active_gm' => 'Master',
            'active_m'=>'sub_area',
        ]);
    }

    function get_datatable_sub_area(){
        $db = DB::table('m_sub_area')->join('m_area','m_area.id','=','m_sub_area.area_id')->join('m_location','m_location.id','=','m_area.location_id')->select('m_sub_area.id','m_sub_area.sub_area_name',DB::raw('m_sub_area.description AS sub_area_description'),'m_area.area_name',DB::raw('m_area.description AS area_description'),'location_name','m_location.address',DB::Raw('m_location.description AS location_description'),'region_name',DB::Raw('m_region.description AS region_description'))->join('m_region','m_region.id','=','m_location.region_id')->get();
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
        return view('master.sub_area.create',[
            'title' => 'Master Sub Area',
            'active_gm' => 'Master',
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
            DB::table('m_sub_area')->insert($post);
        }
        $confirmation = ['message' => 'Data Sub Area success added','icon' => 'success', 'redirect'=>'/sub_area'];
        return response()->json($confirmation);
    }

    public function detail_sub_area($id){
        $get_sub_area = DB::table('m_sub_area')->join('m_area','m_area.id','=','m_sub_area.area_id')->join('m_location','m_area.location_id','=','m_location.id')->join('m_region','m_location.region_id','=','m_region.id')->select(DB::Raw('m_area.id AS area_id'),'area_name',DB::Raw('m_area.description AS area_description,m_location.id AS location_id,m_sub_area.id AS sub_area_id,m_sub_area.description AS sub_area_description'),'sub_area_name')->where('m_sub_area.id',$id)->first();
        return view('master.sub_area.detail',[
            'sub_area' => $get_sub_area,
            'title' => 'Master Sub Area',
            'active_gm' => 'Master',
            'active_m'=>'sub_area'
        ]);
    }

    public function edit_sub_area($id){
        $get_sub_area = DB::table('m_sub_area')->join('m_area','m_area.id','=','m_sub_area.area_id')->join('m_location','m_area.location_id','=','m_location.id')->join('m_region','m_location.region_id','=','m_region.id')->select(DB::Raw('m_area.id AS area_id'),'area_name',DB::Raw('m_area.description AS area_description,m_location.id AS location_id,m_sub_area.id AS sub_area_id,m_sub_area.description AS sub_area_description'),'sub_area_name')->where('m_sub_area.id',$id)->first();
        return view('master.sub_area.edit',[
            'sub_area' => $get_sub_area,
            'title' => 'Master Sub Area',
            'active_gm' => 'Master',
            'active_m'=>'sub_area'
        ]);
    }

    public function update_sub_area(Request $request){
        $get_detail_project = DB::table('setup_project_detail')->where('sub_area_id',$request->sub_area_id)->get();
        $post = array(
            'area_id'=>$request->area_id,
            'sub_area_name'=>$request->sub_area_name,
            'description'=>$request->sub_area_description,
        );
        if($get_detail_project->count() > 0){
            $confirmation = ['message' => 'Data Sub Area contains one or several setup project','icon' => 'error', 'redirect'=>'/sub_area'];
        }else{
            $update = DB::table('m_sub_area')->where('id',$request->sub_area_id)->update($post);
            if($update){
                $confirmation = ['message' => 'Data Sub Area success updated','icon' => 'success', 'redirect'=>'/sub_area'];
            }else{
                $confirmation = ['message' => 'Data Sub Area failed updated','icon' => 'error', 'redirect'=>'/sub_area'];
            }
            
        }
        return response()->json($confirmation);
    }
    
    public function delete_sub_area(Request $request){
        $get_detail_project = DB::table('setup_project_detail')->where('sub_area_id',$request->sub_area_id)->get();
        $sub_area_id = $request->sub_area_id;
        $get_data_sub_area = DB::table('m_sub_area')->where('id',$sub_area_id)->first();
        if($get_detail_project->count() > 0){
            $confirmation = ['message' => 'Data Sub Area contains one or several setup project','icon' => 'error', 'redirect'=>'/sub_area'];
        }else{
            $delete_data_sub_area = DB::table('m_sub_area')->where('id',$sub_area_id)->delete($sub_area_id);
            if($delete_data_sub_area){
                $confirmation = ['message' => 'Data Sub Area ' . $get_data_sub_area->sub_area_name . ' success deleted', 'icon' => 'success', 'redirect' => '/sub_area'];
            }else{
                $confirmation = ['message' => 'Data Sub Area ' . $get_data_sub_area->sub_area_name . ' failed deleted', 'icon' => 'error', 'redirect' => '/sub_area'];
            }
        }
        
        return response()->json($confirmation);
    }
}
