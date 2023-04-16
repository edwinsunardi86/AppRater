<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function report_weekly(){
        return view('report.report_weekly',[
            'title' => 'Report Weekly',
            'active_gm' => 'Report',
            'active_m'=>'report/report_weekly'
        ]);
    }

    function getDataProjectCurrentEvaluation(Request $request){
        $sql = "SELECT g.project_code,g.project_name,service_name,AVG(score) AS score,MONTH(appraisal_date) AS MONTH,h.client_name,e.id AS location_id,e.location_name,d.service_code,d.service_name FROM evaluation a
        INNER JOIN setup_sub_area b ON a.sub_area_id = b.id
        INNER JOIN setup_area c ON c.id = b.area_id
        INNER JOIN m_service d ON d.service_code = c.service_code
        INNER JOIN setup_location e ON e.id = c.location_id
        INNER JOIN setup_region f ON f.id = e.region_id
        INNER JOIN setup_project g ON g.project_code = a.project_code
        INNER JOIN m_client h ON h.id = g.client_id
        WHERE h.id = '".$request->client_id."' AND YEAR(appraisal_date) = DATE_FORMAT(NOW(),'%Y') AND g.project_code = '".$request->project_code."'
        GROUP BY g.project_code,d.service_code,MONTH(appraisal_date),e.id";
                /*WHERE h.id = '".$request->client_id."' AND YEAR(appraisal_date) = '".$request->date_appraisal."'*/
        // die($sql);
        $query = DB::select($sql);
        return response()->json($query);
    }


}
