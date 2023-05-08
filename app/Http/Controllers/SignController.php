<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    function signatureDigital(){
        return view(
            'sign.signature_digital',
            [
                'title' => 'Sign',
                'active_gm' => 'Sign',
                'active_m'=>'sign/signature_digital'
            ]
        );
    }
}
