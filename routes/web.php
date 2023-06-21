<?php
use App\Http\Controllers\SubAreaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\SetScoreController;
use App\Http\Controllers\SignController;
use App\Models\SetScoreModel;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authentication']);
Route::post('/logout', [LoginController::class, 'signout'])->name('logout');
Route::post('/forgotPassword',[UserController::class,'forgotPassword']);
Route::get('/forgetChangePassword/{id}',[UserController::class,'SessionForgetToPasswordchangePassword']);

Route::get('/dashboard_v1', [DashboardController::class,'dashboard_v1'])->middleware('auth');
Route::get('/linkstorage', function () {
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
    Route::post('/setUserAccessAuthority',[UserController::class,'setUserAccessAuthority']);
});

Route::group(['middleware' => ['auth','authorization'],'prefix'=>'score'],function(){
    Route::get('/',[SetScoreController::class,'index']);
    Route::get('/getListScore',[SetScoreController::class,'getListScore'])->name('getListScore:dt');
    Route::get('/createScore',[SetScoreController::class,'createScore']);
    Route::post('/setScore',[SetScoreController::class,'setScore']);
});

Route::get('/change_password',[ProfileUserController::class,'viewChangePassword'])->middleware('auth');
Route::post('/change_password',[ProfileUserController::class,'changeSelfPassword'])->middleware('auth');

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
    Route::get('/getDatatableRegion',[RegionController::class,'get_datatable_region'])->name('data_region:dt');
    Route::get('/add_region',[RegionController::class,'add_region']);
    Route::post('/store_region',[RegionController::class,'store_region']);
    Route::get('/detail_region/{id}',[RegionController::class,'detail_region']);
    Route::get('/edit_region/{id}',[RegionController::class,'edit_region']);
    Route::post('/update_region',[RegionController::class,'update_region']);
    Route::post('/delete_region',[RegionController::class,'delete_region']);
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
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'area'],function(){
    Route::get('/',[AreaController::class,'index']);
    Route::get('/getDatatableArea',[AreaController::class,'get_datatable_area'])->name('data_area:dt');
    Route::get('/add_area',[AreaController::class,'add_area']);
    Route::post('/store_area',[AreaController::class,'store_area']);
    Route::get('/detail_area/{id}',[AreaController::class,'detail_area']);
    Route::get('/edit_area/{id}',[AreaController::class,'edit_area']);
    Route::post('/update_area',[AreaController::class,'update_area']);
    Route::post('/delete_area',[AreaController::class,'delete_area']);
    Route::get('/getDataDescriptionById/{id}',[AreaController::class,'get_data_description_area_by_id']);
    Route::get('/getDataService',[AreaController::class,'get_data_service']);
});


