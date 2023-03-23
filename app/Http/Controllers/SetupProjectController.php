<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SetupProjectController extends Controller
{
    function form_setup_project(){

        return view('setup_project.form_setup_project',[
            'title' => 'Setup Project',
            'active_gm' => 'Project',
            'active_m'=>'setup_project'
        ]);
    }

    function get_detail_region(Request $request){
        $region = isset($request->region_name) ? $request->region_name : array();
        $detail_region = DB::table('m_region')->join('m_location','m_location.region_id','=','m_region.id')->select(DB::Raw('m_location.id AS location_id'),'m_region.region_name','m_location.location_name','m_location.address')->whereIn('m_region.id',$region)->get();
        return response()->json($detail_region);
    }

    function get_detail_location($id){
        $location = DB::table('m_location')->join('m_area','m_area.location_id','=','m_location.id')->join('m_sub_area','m_sub_area.area_id','=','m_area.id')->select(DB::Raw('m_location.id AS location_id'),'m_area.id','m_area.area_name','m_sub_area.id','sub_area_name')->where('m_location.id',$id)->get();
        return response()->json($location);
    }

    function store_project_setup(Request $request){
        $region_id = $request->region_name;
        $exp_region_id = explode(",",$region_id);
        $exp_date_contract = explode(" - ",$request->date_contract);
        $contract_start = str_replace("/","-",$exp_date_contract[0]);
        $contract_finish = str_replace("/","-",$exp_date_contract[1]);
        $project_code = $request->project_name.date('Ymdhis');
        $post = array(
            'client_id' => $request->client_id,
            'project_code' => $request->project_code,
            'project_name' => $request->project_name,
            'project_code' => $request->project_code,
            'contract_start' => $contract_start,
            'contract_finish' => $contract_finish,
            'created_by' => Auth::id()
        );
        DB::table('setup_project')->insert($post);
        foreach($exp_region_id as $row){
            DB::select("call genSetupProject(?,?,?)",array($project_code,$row,Auth::id()));
        }
        
    }
}
