<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;

class RegionController extends Controller
{
    function index(){
        return view('master.region.index',[
            'title' => 'Master Region',
            'active_gm' => 'Master',
            'active_m'=>'region'
        ]);
    }

    function get_datatable_region(){
        $db = DB::table('m_region')->join('m_client','m_region.client_id','=','m_client.id')->select('m_region.id','region_name','client_name',DB::raw('m_client.description AS client_description'),DB::raw('m_region.description AS region_description'))->get();
        return DataTables::of($db)->addColumn('action',function($row){
            $btn = "<a href='/region/detail_region/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/region/edit_region/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteRegion_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/region/delete_region/$row->id\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteRegion($row->id,'$row->region_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
            </form>
            ";
            return $btn;
        })->make();
    }

    public function add_region(){
        return view('master.region.create',[
          'title' => 'Master Region',
          'active_gm' => 'Master',
          'active_m'=>'region'
        ]);
    }
    public function get_datatable_client_to_selected(){
        $db = DB::table('m_client')->select('id','client_name','address','contact1','contact2',DB::raw('concat(dial_code_mobile,mobile) as contact_mobile'),'description')->orderBy('client_name','asc')->get();
        return DataTables::of($db)->addColumn('action',function($row){
          $btn = "<button type=\"button\" class=\"btn bg-orange btn-xs pilih_client\" id=\"pilih_client\" data-id=\"$row->id\" data-client_name=\"$row->client_name\" data-client-description=\"$row->description\">Pilih</button>";
          return $btn;
        })->make();
    }
}
