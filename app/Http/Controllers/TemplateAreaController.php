<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateAreaController extends Controller
{
    function index(){

    }
    
    function create(){
        return view('project.template_area.create',
        [
            'title' => 'Template Area',
            'active_gm' => 'Template Area',
            'active_m'=>'template_area'
        ]
        );
    }
}
