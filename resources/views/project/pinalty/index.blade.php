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
                            <a href="/pinalty/create" class="btn btn-md btn-primary">Create</a>
                            <table id="table-pinalty" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <th>Project Name</th>
                                    <th>Period</th>
                                    <th>Pinalty Score</th>
                                    <th>Action</th>
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
            { data: 'pinalty_score', name: 'pinalty_score'},
            { data: 'action', name: 'action'}
        ]
    });
});
function deletePinalty(id_header){
    $('#deletePinalty'+id_header).submit(function(){
        Swal.fire({
            title: 'Perhatian!',
            html: 'Apakah anda yakin ingin menghapus data region ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText:'Delete',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:'pinalty/delete_pinalty',
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        'id_header':id_header
                    },
                    processData:true,
                    success:function(data){
                        Swal.fire({
                            title:data.title,
                            html:data.message,
                            icon:data.icon
                        });
                        setTimeout(() => {
                            window.location.href=data.redirect;
                        }, 1500);
                    }
                });    
            }
        });
    });
    
}
</script>

@endsection