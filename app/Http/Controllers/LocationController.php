<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;

class LocationController extends Controller
{
    function index(){
        return view('master.location.index',[
            'title' => 'Master Location',
            'active_gm' => 'Master',
            'active_m'=>'location'
        ]);
    }

    public function get_datatable_location(){
        $db = DB::table('m_location')->join('m_region','m_location.region_id','=','m_region.id')->select('m_location.id','m_location.location_name','m_location.description','m_location.address','m_region.region_name')->get();
        return DataTables::of($db)->addColumn('action',function($row){
            $btn = "<a href='/location/detail_location/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
            <a href='/location/edit_location/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
            <form id=\"deleteLocation_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/location/delete_location/$row->id\" method=\"post\">
                <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteLocation($row->id,'$row->location_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
            </form>
            ";
            return $btn;
        })->make();
    }
    public function add_location(){
        return view('master.location.create',[
          'title' => 'Master Location',
          'active_gm' => 'Master',
          'active_m'=>'location',
        ]);
    }

    public function store_location(Request $request){
        for($i=0;$i<count($request->location);$i++){
            $post = array(
                'location_name'=>$request->location[$i]['location_name'],
                'address'=>$request->location[$i]['address'],
                'region_id'=>$request->region_id,
                'description'=>$request->location[$i]['location_description']
            );
            DB::table('m_location')->insert($post);
        }
        $confirmation = ['message' => 'Data Location success added','icon' => 'success', 'redirect'=>'/location'];
        return response()->json($confirmation);
    }

    public function detail_location($id){
        $get_location = DB::table('m_location')->join('m_region','m_region.id','=','m_location.region_id')->select('location_name','m_location.address',DB::Raw('m_location.description AS location_description'),'region_name',DB::Raw('m_region.description AS region_description'))->where('m_location.id',$id)->first();
        return view('master.location.detail',[
            'location' => $get_location,
            'title' => 'Master Location',
            'active_gm' => 'Master',
            'active_m'=>'location'
        ]);
    }
    
    public function edit_location($id){
        $get_location = DB::table('m_location')->join('m_region','m_region.id','=','m_location.region_id')->select('m_location.id','location_name','m_location.address',DB::Raw('m_location.description AS location_description'),DB::Raw('m_region.id AS region_id'),'region_name')->where('m_location.id',$id)->first();
        return view('master.location.edit',[
            'location' => $get_location,
            'title' => 'Master Location',
            'active_gm' => 'Master',
            'active_m'=>'location'
        ]);
    }

    public function update_location(Request $request){
        $getArea = DB::table('m_area')->join('m_location','m_area.location_id','=','m_location.id')->get();
        $post = array(
            'region_id'  => $request->region_name,
            'address'    => $request->address,
            'description'=> $request->location_description
        );
        if($getArea->count() > 0){
            $confirmation = ['message' => 'Data Location contains one or several area','icon' => 'error', 'redirect'=>'/location'];
        }else{
            $update = DB::table('m_location')->where('id',$request->location_id)->update($post);
            if($update){
                $confirmation = ['message' => 'Data Location success updated','icon' => 'success', 'redirect'=>'/location'];
            }else{
                $confirmation = ['message' => 'Data Location failed updated','icon' => 'error', 'redirect'=>'/location'];
            }
           
        }
        return response()->json($confirmation);
    }

    public function delete_location(Request $request){
        $getArea = DB::table('m_area')->join('m_location','m_area.location_id','=','m_location.id')->get();
        $location_id = $request->location_id;
        $get_data_location = DB::table('m_location')->where('id',$location_id)->first();
        if($getArea->count() > 0){
            $confirmation = ['message' => 'Data Location contains one or several area','icon' => 'error', 'redirect'=>'/location'];
        }else{
            $delete_data_location = DB::table('m_location')->where('id',$location_id)->delete($location_id);
            if($delete_data_location){
                $confirmation = ['message' => 'Data Location ' . $get_data_location->location_name . ' success deleted', 'icon' => 'success', 'redirect' => '/location'];
              }else{
                $confirmation = ['message' => 'Data Location ' . $get_data_location->location_name . 'failed deleted', 'icon' => 'success', 'redirect' => '/location'];
              }
        }
        return response()->json($confirmation);
    }

    public function get_data_location_to_selected_by_region(Request $request){
        $db = DB::table('m_location')->join('m_region','m_location.region_id','=','m_region.id')->join('m_client','m_client.id','=','m_region.client_id')->select('m_location.id','m_location.location_name','m_location.address',DB::Raw('m_location.description AS location_description,m_region.description AS region_description'));
        if($request->location_id != ""){
            $db = $db->where('m_location.id',$request->location_id)->get();
        }else{
            $db = $db->where('m_region.id',$request->region_id)->where('m_client.id',$request->client_id)->get();
        }
        // var_dump($db);
        return response()->json($db);
    }

    public function get_data_location_to_selected(Request $request){
        $db = DB::table('m_location')->select('m_location.id','m_location.location_name','m_location.address','m_location.description AS location_description')->get();
        return response()->json($db);
    }
}
