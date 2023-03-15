<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;

class ClientController extends Controller
{
    public function index(){
      return view('master.client.index',[
        'title' => 'Master Client',
        'active_gm'=>'Master',
        'active_m'=>'client'
      ]);
    }

    public function get_datatable_client(){
      $db = DB::table('m_client')->select('id','client_name','address','contact1','contact2',DB::raw('concat(dial_code_mobile,mobile) as contact_mobile'),'description')->orderBy('client_name','asc')->get();
      return DataTables::of($db)->addColumn('action',function($row){
        $btn = "<a href='/client/detail_client/$row->id' class='btn btn-primary btn-xs'><i class='fas fa-eye'></i> View</a>
        <a href='/client/edit_client/".$row->id."' class=\"btn btn-secondary btn-xs\"><i class=\"fas fa-user-edit\"></i> Edit</a>
        <form id=\"deleteClient_$row->id\" class='d-inline' onsubmit=\"event.preventDefault()\" action=\"/client/delete_client/$row->id\" method=\"post\">
        <button type=\"submit\" class=\"btn btn-xs btn-danger\" onclick=\"deleteClient($row->id,'$row->client_name')\"><i class=\"fas fa-solid fa-trash\"></i>Delete</button>
        </form>";
        return $btn;
      })->make();
    }

    public function add_client(){
      $kode_dial = DB::table('dial_country')->select('country','dial_code')->get();
      return view('master.client.create',[
        'title' => 'Master Client',
        'kode_dial' => $kode_dial,
        'active_gm' => 'Master',
        'active_m'=>'client'
      ]);
    }

    public function store_client(Request $request){
      $post = array(
        'client_name' => $request->client_name,
        'address' => $request->address,
        'contact1' => $request->phone1,
        'contact2' => $request->phone2,
        'dial_code_mobile'=>$request->dial_country,
        'mobile' => $request->mobile,
        'description' => $request->description
      );
      DB::table('m_client')->insert($post);
      $confirmation = ['message' => 'Data Client berhasil ditambahkan','icon' => 'success', 'redirect'=>'/client'];
      return response()->json($confirmation);
    }

    public function detail_client($id){
      $db = DB::table('m_client')->where('id',$id)->first();
      $kode_dial = DB::table('dial_country')->select('country','dial_code')->get();
      return view('master.client.detail',[
        'data_client' => $db,
        'kode_dial' => $kode_dial,
        'title' => 'Master Client',
        'active_gm' => 'Master',
        'active_m'=>'client'
      ]);
    }

    public function edit_client($id){
      $db = DB::table('m_client')->where('id',$id)->first();
      $kode_dial = DB::table('dial_country')->select('country','dial_code')->get();
      return view('master.client.edit',[
        'data_client' => $db,
        'kode_dial' => $kode_dial,
        'title' => 'Master Client',
        'active_gm' => 'Master',
        'active_m'=>'client'
      ]);
    }

    public function update_client(Request $request){
      $post = array(
        'address' => $request->address,
        'contact1' => $request->phone1,
        'contact2' => $request->phone2,
        'dial_code_mobile'=>$request->dial_country,
        'mobile' => $request->mobile,
        'description' => $request->description
      );
      DB::table('m_client')->where('id',$request->client_id)->update($post);
      $confirmation = ['message' => 'Data Client berhasil diupdate','icon' => 'success', 'redirect'=>'/client'];
      return response()->json($confirmation);
    }

    public function delete_client(Request $request){
      $client_id = $request->client_id;
      $get_data_client = DB::table('m_client')->where('id',$client_id)->first();
      $delete_data_client = DB::table('m_client')->where('id',$client_id)->delete($client_id);
      if($delete_data_client){
        $confirmation = ['message' => 'Data client ' . $get_data_client->client_name . ' berhasil dihapus', 'icon' => 'success', 'redirect' => '/client'];
      }else{
        $confirmation = ['message' => 'Data client ' . $get_data_client->client_name . ' berhasil dihapus', 'icon' => 'success', 'redirect' => '/client'];
      }
      return response()->json($confirmation);
    }
}
?>