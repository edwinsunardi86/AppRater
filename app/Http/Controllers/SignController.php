<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    function storeSignatureDigital(Request $request){
        $post = array(
            'sign_binary'=>$request->signature
        );
        $update = DB::table('users')->where('id',Auth::user()->id)->update($post);
        if($update){
            $confirmation = ['message' => 'Sign success insert', 'icon' => 'success', 'redirect' => '/sign/signature_digital'];
        }else{
            $confirmation = ['message' => 'Sign success insert', 'icon' => 'success', 'redirect' => '/sign/signature_digital'];
        }        
        return response()->json($confirmation);
    }
}