Route::group(['middleware'=>['auth','authorization'],'prefix'=>'sub_area'],function(){
    Route::get('/',[SubAreaController::class,'index']);
    Route::get('/getDatatableSubArea',[SubAreaController::class,'get_datatable_sub_area'])->name('data_sub_area:dt');
    Route::get('/add_sub_area',[SubAreaController::class,'add_sub_area']);
    Route::post('/store_sub_area',[SubAreaController::class,'store_sub_area']);
    Route::get('/edit_sub_area/{id}',[SubAreaController::class,'edit_sub_area']);
    Route::post('/update_sub_area',[SubAreaController::class,'update_sub_area']);
    Route::post('/delete_sub_area',[SubAreaController::class,'delete_sub_area']);
    Route::get('/detail_sub_area/{id}',[SubAreaController::class,'detail_sub_area']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'project'],function(){
    Route::get('/',[ProjectController::class,'list_project']);
    Route::get('/form_project',[ProjectController::class,'form_project']);
    Route::get('/edit_project/{kode_project}',[ProjectController::class,'edit_project']);
    Route::get('/detail_project/{kode_project}',[ProjectController::class,'detail_project']);
    Route::post('/getDetailRegion',[ProjectController::class,'get_detail_region']);
    Route::get('/getDetailLocation/{id}',[ProjectController::class,'get_detail_location']);
    Route::post('/storeProject',[ProjectController::class,'store_project']);
    Route::post('/updateProject',[ProjectController::class,'update_project']);
    Route::post('/deleteProject',[ProjectController::class,'delete_project']);
    Route::get('/getDataTableProject',[ProjectController::class,'getDataTableProject'])->name('data_project:dt');
    Route::get('/upload_project',[ProjectController::class,'uploadProject']);
    Route::post('/uploadNewProject',[ProjectController::class,'uploadNewProject']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'evaluation'],function(){
    Route::get('/form_evaluation',[EvaluationController::class,'form_evaluation']);
    Route::get('/edit_evaluation',[EvaluationController::class,'edit_evaluation']);
    Route::post('/storeEvaluation',[EvaluationController::class,'store_evaluation']);
    Route::post('/getYearEvaluationProjectPerLocation',[EvaluationController::class,'get_year_evaluation_project_per_location']);
    Route::post('/setScoreCurrentActiveScoreInEvaluation',[EvaluationController::class,'setScoreCurrentActiveScoreInEvaluation']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'evaluation'],function(){
    Route::get('/',[EvaluationController::class,'index']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'report'],function(){
    Route::get('/report_weekly',[ReportController::class,'report_weekly'])->middleware(['auth','authorization']);
    Route::post('/getDataProjectCurrentEvaluation',[ReportController::class,'getDataProjectCurrentEvaluation']);
    Route::get('/reportScorePerLocation',[ReportController::class,'report_score_per_location']);
    Route::post('/approvalByClient',[ReportController::class,'approvalByClient']);
    Route::get('/reportScoreMonthlyPerLocation',[ReportController::class,'reportScoreMonthlyPerLocation']);
    Route::post('/approvalSignReportScoreMonthly',[ReportController::class,'approvalSignReportScoreMonthly']);
});

Route::group(['middleware'=>['auth','authorization'],'prefix'=>'sign'],function(){
    Route::get('/signature_digital',[SignController::class,'signatureDigital']);
    Route::post('/storeSignatureDigital',[SignController::class,'storeSignatureDigital']);
});

Route::get('/client/getDatatableClientToSelected',[ClientController::class,'get_datatable_client_to_selected'])->name('data_client_to_selected:dt')->middleware('auth');
Route::post('/region/getDataRegionToSelected',[RegionController::class,'get_data_region_to_selected'])->middleware('auth');
Route::post('/location/getDataLocationToSelected',[LocationController::class,'get_data_location_to_selected_by_region'])->middleware('auth');
Route::post('/area/getDataAreaSelected',[AreaController::class,'get_data_area_to_selected'])->middleware('auth');
Route::post('/sub_area/getDataSubAreaSelected',[SubAreaController::class,'get_data_sub_area_to_selected'])->middleware('auth');
Route::post('/project/getProjectToSelected',[ProjectController::class,'get_project_to_selected'])->middleware('auth');
Route::post('/dashboard/getAppraisalWeekly',[DashboardController::class,'get_appraisal_weekly'])->middleware('auth');
Route::get('/getUserAccessAuthority',[UserController::class,'getUserAccessAuthority'])->middleware('auth');
Route::post('/getUserAuthorityLocationToSelectedByRegion',[UserController::class,'getUserAuthorityLocationToSelectedByRegion'])->middleware('auth');
Route::post('/dailyAppraisalPerWeek',[DashboardController::class,'dailyAppraisalPerWeek'])->middleware('auth');
Route::post('/getDataScorePerLocation',[ReportController::class,'get_data_score_per_location'])->middleware('auth');
Route::post('/getDataScoreMonthlyPerLocation',[ReportController::class,'getDataScoreMonthlyPerLocation'])->middleware('auth');
Route::get('/downloadPDFReportScorePerLocation/{project_code}/{location_id}/{month}/{year}',[ReportController::class,'downloadPDFReportScorePerLocation'])->middleware('auth');
Route::post('/getDataEvaluationProjectMonthlyPerYear',[DashboardController::class,'getDataEvaluationProjectMonthlyPerYear'])->middleware('auth');
Route::post('/getDataSummaryMonthlyPerLocation',[DashboardController::class,'getDataSummaryMonthlyPerLocation'])->middleware('auth');
Route::post('/getFilterLocation',[DashboardController::class,'getFilterLocation'])->middleware('auth');
Route::post('/users/changePasswordByToken',[UserController::class,'changePasswordByToken']);

