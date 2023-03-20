<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
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
    Route::get('/getDatatableClientToSelected',[ClientController::class,'get_datatable_client_to_selected'])->name('data_client_to_selected:dt');
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'region'],function(){
    Route::get('/', [RegionController::class,'index']);
    Route::get('getDatatableRegion',[RegionController::class,'get_datatable_region'])->name('data_region:dt');
    Route::get('/add_region',[RegionController::class,'add_region']);
    Route::post('/store_region',[RegionController::class,'store_region']);
    Route::get('/detail_region/{id}',[RegionController::class,'detail_region']);
    Route::get('/edit_region/{id}',[RegionController::class,'edit_region']);
    Route::post('/update_region',[RegionController::class,'update_region']);
    Route::post('/delete_region',[RegionController::class,'delete_region']);
    Route::post('/get_data_region_to_selected',[RegionController::class,'get_data_region_to_selected']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'location'],function(){
    Route::get('/',[LocationController::class,'index']);
    Route::get('/getDatatableLocation',[LocationController::class,'get_datatable_location'])->name('data_location:dt');
    Route::get('/add_location',[LocationController::class,'add_location']);
    Route::post('/store_location',[LocationController::class,'store_location']);
    Route::get('/detail_location/{id}',[LocationController::class,'detail_location']);
    Route::get('/edit_location/{id}',[LocationController::class,'edit_location']);
    Route::post('/update_location',[LocationController::class,'update_location']);
    Route::post('/delete_location',[LocationController::class,'delete_location']);
    Route::post('/get_data_location_to_selected',[LocationController::class,'get_data_location_to_selected']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'area'],function(){
    Route::get('/',[AreaController::class,'index']);
    Route::get('/getDatatableArea',[AreaController::class,'get_datatable_area'])->name('data_area:dt');
    Route::get('/add_area',[AreaController::class,'add_area']);
    Route::post('/store_area',[AreaController::class,'store_area']);
    Route::get('/detail_area/{id}',[AreaController::class,'detail_area']);
    Route::get('/edit_area/{id}',[AreaController::class,'edit_area']);
});