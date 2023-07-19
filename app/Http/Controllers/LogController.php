<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogModel;
class LogController extends Controller
{
    public function log_sign_report(){
        return view('log.log_sign_report',[
            'title' => 'Report Log Sign',
            'active_gm' => 'Log',
            'active_m'=>'log/log_sign_report',
        ]);
    }
    public function getInputRatePeriodYearPerProject(Request $request){
        $getData = LogModel::checkExistingInputRateGroupYear($request->project_code);
        return response()->json($getData);
    }

    public function getInputRateMonthlyPerLocation(Request $request){
        $getData = LogModel::checkExistingInputRateMonthlyPerLocation($request->project_code,$request->year_project);
        return response()->json($getData);
    }

    public function getInputrateMonthlyPercentageByMonth(Request $request){
        $getData = LogModel::checkExistingInputRatePercentageByMonth($request->project_code,$request->month_project,$request->year_project);
        return response()->json($getData);
    }
}
