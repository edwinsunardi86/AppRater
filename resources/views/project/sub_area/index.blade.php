@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setup Sub Area</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setup</a></li>
                    <li class="breadcrumb-item active">Sub Area</li>
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
                            <a href="sub_area/add_sub_area" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i> Tambah Sub Area</a>
                        </div>
                        <div class="card-body">
                            <table id="table_sub_area" class="table table-bordered table-stripped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Sub Area</th>
                                        <th>Area Name</th>
                                        <th>Location Name</th>
                                        <th>Address</th>
                                        <th>Region Name</th>
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
    var tb_location = $('#table_sub_area').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:'{!! route("data_sub_area:dt") !!}',
        columns:[
            { 
                data:i, name: i, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'sub_area_name', name: 'area_name'},
            { data: 'area_name', name: 'area_name'},
            { data:'location_name', name: 'location_name'},
            { data: 'address', name: 'address'},
            { data: 'region_name', name: 'region_name'},
            { data: 'action', name: 'action'}
        ],
        "scrollX": true,
    });
});

function deleteSubArea(id,subAreaName){
    $('#deleteSubArea_'+id).submit(function(){
        var formData = new FormData();
        formData.append('sub_area_id',id);
        formData.append('sub_area_name',subAreaName);
        Swal.fire({
            title: 'Perhatian!',
            html: 'Apakah anda yakin ingin menghapus data sub area ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText:'Delete',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                    },
                    url:'sub_area/delete_sub_area',
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