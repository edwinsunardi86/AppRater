@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Management Fee List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Management Fee</a></li>
                    <li class="breadcrumb-item active">List</li>
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
                            <a href="management_fee/create" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i>Add Fee Location</a>
                        </div>
                        <div class="card-body">
                            <table id="table_fee_location" class="display table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Location Name</th>
                                        <th>Fee</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Description Pinalty</th>
                                        <th>Action</th>
                                    </tr>
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
    var i = 1;
    var table_fee = $('#table_fee_location').DataTable({
        autoWidth: false,
        processing:true,
        serverSide:true,
        destroy:true,
        ordering:false,
        ajax:'{!! route("data_fee_management:dt") !!}',
        columns:[
            { data:i, name:i, render:function(data,type, row, meta){
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: 'location_name', name: 'location_name' },
            { data: 'amount_service', name: 'amount_service', render:function(row, type, render){
                var split_service = row.split(",");
                var html ="";
                $.each(split_service,function(i,item){
                    html += split_service[i]+"<br/>";
                }); 
                return html;
            }},
            // { data: 'amount_service', name: 'amount_service'},
            { data: 'start_date', name: 'start_date' },
            { data: 'finish_date', name: 'finish_date' },
            { data: 'description_pinalty', name: 'description_pinalty', render: function(row, type, render){
                var split_amount_service = row.split(",");
                var html ="";
                $.each(split_amount_service,function(i,item){
                    html += split_amount_service[i]+"<br/>";
                }); 
                return html;
            }},
            { data: 'action', name: 'action'}
        ],
        "scrollX": true,
    });
});

function deleteManagementFee(id){
    $('#deleteManagementFee'+id).submit(function(){
        Swal.fire({
            title: 'Perhatian!',
            html: 'Apakah anda yakin ingin menghapus data management_fee ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText:'Delete',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:'management_fee/deleteManagementFee',
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        'id':id
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