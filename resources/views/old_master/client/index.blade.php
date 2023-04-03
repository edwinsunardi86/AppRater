@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Client</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Client</li>
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
                            <a href="client/add_client" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i> Tambah Client</a>
                        </div>
                        <div class="card-body">
                            <table id="table_client" class="table table-bordered table-stripped" style="width:100%">
                                <thead>
                                    <th>No</th>
                                    <th>Client Name</th>
                                    <th>Address</th>
                                    <th>Contact 1</th>
                                    <th>Contact 2</th>
                                    <th>Mobile</th>
                                    <th>Description</th>
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
    var tb_client = $('#table_client').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:'{!! route("data_client:dt") !!}',
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            { data:'client_name', name:'client_name' },
            { data:'address', name:'address' },
            { data: 'contact1', name:'contact1' },
            { data: 'contact2', name: 'contact2' },
            { data: 'contact_mobile', name: 'contact_mobile'},
            { data: 'description', name: 'description'},
            { data: 'action', name: 'action'}
        ],
        "scrollX": true,
    });
});

function deleteClient(id,clientName){
    $('#deleteClient_'+id).submit(function(){
        var formData = new FormData();
        formData.append('client_id',id);
        formData.append('client_name',clientName);
        Swal.fire({
            title: 'Perhatian!',
            html: 'Apakah anda yakin ingin menghapus data client ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText:'Delete',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                    },
                    url:'client/delete_client',
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