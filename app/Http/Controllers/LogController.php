<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogModel;
class LogController extends Controller
{
    public function log_sign_report(){
        return view('log.log_sign_report',[
            'title' => 'Report Log Sign',
            'active_gm' => 'Log',
            'active_m'=>'log/log_sign_report',
        ]);
    }
    
    public function getDataLogSignReport(Request $request){
        $query = LogModel::getDatalogSignReport($request->project,$request->month,$request->year);
        return response()->json($query);
    }
}
