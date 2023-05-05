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
	<center>
		<h5>Report Score Per Location</h4>
	</center>
 
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
 
</body>
</html>