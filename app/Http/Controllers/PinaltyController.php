<?php

namespace App\Http\Controllers;

use App\Models\DatabaseModel;
use Illuminate\Http\Request;
use App\Models\PinaltyModel;
use Yajra\DataTables\DataTables as DataTables;
class PinaltyController extends Controller
{
    public function index(){
        return view('project.pinalty.index',[
            'title' => 'Setup Pinalty',
            'active_gm' => 'Setup Project',
            'active_m'=>'pinalty'
        ]);
    }

    public function getDataTablePinalty(){
        $getData = PinaltyModel::getDataPinalty();
        return DataTables::of($getData)->addColumn('action',function($row){
            $btn = "<a class=\"btn btn-info btn-md\" href=\"/pinalty/edit/".$row->id_header."\">Edit</a>
            <form id=\"deletePinalty".$row->id_header."\" class=\"d-inline\" onsubmit=\"event.preventDefault()\" method=\"post\">
            <button class=\"btn btn-md btn-danger\" onclick=\"deletePinalty(".$row->id_header.")\">Delete</button>
            </form>";
            return $btn;
        })->make();
    }

    public function create(){
        return view('project.pinalty.create',[
            'title' => 'Setup Pinalty',
            'active_gm' => 'Setup Project',
            'active_m'=>'pinalty'
        ]);
    }

    public function store_pinalty(Request $request){
        $id_header_set_score = $request->id_header_set_score;
        $arr_percentage = $request->percent_id;
        $idHeader = DatabaseModel::getMaxIdHeader('header_pinalty');
        $getIdHeader = $idHeader->id_header != 1 ? $idHeader->id_header+1 : 1;
        $exp_start_date = explode("/",$request->start_date);
        $start_date = $exp_start_date[2]."-".$exp_start_date[0]."-".$exp_start_date[1];
        $exp_finish_date = explode("/",$request->finish_date);
        $finish_date = $exp_finish_date[2]."-".$exp_finish_date[0]."-".$exp_finish_date[1];
        $post = array(
            'id_header'=>$getIdHeader,
            'id_header_set_score'=>$id_header_set_score,
            'start_date'=>$start_date,
            'finish_date'=>$finish_date
        );
        $insertData = DatabaseModel::insertData('header_pinalty',$post);
        for($i = 0; $i < count($arr_percentage); $i++){
            $post = array(
                'id_header'         =>  $getIdHeader,
                'percent_pinalty'   =>  $request->percent_id[$i]['percent_pinalty'],
                'score'             =>  $request->percent_id[$i]['score']
            );
            $insertData = DatabaseModel::insertData('detail_pinalty',$post);
        }
        $confirmation = ['message' => 'Insert Set Pinalty Success','icon' => 'success', 'redirect'=>'/pinalty'];
        return response()->json($confirmation);
    }

    public function edit($id_header){
        $getDataHeader = PinaltyModel::getDataHeaderPinalty($id_header);
        // $getDataDetail = DatabaseModel::getData('detail_pinalty',array('id_header'=>$id_header))->get();
        return view('project.pinalty.edit',[
            'title' => 'Setup Pinalty',
            'active_gm' => 'Setup Project',
            'active_m'=>'pinalty',
            'header_pinalty' => $getDataHeader
        ]);
    }

    public function getDetailScorePinalty($id_header){
        $getDataDetail = PinaltyModel::getDataDetailPinaltyScore($id_header);
        return response()->json($getDataDetail);
    }

    public function update_pinalty(Request $request){
        $id_header_set_score = $request->id_header_set_score;
        $arr_percentage = $request->percent_id;
        $exp_start_date = explode("/",$request->start_date);
        $start_date = $exp_start_date[2]."-".$exp_start_date[0]."-".$exp_start_date[1];
        $exp_finish_date = explode("/",$request->finish_date);
        $finish_date = $exp_finish_date[2]."-".$exp_finish_date[0]."-".$exp_finish_date[1];
        $post = array(
            'id_header_set_score'=>$id_header_set_score,
            'start_date'=>$start_date,
            'finish_date'=>$finish_date
        );
        $updateData = DatabaseModel::updateData('header_pinalty',$post,'id_header',$request->id_header);
        $deleteData = DatabaseModel::deleteData('detail_pinalty','id_header',$request->id_header);
        for($i = 0; $i < count($arr_percentage); $i++){
            $post = array(
                'id_header'         =>  $request->id_header,
                'percent_pinalty'   =>  $request->percent_id[$i]['percent_pinalty'],
                'score'             =>  $request->percent_id[$i]['score']
            );
            $updateData = DatabaseModel::insertData('detail_pinalty',$post);
        }
        $confirmation = ['message' => 'Update Set Pinalty Success','icon' => 'success', 'redirect'=>'/pinalty'];
        return response()->json($confirmation);
    }

    public function delete_pinalty(Request $request){
        $getDataManagementFee = DatabaseModel::getData('management_fee',array('id_header_pinalty',$request->id_header))->get();
        if($getDataManagementFee->count() == 0){
            $deleteDataHeader = DatabaseModel::deleteData('detail_pinalty','id_header',$request->id_header);
            $deleteDataDetail = DatabaseModel::deleteData('header_pinalty','id_header',$request->id_header);
            $confirmation = ['message' => 'Delete Set Pinalty Success','icon' => 'success', 'redirect'=>'/pinalty'];
        }else{
            $confirmation = ['message' => 'Delete Set Pinalty Failed','icon' => 'error', 'redirect'=>'/pinalty'];
        }
        return response()->json($confirmation);
    }

    public function getDataTablePinaltyPerProjectToSelected(Request $request){
        $getData = PinaltyModel::getDataPinaltyByProject($request->project_code);
        return DataTables::of($getData)->addColumn('action',function($row){
            $btn = "<button type=\"button\" class=\"btn_choice btn btn-sm bg-purple\" data-id_header_pinalty=\"$row->id_header\" data-period=\"$row->period\" data-pinalty_score=\"$row->pinalty_score\" data-dismiss=\"modal\">Pilih</button>";
            return $btn;
        })->make();
    }
}
