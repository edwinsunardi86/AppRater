<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_v1(){
        return view('dashboard.dashboard_v1',[
            'title'=>'Dashboard V1',
            'active_gm'=>'Dashboard',
            'active_m'=>'dashboard_v1'
        ]);
    }
}
