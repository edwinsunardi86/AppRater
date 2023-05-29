<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory as IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    function list_project(){
        return view('project.list_project',
        [
            'title' => 'Project',
            'active_gm' => 'Setup Project',
            'active_m'=>'project'
        ]
        );
    }
    function form_project(){
        return view('project.form_project',[
            'title' => 'Project',
            'active_gm' => 'Setup Project',
            'active_m'=>'project'
        ]);
    }

    function edit_project($project_code){
        $query = DB::table('setup_project')->select('setup_project.project_code','setup_project.project_name',DB::Raw('DATE_FORMAT(setup_project.contract_start,"%Y/%m/%d") AS contract_start'),DB::Raw('DATE_FORMAT(setup_project.contract_finish,"%Y/%m/%d") AS contract_finish'),DB::Raw('m_client.id AS client_id'),'client_name')->join('m_client','m_client.id','=','setup_project.client_id')->where('project_code',$project_code)->first();
        // var_dump($query);
        return view('project.edit_project',[
            'project'=> $query,
            'title' => 'Project',
            'active_gm' => 'Setup Project',
            'active_m'=>'project'
        ]);
    }
    // function get_detail_region(Request $request){
    //     $region = isset($request->region_name) ? $request->region_name : array();
    //     $detail_region = DB::table('m_region')->join('m_location','m_location.region_id','=','m_region.id')->select(DB::Raw('m_location.id AS location_id'),'m_region.region_name','m_location.location_name','m_location.address')->whereIn('m_region.id',$region)->get();
    //     return response()->json($detail_region);
    // }

    // function get_detail_location($id){
    //     $location = DB::table('m_location')->join('m_area','m_area.location_id','=','m_location.id')->join('m_sub_area','m_sub_area.area_id','=','m_area.id')->select(DB::Raw('m_location.id AS location_id'),'m_area.id','m_area.area_name','m_sub_area.id','sub_area_name')->where('m_location.id',$id)->get();
    //     return response()->json($location);
    // }

    function store_project(Request $request){
        $exp_date_contract = explode(" - ",$request->date_contract);
        $contract_start = str_replace("/","-",$exp_date_contract[0]);
        $contract_finish = str_replace("/","-",$exp_date_contract[1]);
        $project_code = $request->project_name.date('Ymd');
        $post = array(
            'client_id' => $request->client_id,
            'project_code' => $project_code,
            'project_name' => $request->project_name,
            'contract_start' => $contract_start,
            'contract_finish' => $contract_finish,
            'created_by' => Auth::id()
        );
        $insert_project = DB::table('setup_project')->insert($post);
        if($insert_project){
            $confirmation = ['message' => 'Project success added', 'icon' => 'success', 'redirect' => '/project'];
        }else{
            $confirmation = ['message' => 'Project failed added', 'icon' => 'success', 'redirect' => '/project'];
        }
        
        return response()->json($confirmation);
    }

    function get_project_to_selected(Request $request){
        $get_project = DB::table('setup_project')->select('project_code','project_name')->where('client_id',$request->client_id)->get();
        return response()->json($get_project);
    }

    function getDataTableProject(){
        $db = DB::table('setup_project')->select('setup_project.project_code','setup_project.project_name','m_client.client_name',DB::Raw('DATE_FORMAT(setup_project.contract_start,"%d-%m-%Y") AS contract_start'),DB::Raw('DATE_FORMAT(setup_project.contract_finish,"%d-%m-%Y") AS contract_finish'))->join('m_client','setup_project.client_id','=','m_client.id')->get();
        return DataTables::of($db)->addColumn('action',function($row){
            $btn = "<a href='/project/detail_project/$row->project_code' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/project/edit_project/".$row->project_code."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteProject_$row->project_code\" class='d-inline' onsubmit=\"event.preventDefault()\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteProject('$row->project_code','$row->project_name')\"><i class=\"fas fa-solid fa-trash\"></i> Delete</button>
            </form>";
            return $btn;
          })->make();
    }

    function update_project(Request $request){
        $exp_date_contract = explode(" - ",$request->dateContractEdit);
        $contract_start = str_replace("/","-",$exp_date_contract[0]);
        $contract_finish = str_replace("/","-",$exp_date_contract[1]);
        $post = array(
            'client_id' => $request->client_id,
            'project_name' => $request->project_name,
            'contract_start' => $contract_start,
            'contract_finish' => $contract_finish
        );
        $getRegion = DB::table('setup_region')->where('setup_region.project_code',$request->project_code)->get();
        if($getRegion->count() > 0){
            $confirmation = ['message' => 'Data project  contains one or several Region','icon' => 'error', 'redirect'=>'/project'];
        }else{
            $insert = DB::table('setup_project')->where('project_code',$request->project_code)->update($post);
            if($insert){
                $confirmation = ['message' => 'Data project success updated','icon' => 'success', 'redirect'=>'/project'];
            }else{
                $confirmation = ['message' => 'Data project failed updated','icon' => 'error', 'redirect'=>'/project'];
            }
        }
        return response()->json($confirmation);
    }

    function detail_project($project_code){
        $query = DB::table('setup_project')->select('setup_project.project_code','setup_project.project_name',DB::Raw('DATE_FORMAT(setup_project.contract_start,"%Y/%m/%d") AS contract_start'),DB::Raw('DATE_FORMAT(setup_project.contract_finish,"%Y/%m/%d") AS contract_finish'),DB::Raw('m_client.id AS client_id'),'client_name')->join('m_client','m_client.id','=','setup_project.client_id')->where('project_code',$project_code)->first();
        // var_dump($query);
        return view('project.detail_project',[
            'project'=> $query,
            'title' => 'Project',
            'active_gm' => 'Setup Project',
            'active_m'=>'project'
        ]);
    }

    function delete_project(Request $request){
        $getRegion = DB::table('setup_region')->where('project_code',$request->project_code)->get();
        if($getRegion->count() > 0){
            $confirmation = ['message' => 'Data project has one or several region','icon' => 'error', 'redirect'=>'/project'];
        }else{
            $delete = DB::table('setup_project')->where('project_code',$request->project_code)->delete();
            if($delete){
                $confirmation = ['message' => 'Data failed success deleted', 'icon' => 'success', 'redirect'=>'/project'];
            }else{
                $confirmation = ['message' => 'Data error success deleted', 'icon' => 'error', 'redirect'=>'/project'];
            }
        }
        return response()->json($confirmation);
    }

    function uploadProject(){
        return view('project.uploadProject',[
            'title' => 'Upload Project',
            'active_gm' => 'Setup Project',
            'active_m'=>'project/upload_project'
        ]);
    }

    function uploadNewProject(Request $request){
        $file = $request->file('uploadFile');
        $name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $ext = pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION);
        $nameFileUpload = $name."_".date("Ymd hms").".".$ext;
        // echo $nameFileUpload; die();
        $file->storeAs('public/upload/file_project/',$nameFileUpload);
        $reader = IOFactory::createReaderForFile('storage/upload/file_project/'.$nameFileUpload);
        $spreadsheet = $reader->load('storage/upload/file_project/'.$nameFileUpload);
        // $getval = $spreadsheet->getActiveSheet()->getCell('B10')->getValue();
        // echo $getval(); die();
        $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
        $arr_data = [];
        $i = 1;
        for($row = 2;$row <= $highestRow; $row++){
            $project_code = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
            $region_name = $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue();
            $location_name = $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue();
            $area_name = $spreadsheet->getActiveSheet()->getCell('D'.$row)->getValue();
            $sub_area = $spreadsheet->getActiveSheet()->getCell('E'.$row)->getValue();
            $service_name = $spreadsheet->getActiveSheet()->getCell('F'.$row)->getValue();
            // array_push($arr_data,['project_code'=>$project_code,'region_name'=>$region_name,'location_name'=>$location_name,'area_name'=>$area_name,'sub_area_name'=>$sub_area,'service_name'=>$service_name]);
            $post = array('project_code'=>$project_code,'region_name'=>$region_name,'location_name'=>$location_name,'area_name'=>$area_name,'sub_area_name'=>$sub_area,'service_name'=>$service_name);
            DB::table('new_project_temp')->insert($post);
        }
        // var_dump($arr_data);
        // DB::table('new_project_temp')->insert($arr_data);
        $confirmation = ['message' => 'upload new project success', 'icon' => 'success', 'redirect'=>'/project'];
        return response()->json($confirmation);
    }
}
