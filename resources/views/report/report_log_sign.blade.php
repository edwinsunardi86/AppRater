@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Log Sign Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Log</a></li>
                    <li class="breadcrumb-item active">Sign Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Log Sign Report</h3>
                        </div>
                        <div class="card-body">
                            <table id="table_log_sign_report" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Location Name</th>
                                        <th>Period</th>
                                        <th>Service Name</th>
                                        <th>Filename</th>
                                        <th>Sign By</th>
                                    </th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function(){
    var tb_log_sign = $('#table_log_sign_report').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:"{!! route('data_log_sign') !!}",
        columns:[
            { data: 'location_name', name: 'location_name' },
            { data: 'period', name: 'period'},
            { data: 'service_name', name: 'service_name' },
            { data: 'filename',  render: function(row, type, set){
                link="<a href='/report/getFileNameSignReport/"+row+"'>"+row+"</a>"
                    return link;
            } },
            { data: 'fullname', name: 'fullname' }
        ]
    });
});
</script>
@endsection