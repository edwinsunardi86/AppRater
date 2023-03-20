@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Area</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Area</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="area/add_area" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i> Tambah Area</a>
                        </div>
                        <div class="card-body">
                            <table id="table_area" class="table table-bordered table-stripped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Area Name</th>
                                        <th>Area Description</th>
                                        <th>Location Name</th>
                                        <th>Address</th>
                                        <th>Location Description</th>
                                        <th>Region Name</th>
                                        <th>Region Description</th>
                                        <th>Client Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
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
    var i = 1;
    var tb_location = $('#table_area').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:'{!! route("data_area:dt") !!}',
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            { data: 'area_name', name: 'area_name'},
            { data: 'description', name: 'description'},
            { data:'location_name', name: 'location_name'},
            { data: 'address', name: 'address'},
            { data: 'location_description', name: 'location_description'},
            { data: 'region_name', name: 'region_name'},
            { data: 'region_description', name: 'region_description'},
            { data: 'client_name', name: 'client_name'},
            { data: 'client_description', name: 'client_description'},
            { data: 'action', name: 'action'}
        ],
        "scrollX": true,
    });
});
</script>
@endsection