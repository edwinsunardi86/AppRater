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
}
