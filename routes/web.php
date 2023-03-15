<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'authentication']);
Route::post('logout', [LoginController::class, 'signout'])->name('logout');

Route::get('dashboard_v1', [DashboardController::class,'dashboard_v1'])->middleware('auth');
Route::get('linkstorage', function () {
    Artisan::call('storage:link');
});

Route::group(['middleware' => ['auth','authorization'],'prefix'=>'users'], function() {
    Route::get('/', [UserController::class,'index']);
    Route::get('/create_user', [UserController::class,'create_user']);
    Route::post('/store_user',[UserController::class,'store_user']);
    Route::get('/{username}', [UserController::class,'detail_user']);
    Route::get('/edit_user/{username}', [UserController::class,'edit_user']);
    Route::post('/update_user', [UserController::class,'update_user']);
    Route::get('/access/{id}',[UserController::class,'usersAccess']);
    Route::post('/set_user_access_previlage',[UserController::class,'setUserAccessPrevilage']);
    Route::post('/set_user_access_authority',[UserController::class,'setUserAccessAuthority']);
    Route::get('/change_password',[UserController::class,'viewChangePassword']);
    Route::post('/change_password',[UserController::class,'changeSelfPassword']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'client'],function(){
    Route::get('/',[ClientController::class,'index']);
    Route::get('/getDatatableClient',[ClientController::class,'get_datatable_client'])->name('data_client:dt');
    Route::get('/add_client',[ClientController::class,'add_client']);
    Route::post('/store_client',[ClientController::class,'store_client']);
    Route::get('/detail_client/{id}',[ClientController::class,'detail_client']);
    Route::get('/edit_client/{id}',[ClientController::class,'edit_client']);
    Route::post('/update_client',[ClientController::class,'update_client']);
    Route::post('/delete_client',[ClientController::class,'delete_client']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'region'],function(){
    Route::get('/', [RegionController::class,'index']);
    Route::get('getDatatableRegion',[RegionController::class,'get_datatable_region'])->name('data_region:dt');
    Route::get('/add_region',[RegionController::class,'add_region']);
    Route::get('/getDatatableClientToSelected',[RegionController::class,'get_datatable_client_to_selected'])->name('data_client_to_selected:dt');
});