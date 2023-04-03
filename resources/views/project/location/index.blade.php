@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Location</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Location</li>
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
                            <a href="location/add_location" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i>Add Location</a>
                        </div>
                        <div class="card-body">
                            <table id="table_location" class="table table-bordered table-stripped" style="width:100%">
                            <thead>
                                <th>No.</th>
                                <th>Location</th>
                                <th>Region</th>
                                <th>Project</th>
                                <th>Client</th>
                                <th>Address</th>
                                <th>Description</th>
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
    var i = 1;
    var tb_location = $('#table_location').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:'{!! route("data_location:dt") !!}',
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            { data:'location_name', name:'location_name' },
            { data: 'region_name', name:'region_name'},
            { data: 'project_name', name:'project_name'},
            { data: 'client_name', name:'client_name'},
            { data: 'address', name:'address'},
            { data: 'description', name:'description'},
            { data: 'action', name: 'action'}
        ],
        "scrollX": true,
    });
});
function deleteLocation(id,locationName){
    $('#deleteLocation_'+id).submit(function(){
        var formData = new FormData();
        formData.append('location_id',id);
        formData.append('location_name',locationName);
        Swal.fire({
            title: 'Perhatian!',
            html: 'Apakah anda yakin ingin menghapus data lokasi ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText:'Delete',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                    },
                    url:'location/delete_location',
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