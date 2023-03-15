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
            $data = User::All();
            return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
                $btn = '<a href="/users/' . $row->username . '" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
                <a href="users/edit_user/' . $row->username . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                <a href="users/access/' . $row->id . '" class="edit btn bg-purple btn-sm"><i class="fas fa-universal-access"></i> Access</a>';
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
            User::create($data);
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
        $access_menu = DB::table('usersprivilege')->select('menu_id','menu.menu_parent_id')->where('user_id',$id)->join('menu','menu.id','=','usersprivilege.menu_id')->get();
        $authority = DB::table('usersauthority')->select('company_name')->where('user_id',$id)->first();
        $menu_id = [];
        $menu_parent_id = [];
        foreach($access_menu as $row){
            array_push($menu_id,$row->menu_id);
        }
        foreach($access_menu as $row){
            array_push($menu_parent_id,$row->menu_parent_id);
        }
        return view('setting.user.user_access', [
            'access_menu_parent' => $menuParent,
            'access_menu'        => $menu,
            'menu_id'            => $menu_id,
            'menu_parent_id'     => $menu_parent_id,
            'authority'          => isset($authority->company_name)?$authority->company_name:null,
            'active_gm'          => 'Setting',
            'active_m'           => 'users',
            'title'              => 'User Access'
        ]);
    }

    public function setUserAccessAuthority(Request $request){
        $user_id = $request->user_id;
        $company = $request->company;
        $getAuthority = DB::table('usersauthority')->where('user_id',$user_id)->get();
        if($getAuthority->count() > 0){
            DB::table('usersauthority')->where('user_id',$user_id)->update([
                'user_id'=>$user_id,
                'company_name'=>$company,
                'created_by'=>Auth::id(),
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            $confirmation = ['title'=>'Success!','message' =>'Akses Authority berhasil di update', 'icon' => 'success', 'redirect' => '/users'];
        }else{
            DB::table('usersauthority')->insert([
                'user_id'=>$user_id,
                'company_name'=>$company
            ]);
            $confirmation = ['title'=>'Success!','message' =>'Akses Authority berhasil di tambakan', 'icon' => 'success', 'redirect' => '/users'];
        }
        return $confirmation;
    }
    public function setUserAccessPrevilage(Request $request){
        $get_access_id = explode(",",$request->menu_id);
        $user_id = $request->user_id;
        $getPrivilegeUserId = DB::table('users')->where('users.id',$user_id)->join('usersprivilege','users.id','=','usersprivilege.user_id')->get();
        $getUserId = DB::table('users');
        if($getPrivilegeUserId->count() > 0){
            DB::table('usersprivilege')->where('user_id',$user_id)->delete();
        } 
        for($i=0;$i < count($get_access_id);$i++){
            DB::table('usersprivilege')->insert([
                'user_id'=>$user_id,
                'menu_id'=>$get_access_id[$i],
                'created_by'=>auth()->user()->id,
                'created_at'=>date('Y-m-d h:m:s')
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
}
