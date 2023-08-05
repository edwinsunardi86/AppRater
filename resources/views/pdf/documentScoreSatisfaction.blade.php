@php
use App\Models\ReportModel;
function getInitial($score,$list_category){
	foreach($list_category as $row){
		if($row['score'] == $score){
			echo $row['category'];
		}
	}
}

function getInitialByModel($project_code,$month,$year,$score){
	$rating = ReportModel::getScoreM($project_code,$month,$year,$score);
	return $rating->initial;
}
@endphp
<!DOCTYPE html>
<html>
<head>
	<title>Report Score Monthly Location (Component)</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<div>
		<center>
			<h3><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">{{ $location_name }}</p></h3>
		</center>
		<table style="width:100%">
			<tr>
				<td style="width:20%"><img src="assets/images/LOGO-PT-SOS.png" alt="" style="width:100px"></td>
				{{-- <td><strong>YEAR</strong></td>
				<td><strong>{{ $year }}</strong></td>
				<td><strong>MONTH</strong></td>
				<td>{{ $month }}</td> --}}
                <td>
                    <table style="background-color:#f0f0f0; width:90%; height:10%; align:center; margin-left:5px; margin-right:5px;">
                        <tr>
                            <td><strong>Bulan</strong></td><td>:</td><td><div style="border-radius:15px; background-color:#dbdbdb; padding-left:15px; margin:5px 5px 0px 5px">{{ $month }}</div></td>
                        </tr>
                        <tr>
                            <td><strong>Tahun</strong></td><td>:</td><td><div style="border-radius:15px; background-color:#dbdbdb; padding-left:15px; margin:5px 5px 0px 5px">{{ $year }}</div></td>
                        </tr>
						<tr>
                            <td><strong>Service</strong></td><td>:</td><td><div style="border-radius:15px; background-color:#dbdbdb; padding-left:15px; margin:5px 5px 0px 5px">{{ $service_name }}</div></td>
                        </tr>
                    </table>
                </td>
				<td style="width:25%">
					<div style="width:100%; height:10%; align:top">
						<div style="height:15%; background-color:#355519; color: #fff;">
							<center style="font-size:10px;font-family: Arial, Helvetica, sans-serif;">AVERAGE VALUE</center> 
						</div>
						<div style="height:70%; background-color:#c2c2c2;"><center><p style="font-size:40px;font-family: Arial, Helvetica, sans-serif;">{{ $rating }}</p></center></div>
						<div style="height:15%; background-color:#85a16c;color:#000;">
							<center style="font-size:10px;font-family: Arial, Helvetica, sans-serif;">{{ floatval($avg_satisfaction->score) }} %</center>
						</div>
					</div>
				</td>
			</tr>
		</table>
    </div>
    <div style="margin-top:10px">
        <div class="row">
			<table class='table table-bordered table-striped'>
				<thead>
					<tr>
						<th>No</th>
						<th>Sub Area Name</th>
						<th>Score</th>
						<th>Summary</th>
					</tr>
				</thead>
				<tbody>
					@php $i = 1; @endphp
                    {{-- @foreach($service as $row_service)
                    <tr style="background-color:red">
                        <td colspan="2">{{ $row_service->service_name }}</td>
                        <td>{{ floatval($row_service->score) }} %</td>
                        <td>{{ getInitialByModel($project_code,$month,$year,$row_service->score) }}</td>
                    </tr>
                        @foreach($data as $row_sub_area)
                            @if($row_sub_area->service_code == $row_service->service_code)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row_sub_area->sub_area_name }}</td>
                                <td>{{ floatval($row_sub_area->score) }} %</td>
                                <td>
									{{ getInitial($row_sub_area->score,$arr_category) }}
                                </td>
                            </tr>
							@php $i++ @endphp
                            @endif
                        @endforeach
                    @endforeach --}}
					@foreach($data as $row_sub_area)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row_sub_area->sub_area_name }}</td>
                                <td>{{ floatval($row_sub_area->score) }} %</td>
                                {{-- <td>
									{{ getInitial($row_sub_area->score,$arr_category) }}
                                </td> --}}
								<td>{{ $row_sub_area->initial }}</td>
                            </tr>
							@php $i++ @endphp
                        @endforeach
				</tbody>
			</table>
		</div>
    </div>
    <div style="width:100%">
		<table style="width:100%">
			<tr>
				<td style="width:30%">
					<table style="width:100%">
						<tr><td colspan="3">PT. SHIELD ON SERVICE, TBK</td></tr>
						<tr><td colspan="3"><div style="height:25%;"></div></td></tr>
						<tr><td style="text-align:left; width:15%">Nama</td><td style="width:0px">:</td><td style="text-align:left"></td></tr>
						<tr><td style="text-align:left">Tanggal</td><td>:</td><td style="text-align:left"></td></tr>
					</table>
				</td>
				<td style="width:40%"></td>
				<td style="width:30%">
					<table  style="width:100%">
						<tr><td colspan="3">{{  $avg_satisfaction->client_name }}</td></tr>
						<tr><td colspan="3"><img style="width:100%; height:25%" src="{{ $signature_client }}"/></td></tr>
						<tr><td style="text-align:left; width:15%">Nama</td><td style="width:0px">:</td><td style="text-align:left">{{ Auth::user()->fullname }}</td></tr>
						<tr><td style="text-align:left">Tanggal</td><td>:</td><td style="text-align:left">{{ $date_sign_client }}</td></tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
