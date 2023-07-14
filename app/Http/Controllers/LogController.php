<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        return view('log.log_sign_report',[
            'title' => 'Report Log Sign',
            'active_gm' => 'Report',
            'active_m'=>'report/report_log_sign'
        ]);
    }
}
