<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EvaluationController extends Controller
{
    function form_evaluation(){
        $service = DB::table('m_service')->get();
        return view('evaluation.form_evaluation',[
            'title' => 'Evaluation Project',
            'active_gm' => 'Evaluation',
            'active_m'=>'form_evaluation',
            'service'=>$service
        ]);
    }
}
