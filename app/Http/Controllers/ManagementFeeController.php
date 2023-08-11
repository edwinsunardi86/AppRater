<?php

namespace App\Http\Controllers;

use App\Models\DatabaseModel;
use Illuminate\Http\Request;
use App\Models\ManagementFeeModel;
use Yajra\DataTables\DataTables as DataTables;
class ManagementFeeController extends Controller
{
    function index(){
        return view('management_fee.index',[
            'title' => 'Management Fee',
            'active_gm' => 'Management Fee',
            'active_m'=>'management_fee',
        ]);
    }

    function getDataTableManagementFee(){
        $query = ManagementFeeModel::getDataManagementFee();
        return DataTables::of($query)->addColumn('action',function($row){
            $btn = "<a href=\"/management_fee/edit/$row->id_header\" class=\"btn btn-md btn-info data-fee\">Edit</a>
            <form id=\"deleteManagementFee".$row->id_header."\" class=\"d-inline\" onsubmit=\"event.preventDefault()\" method=\"post\">
            <button class=\"btn btn-md btn-danger\" onclick=\"deleteManagementFee(".$row->id_header.")\">Delete</button>
            </form>";
            return $btn;
        })->make();
    }

    function create(){
        return view('management_fee.create',[
            'title' => 'Management Fee',
            'active_gm' => 'Management Fee',
            'active_m'=>'management_fee',
        ]);
    }

    function storeManagementFee(Request $request){
        for($i = 0;$i < count($request->arr_fee_template); $i++){
            $exp_start_date = explode("/",$request->start_date);
            $exp_finish_date =explode("/",$request->finish_date);
            $start_date = $exp_start_date[2]."-".$exp_start_date[0]."-".$exp_start_date[1];
            $finish_date = $exp_finish_date[2]."-".$exp_finish_date[0]."-".$exp_finish_date[1];
            $id_header = ManagementFeeModel::getMaxIdHeaderManagementFee()->id_header;
            $id_header = ($id_header) ? $id_header+1 : 1;
            $post = array(
                'id_header'=>$id_header,
                'id_header_pinalty'=>$request->id_pinalty,
                'start_date'=>$start_date,
                'finish_date'=>$finish_date,
                'id_header_template'=>$request->arr_fee_template[$i]['id_header_template']
            );
            $insert = DatabaseModel::insertData('header_management_fee',$post);
            // echo count($request->arr_fee_template[$i]['fee_service']);
            for($a = 0; $a < count($request->arr_fee_template[$i]['fee_service']); $a++){
                $post = array(
                    'id_header'=>$id_header,
                    'service_code'=>$request->arr_fee_template[$i]['fee_service'][$a]['service_code'],
                    'amount'=>$request->arr_fee_template[$i]['fee_service'][$a]['amount']
                );
                $insert = DatabaseModel::insertData('detail_management_fee',$post);
            }
        }
        $confirmation = ['message' => 'Data Management Fee added','icon' => 'success', 'redirect'=>'/management_fee'];
        return response()->json($confirmation);
    }

    function edit($id){
        $query_header = ManagementFeeModel::getDataHeaderManagementFee(array('a.id_header'=>$id));
        $query_detail = ManagementFeeModel::getDataDetailManagementFee(array('a.id_header'=>$id));
        return view('management_fee.edit',[
            'title' => 'Management Fee',
            'active_gm' => 'Management Fee',
            'active_m'=>'management_fee',
            'data'=>$query_header,
            'data_detail'=>$query_detail
        ]);
    }

    function updateManagementFee(Request $request){
        $exp_start_date = explode("/",$request->start_date);
        $exp_finish_date =explode("/",$request->finish_date);
        $start_date = $exp_start_date[2]."-".$exp_start_date[0]."-".$exp_start_date[1];
        $finish_date = $exp_finish_date[2]."-".$exp_finish_date[0]."-".$exp_finish_date[1];
        $post = array(
            'id_header_pinalty'=>$request->id_pinalty,
            'start_date'=>$start_date,
            'finish_date'=>$finish_date,
            'id_header_template'=>$request->id_header_template,
        );
        $update_header = DatabaseModel::updateData('header_management_fee',$post,'id_header',$request->id);
        $delete = DatabaseModel::deleteData('detail_management_fee','id_header',$request->id);
        for($i = 0; $i < count($request->arr_service); $i++){
            $post = array(
                'id_header'     =>  $request->id,
                'service_code'  =>  $request->arr_service[$i]['service_code'],
                'amount'        =>  $request->arr_service[$i]['amount']
            );
            $insert_detail = DatabaseModel::insertData('detail_management_fee',$post);
        }
        if($update_header || $insert_detail){
            $confirmation = ['message' => 'Data Management Fee updated','icon' => 'success', 'redirect'=>'/management_fee'];
        }else{
            $confirmation = ['message' => 'Data Management Fee failed updated','icon' => 'error', 'redirect'=>'/management_fee'];
        }
        
        return response()->json($confirmation);
    }

    public function deleteManagementFee(Request $request){
            $deleteHeaderManagementFee = DatabaseModel::deleteData('header_management_fee','id_header',$request->id);
            $deleteDetailManagementFee = DatabaseModel::deleteData('detail_management_fee','id_header',$request->id);
            if($deleteHeaderManagementFee && $deleteDetailManagementFee){
                $confirmation = ['message' => 'Delete Management Fee Success','icon' => 'success', 'redirect'=>'/management_fee'];
            }else{
                $confirmation = ['message' => 'Delete Management Fee Failed','icon' => 'error', 'redirect'=>'/management_fee'];
            }
            
        return response()->json($confirmation);
    }
}
