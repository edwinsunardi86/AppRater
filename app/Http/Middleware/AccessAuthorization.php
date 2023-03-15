<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AccessAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // echo Auth::id(); die();
        $user_prev = DB::table('usersprivilege')->select('usersprivilege.menu_id','menu.path')->join('menu','usersprivilege.menu_id','=','menu.id')->where('user_id',Auth::id())->get();
        $arr_menu_prev = array();
        foreach($user_prev as $row){
            array_push($arr_menu_prev,strtolower($row->path));
        }
        // print_r($arr_menu_prev); die();
        // echo $request->path();die();
        // print_r(in_array($request->path(),$arr_menu_prev)); die();
        $exp_path = explode("/",$request->path());
        if(in_array($exp_path[0],$arr_menu_prev)){
            return $next($request);
        }else{
            return redirect('dashboard_v1');
        }
        // echo $request->path(); die();
        return $next($request);
    }
}
