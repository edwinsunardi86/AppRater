<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;

class SubAreaController extends Controller
{
    function index(){
        return view('master.sub_area.index',[
            'title' => 'Master Sub Area',
            'active_gm' => 'Master',
            'active_m'=>'sub_area',
        ]);
    }

    function get_datatable_sub_area(){
        $db = DB::table('m_sub_area')->join('m_area','m_area.id','=','m_sub_area.area_id')->join('m_location','m_location.id','=','m_area.location_id')->select('m_sub_area.id','m_sub_area.sub_area_name',DB::raw('m_sub_area.description AS sub_area_description'),'m_area.area_name',DB::raw('m_area.description AS area_description'),'location_name','m_location.address',DB::Raw('m_location.description AS location_description'),'region_name',DB::Raw('m_region.description AS region_description'),'client_name',DB::Raw('m_client.description AS client_description'))->join('m_region','m_region.id','=','m_location.region_id')->join('m_client','m_client.id','=','m_region.client_id')->get();
        return Datatables::of($db)->addColumn('action', function($row){
            $btn = "<a href='/sub_area/detail_sub_area/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/sub_area/edit_sub_area/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteSubArea_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/sub_area/delete_sub_area/$row->id\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteSubArea($row->id,'$row->sub_area_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
            </form>
            ";
            return $btn;
        })->make();
    }

    function add_sub_area(){
        return view('master.sub_area.create',[
            'title' => 'Master Sub Area',
            'active_gm' => 'Master',
            'active_m'=>'sub_area'
          ]);
    }
}
