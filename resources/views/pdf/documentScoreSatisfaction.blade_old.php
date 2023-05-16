<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
			<h5>Report Score Per Location</h4>
		</center>
		<table style="width:100%">
			<tr>
				<td rowspan ="5"><img src="assets/images/LOGO-PT-SOS.png" alt="" style="width:100px"></td>
				<td>YEAR</td>
				<td><strong></strong>{{ $year }}</td>
				<td><strong>MONTH</strong></td>
				<td>{{ $month }}</td>
				<td rowspan = "5">
					<div style="width:100%; background-color:#219ebc; height:15%">
						<div style="height:15%; background-color:#4f772d; color: #fff">
							<center>Average Value</center> 
						</div>
						<div style="height:70%"><center><p style="font-size:70px">{{ $rating }}</p></center></div>
						<div style="height:15%; background-color:#4f772d; color: #fff">
							<center>{{ $avg_score_location->score }} %</center>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>START DATE</td>
				<td><strong></strong>{{ $first_date }}</td>
				<td><strong>START WEEK</strong></td>
				<td>{{ $first_week }}</td>
			</tr>
			<tr>
				<td>FINISH DATE</td>
				<td><strong></strong>{{ $last_date }}</td>
				<td><strong>END WEEK</strong></td>
				<td>{{ $last_week }}</td>
			</tr>
			<tr>
				<td>WORKDAYS</td>
				<td>{{ $work_days[0]->work_day }}</td>
				<td><strong>CHECKED DAYS</strong></td>
				<td>1</td>
			</tr>
		</table>
		<div class="row">
			<table class='table table-bordered table-striped'>
				<thead>
					<tr>
						<th>No</th>
						<th>Sub Area Name</th>
						<th>Week 1</th>
						<th>Week 2</th>
						<th>Week 3</th>
						<th>Week 4</th>
						<th>Week 5</th>
						<th>Week 6</th>
					</tr>
				</thead>
				<tbody>
					@php $i = 1; @endphp
					@foreach($query as $row)
					<tr>
						<td>{{ $i }}</td>
						<td>{{ $row->sub_area_name }}</td>
						<td>{{ $row->score_week1 }}</td>
						<td>{{ $row->score_week2 }}</td>
						<td>{{ $row->score_week3 }}</td>
						<td>{{ $row->score_week4 }}</td>
						<td>{{ $row->score_week5 }}</td>
						<td>{{ $row->score_week6 }}</td>
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
						<tr><td colspan="3">{{ $avg_score_location->client_name }}</td></tr>
						<tr><td colspan="3"><div style="height:25%;"><img style="width:100%" src="{{ $signature_client }}"/></div></td></tr>
						<tr><td style="text-align:left; width:15%">Nama</td><td style="width:0px">:</td><td style="text-align:left">{{ $user_client }}</td></tr>
						<tr><td style="text-align:left">Tanggal</td><td>:</td><td style="text-align:left">{{ $date_client }}</td></tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>