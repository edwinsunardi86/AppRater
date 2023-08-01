<?php

namespace App\Http\Controllers;

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
            $btn = "<a class=\"btn btn-md btn-info\" data-toggle=\"modal\" data-target=\"#modal-fee_location\" data-id=\"$row->id\">Edit</a>";
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
}
