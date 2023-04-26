<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    private $arrMenuParentId;
    private $arrMenuParentName;
    private $arrFontIcon;
    private $count;
    private $html;
    public function __construct(){
        $this->arrMenuParentId = array();
        $this->arrMenuParentName = array();
        $this->arrFontIcon = array();
        $this->html = "";
        $db_menu_parent = DB::table('menu')->select('id','nama_menu','font_icon')->where('menu_parent_id','=',0)->orderBy('sort','asc')->get();
        $this->count = $db_menu_parent->count();
        foreach($db_menu_parent as $row){
            array_push($this->arrMenuParentId,$row->id);
            array_push($this->arrMenuParentName,$row->nama_menu);
            array_push($this->arrFontIcon,$row->font_icon);
        }
    }

    function menu_apps($index,$arr_menu_parent_id,$arr_menu_parent_name,$arr_font_icon,$count,$active_gm,$active_m){
              
        if($index < $this->count){
          $db_menu = DB::table('menu')->join('usersprivilege','usersprivilege.menu_id','=','menu.id')->select('nama_menu','path','font_icon')->where('usersprivilege.user_id',auth()->user()->id)->where('menu_parent_id','=',$arr_menu_parent_id[$index])->get();
          if($db_menu->count() > 0){
            $this->html .= "<li class='nav-item ".($active_gm == $arr_menu_parent_name[$index] ? 'menu-open' : 'menu-close')."'><a href='#' class='nav-link ".($active_gm== $arr_menu_parent_name[$index] ? 'active' : '')."'><i class='nav-icon ".$arr_font_icon[$index]."'></i><p>".$arr_menu_parent_name[$index]."<i class='right fas fa-caret-right'></i></p></a>";
            $arr_nama_menu = array();
            foreach($db_menu as $row){
              array_push($arr_nama_menu,$row->nama_menu);
              $this->html .= "<ul class='nav nav-treeview'>
                <li class='nav-item'>
                    <a class='nav-link ".($active_m == $row->path ? 'active' : '')."' href='/".$row->path."'>
                    <i class='".$row->font_icon."'></i>&nbsp;
                    <p>".$row->nama_menu."</p>
                    </a>
                </li>
            </ul>";
            }
            $this->html .= "</li>";
          }
          
        }
      }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        // $this->menu_apps($index+1,$this->arrMenuParentId,$this->arrMenuParentName,$this->arrFontIcon,$this->count,$active_gm,$active_m);
        // echo $this->html; die();
    }
}
