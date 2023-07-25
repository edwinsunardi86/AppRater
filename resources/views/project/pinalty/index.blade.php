@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setup Pinalty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setup</a></li>
                    <li class="breadcrumb-item active">Pinalty</li>
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
                            <h3 class="card-title">Setup Pinalty</h3>
                        </div>
                        <div class="card-body">
                            <table id="table-pinalty" class="table table-bordered table-striped">
                                <thead>
                                    <th>Project Name</th>
                                    <th>Period</th>
                                    <th>Pinalty Score</th>
                                </thead>
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
    var tb_pinalty = $('#table-pinalty').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:"{!! route('data_pinalty:dt') !!}",
        columns:[
            { data:'project_name', name:'project_name' },
            { data: 'period', name: 'period' },
            { data: 'pinalty_score', name: 'pinalty_score'}
        ]
    });
});
</script>
@endsection