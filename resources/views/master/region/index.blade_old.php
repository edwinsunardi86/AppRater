@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Region</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Region</li>
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
                            <a href="region/add_region" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i> Add Region</a>
                        </div>
                        <div class="card-body">
                            <table id="table_region" class="table table-bordered table-stripped" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>Region</th>
                                    <th>Region Description</th>
                                    <th>Action</th>
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
    var tb_region = $('#table_region').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:'{!! route("data_region:dt") !!}',
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            { data:'region_name', name:'region_name' },
            { data: 'region_description', name:'region_description'},
            {data: 'client_name', name:'client_name'},
            {data: 'client_description', name: 'client_description'},
            { data: 'action', name: 'action'}
        ],
        "scrollX": true,
    });
});
function deleteRegion(id,regionName){
    $('#deleteRegion_'+id).submit(function(){
        var formData = new FormData();
        formData.append('region_id',id);
        formData.append('region_name',regionName);
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
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                    },
                    url:'region/delete_region',
                    data:formData,
                    type:'POST',
                    dataType:'JSON',
                    processData:false,
                    contentType:false,
                    success: function(data){
                        Swal.fire({
                            title:'Perhatian',
                            html:data.message,
                            icon:data.icon,
                            showConfirmButton:false,
                            timer:1500
                        });
                        if(data.icon == 'success'){
                            setTimeout(() => {
                                window.location.href = data.redirect 
                            }, 2000);
                        }
                    },
                    error: function(xhr,error,errorThrown){

                    }
                });
            }
        });
    });
}
</script>
@endsection