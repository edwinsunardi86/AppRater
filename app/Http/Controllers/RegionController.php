<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    function index(){
        return view('project.region.index',[
            'title' => 'Setup Region',
            'active_gm' => 'Setup Project',
            'active_m'=>'region'
        ]);
    }

    function get_datatable_region(){
        $db = DB::table('setup_region')->select('setup_region.id','region_name','client_name','project_name',DB::raw('setup_region.description AS region_description'))->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('m_client','m_client.id','=','setup_project.client_id')->get();
        return DataTables::of($db)->addColumn('action',function($row){
            $btn = "<a href='/region/detail_region/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/region/edit_region/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteRegion_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/region/delete_region/$row->id\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteRegion($row->id,'$row->region_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
            </form>
            ";
            return $btn;
        })->make();
    }

    public function add_region(){
        return view('project.region.create',[
          'title' => 'Setup Region',
          'active_gm' => 'Setup Project',
          'active_m'=>'region'
        ]);
    }

    public function store_region(Request $request){
        for($i=0;$i<count($request->region);$i++){
            $post = array(
                'project_code'=>$request->region[$i]['project_code'],
                'region_name'=>$request->region[$i]['region_name'],
                'description'=>$request->region[$i]['region_description']
            );
            DB::table('setup_region')->insert($post);
        }
        $confirmation = ['message' => 'Data Region success added','icon' => 'success', 'redirect'=>'/region'];
        return response()->json($confirmation);
    }

    public function detail_region($id){
        $get_region = DB::table('setup_region')->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('m_client','m_client.id','=','setup_project.client_id')->select('setup_region.id','region_name','client_name',DB::Raw('m_client.id  AS client_id'),'setup_region.project_code','project_name','setup_region.description')->where('setup_region.id',$id)->first();
        return view('project.region.detail',[
            'region' => $get_region,
            'title' => 'Setup Region',
            'active_gm' => 'Setup Project',
            'active_m'=>'region'
        ]);
    }

    public function edit_region($id){
        $get_region = DB::table('setup_region')->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('m_client','m_client.id','=','setup_project.client_id')->select('setup_region.id','region_name','client_name',DB::Raw('m_client.id  AS client_id'),'setup_region.project_code','project_name','setup_region.description')->where('setup_region.id',$id)->first();
        return view('project.region.edit',[
            'region' => $get_region,
            'title' => 'Setup Region',
            'active_gm' => 'Setup Project',
            'active_m'=>'region'
        ]);
    }

    public function update_region(Request $request){
        $post = array(
            'region_name'=>$request->region_name,
            'project_code'=>$request->project_code,
            'description'=>$request->description,
            'updated_by'=>Auth::id(),
        );
        DB::table('setup_region')->where('id',$request->id)->update($post);
        $confirmation = ['message' => 'Data Region success updated','icon' => 'success', 'redirect'=>'/region'];
        return response()->json($confirmation);
    }
    
    public function delete_region(Request $request){
        $region_id = $request->region_id;
        $get_data_region = DB::table('setup_region')->where('id',$region_id)->first();
        $delete_data_region = DB::table('setup_region')->where('id',$region_id)->delete($region_id);
        $getLocationByRegion = DB::table('setup_location')->where('region_id',$request->region_id)->get();
        if($getLocationByRegion->count() > 0){
            $confirmation = ['message' => 'Data region ' . $get_data_region->region_name . ' contains one or several locations', 'icon' => 'success', 'redirect' => '/region'];
        }else{
            if($delete_data_region){
                $confirmation = ['message' => 'Data region ' . $get_data_region->region_name . ' berhasil dihapus', 'icon' => 'success', 'redirect' => '/region'];
            }else{
                $confirmation = ['message' => 'Data region ' . $get_data_region->region_name . ' gagal dihapus', 'icon' => 'error', 'redirect' => '/region'];
            }
        }
        
        return response()->json($confirmation);
    }

    public function get_data_region_to_selected(Request $request){
        $db = DB::table('setup_region')->select('setup_region.id','region_name','client_name','project_name',DB::raw('setup_region.description AS region_description'))->join('setup_project','setup_project.project_code','=','setup_region.project_code')->join('m_client','m_client.id','=','setup_project.client_id');
        if($request->project_code !=""){
            if(is_array($request->project_code)==1){
                $db->whereIn('setup_project.project_code',$request->project_code);
            }else{
                $db->where('setup_project.project_code',$request->project_code);
            }
            
        }
        
        return response()->json($db->get());
    }
}
