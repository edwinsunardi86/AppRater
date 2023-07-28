<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinaltyModel;
use Yajra\DataTables\DataTables as DataTables;
class PinaltyController extends Controller
{
    public function index(){
        return view('project.pinalty.index',[
            'title' => 'Setup Pinalty',
            'active_gm' => 'Setup Pinalty',
            'active_m'=>'pinalty'
        ]);
    }

    public function getDataTablePinalty(){
        $getData = PinaltyModel::getDataPinalty();
        return DataTables::of($getData)->make();
    }

    public function create(){
        return view('project.pinalty.create',[
            'title' => 'Setup Pinalty',
            'active_gm' => 'Setup Pinalty',
            'active_m'=>'pinalty'
        ]);
    }

    public function store_pinalty(Request $request){
        $project_code = $request->project_code;
        $arr_percentage = $request->percent_id[0]['percent_pinalty'];
        var_dump($arr_percentage);
    }
}
