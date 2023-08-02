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
            $btn = "<a class=\"btn btn-md btn-info data-location\" data-toggle=\"modal\" data-target=\"#modal-fee_location\" data-id=\"$row->id\">Edit</a>";
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
        for($i = 0;$i < count($request->arr_fee_location); $i++){
            $post = array(
                'id_header_pinalty'=>$request->id_header_pinalty,
                'start_date'=>$request->start_date,
                'finish_date'=>$request->finish_date,
                'location_id'=>$request->arr_fee_location[$i]['location_id'],
                'fee'=>$request->arr_fee_location[$i]['fee']
            );
            $insert = DatabaseModel::insertData('management_fee',$post);
        }
        $confirmation = ['message' => 'Data Management Fee added','icon' => 'success', 'redirect'=>'/management_fee'];
        return response()->json($confirmation);
    }
}
