<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->join('m_client','m_client.id','=','users.client_id','left')->select('username','email','fullname','role',DB::Raw('users.id AS user_id'));
            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $btn = '<a href="/users/' . $row->username . '" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
                <a href="users/edit_user/' . $row->username . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                <a href="users/access/' . $row->user_id . '" class="edit btn bg-purple btn-sm"><i class="fas fa-universal-access"></i> Access</a>';
                return $btn;
            })->rawColumns(['action'])->make(true);
        }
        return view('setting.user.index', [
            'active_gm' => 'Setting',
            'active_m'  => 'users',
            'title'     => 'Daftar User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_user()
    {
        return view('setting.user.create_user', [
            'active_gm' => 'Setting',
            'active_m' =>   'users',
            'title'     => 'Input User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_user(Request $request)
    {
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'fullname' => $request->fullname,
            'password' => bcrypt('sos123'),
            'role' => $request->role,
            'client_id' => $request->client_id
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50|unique:users',
            'email'    => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $email = $errors->first('email');
            $username = $errors->first('username');
            $confirmation = ['username' => $username, 'email' => $email, 'icon' => 'error'];
        } else {
            DB::table('users')->insert($data);
            $confirmation = ['message' => 'Data user sukses ditambahkan', 'icon' => 'success', 'redirect' => '/users'];
        }
        return response()->json($confirmation);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function detail_user($username)
    {
        $data_user = User::Where(['username' => $username])->first();
        return view('setting.user.show', [
            'user' => $data_user,
            'active_gm' => 'Setting',
            'active_m' =>   'users',
            'title'     => 'View User'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit_user($username)
    {
        $data_user = User::Where(['username' => $username])->first();
        return view('setting.user.edit_user', [
            'user' => $data_user,
            'active_gm' => 'Setting',
            'active_m' =>   'users',
            'title'     => 'Edit User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $request)
    {
        $user = new User;

        $check_valid = $user->whereNotIn('username',[$request->username])->where('email',$request->email)->count();
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'fullname' => $request->fullname,
            'role' => $request->role,
            'client_id' => $request->client_id
        ];
        $rules = [];
        if($check_valid > 0){
            $rules['email'] = 'required|email|unique:users';
        }
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            $errors = $validate->errors();
            $email = $errors->first('email');
            $confirmation = ['email' => $email, 'icon' => 'error'];
        } else {
            User::where('username', $request->username)->update($data);
            $confirmation = ['message' => 'Data user sukses diupdate', 'icon' => 'success', 'redirect' => '/users'];
        }
        return response()->json($confirmation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function usersAccess($id){
        $menuParent = DB::table('menu')->where('menu_parent_id',0)->get();
        $menu = DB::table('menu')->select('menu.menu_parent_id','menu.id','menu.nama_menu')->where('menu.menu_parent_id','<>',0)->get();
        $access_menu = DB::table('usersprivilege')->select('menu_id','menu.menu_parent_id','create','update','delete')->where('user_id',$id)->join('menu','menu.id','=','usersprivilege.menu_id')->get();
        $query = DB::table('usersauthority')
        ->join('setup_location','setup_location.id','=','usersauthority.location_id')
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_region.project_code','=','setup_project.project_code')
        ->join('m_client','setup_project.client_id','=','m_client.id')
        ->select(DB::Raw('m_client.id AS client_id'),'client_name','setup_project.project_code','project_name')
        ->where('user_id',$id);
        $query2 = DB::table('usersauthority')
        ->join('setup_location','setup_location.id','=','usersauthority.location_id')
        ->join('setup_region','setup_region.id','=','setup_location.region_id')
        ->join('setup_project','setup_region.project_code','=','setup_project.project_code')
        ->select('setup_project.project_code','project_name')
        ->where('user_id',$id)->groupBy('setup_project.project_code');
        $authority_client_per_project = $query->first();
        $project = $query2->get();
        $arr_project = array();
        $imp_project = "";
        foreach($project as $row){
            array_push($arr_project,$row->project_code);
        }
        $imp_project = implode(",",$arr_project);
        $role_user = DB::table('users')->select('id','username','fullname','email','role')->where('users.id',$id)->first();
        $menu_array = array();
        $menu_parent_id = [];
        foreach($access_menu as $row){
            array_push($menu_array,array( 'menu_id'=> $row->menu_id,'create'=> $row->create, 'update' => $row->update, 'delete'=>$row->delete));
        }
        foreach($access_menu as $row){
            // array_push($menu_parent_id,$row->menu_parent_id);
            
        }
        return view('setting.user.user_access', [
            'access_menu_parent'            => $menuParent,
            'access_menu'                   => $menu,
            'menu_array'                    => $menu_array,
            'menu_parent_id'                => $menu_parent_id,
            'role'                          => $role_user,
            'authority_client_per_project'  => $authority_client_per_project,
            'project'                       => $imp_project,
            'active_gm'                     => 'Setting',
            'active_m'                      => 'users',
            'title'                         => 'User Access'
        ]);
    }

    public function setUserAccessPrevilage(Request $request){
        $getPrivilegeUserId = DB::table('users')->where('users.id',$request->user_id)->join('usersprivilege','users.id','=','usersprivilege.user_id')->get();
        if($getPrivilegeUserId->count() > 0){
            DB::table('usersprivilege')->where('user_id',$request->user_id)->delete();
        }
        $getUserId = DB::table('users');
        for($i = 0;$i < count($request->menu); $i++){
            DB::table('usersprivilege')->insert([
                'user_id' => $request->user_id,
                'menu_id' => $request->menu[$i]['menu_id'],
                'create' => $request->menu[$i]['create'],
                'update' => $request->menu[$i]['update'],
                'delete' => $request->menu[$i]['delete'],
            ]);
        }
        if($getUserId){
            $confirmation = ['title'=>'Warning!','message' => 'Perubahan akses privilege user berhasil!', 'icon' => 'success', 'redirect' => '/users'];
        }else{
            $confirmation = ['title'=>'Warning!','message' => 'Perubahan akses privilege user gagal! Kemungkinan user tersebut sudah di blok atau dihapus dari backend!', 'icon' => 'error','error'=>1 ];
        }
        return $confirmation;
    }

    function viewChangePassword(){
        return view('users.change_password',[
            'active_gm'=> 'User',
            'active_m'=> '/change_password',
            'title'=> 'Change Password',
        ]);
    }
    
    function changeSelfPassword(Request $request){
        $user_id = Auth::user()->id;
        $password = $request->password;
        User::where('id',$user_id)->update(['password'=>bcrypt($password)]);
        $confirmation = ['message' => 'Password has been changed', 'icon' => 'success', 'redirect' => '/send_email'];
        $request->session()->flash('change', 'Password has been changed');
        return redirect('/dashboard_v1');
    }

    function setUserAccessAuthority(Request $request){
        $location = $request->location;
        $get_authority = DB::table('usersauthority')->where('user_id',$request->user_id)->get();
        $get_username = DB::table('users')->where('id',$request->user_id)->first();
        if($get_authority->count() > 0){
            $delete_authority = DB::table('usersauthority')->where('user_id',$request->user_id)->delete();
            if($delete_authority){
                $confirmation = ['title'=>'Warning!','message' => 'user authority with username '.$get_username->username.' successfully deleted', 'icon' => 'success', 'redirect' => '/users'];
            }
        }
        for($i = 0;$i < count($location);$i++){
            $post = array(
                'user_id'=>$request->user_id,
                'location_id'=>$request->location[$i]['location_id'],
                'created_by'=>Auth::id()
            );
            $insert_usersauthority = DB::table('usersauthority')->insert($post);
        }
        $confirmation = ['title'=>'Warning!','message' => 'User authority with username '.$get_username->username.' successfully created', 'icon' => 'success'];
        return response()->json($confirmation);
    }

    function getUserAccessAuthority(){
        $query = DB::table('usersauthority')->
        join('setup_location','setup_location.id','=','usersauthority.location_id')->
        join('setup_region','setup_region.id','=','setup_location.region_id')->
        join('setup_project','setup_project.project_code','=','setup_region.project_code')->
        join('setup_area','setup_area.location_id','=','setup_location.id')->
        join('setup_sub_area','setup_sub_area.area_id','=','setup_area.id')->
        join('m_service','m_service.service_code','=','setup_area.service_code')->select('setup_project.project_code','project_name',DB::Raw('setup_region.id AS region_id'),'setup_region.region_name',DB::Raw('setup_location.id AS location_id'),'location_name',DB::Raw('setup_area.id AS area_id'),'area_name',DB::Raw('setup_sub_area.id AS sub_area_id'),'sub_area_name','m_service.service_code','service_name')->where('usersauthority.user_id',Auth::id())->get();
        return response()->json($query);
    }

    public function getUserAuthorityLocationToSelectedByRegion(Request $request){
        $db = DB::table('setup_location')->
        join('usersauthority','usersauthority.location_id','=','setup_location.id')->
        join('setup_region','setup_location.region_id','=','setup_region.id')->
        select('setup_location.id','setup_location.location_name','setup_location.address',DB::Raw('setup_location.description AS location_description,setup_region.description AS region_description','usersauthority.location_id'))->where('usersauthority.user_id',$request->user_id);
        // var_dump($db);
        if($request->location_id != ""){
            $db = $db->where('setup_location.id',$request->location_id)->get();
        }else{
            $db = $db->where('setup_region.id',$request->region_id)->get();
        }
        // var_dump($db);
        return response()->json($db);
    }
}
