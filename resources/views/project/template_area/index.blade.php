@extends('layouts.main')
@section('container')
<style>

</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Template Area</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Template</a></li>
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
                            <a href="template_area/create" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i>Add</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Location Name</th>
                                        <th>Period</th>
                                        <th>Count Area</th>
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
var i = 1;
$(document).ready(function(){
    var tb_template = $('.table').DataTable({
        processing:true,
        serverSide:true,
        destroy:true,
        ordering:false,
        ajax: "{!! route('data_template_area') !!}",
        columns:[
            {
                data: i, name: i, render:function(data,type,row,meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }   
            },
            { data: 'location_name', name:'location_name' },
            { data: 'period', name: 'period' },
            { data:'count_area_name', name: 'count_area_name' },
            { data:'action', name:'action' }
        ],
        "scrollX": true,
    });
});
</script>
@endsection