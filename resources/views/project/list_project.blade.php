@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setup Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setup</a></li>
                    <li class="breadcrumb-item active">Project</li>
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
                            <a href="project/form_project" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i> Add Project</a>
                        </div>
                        <div class="card-body">
                            <table id="table_project" class="diplay table table-bordered table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Project Code</th>
                                        <th>Project Name</th>
                                        <th>Client Name</th>
                                        <th>Contract Start</th>
                                        <th>Contract End</th>
                                        <th>Action</th>
                                    </tr>
                                    <tbody></tbody>
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
    var table_project = $('#table_project').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:'{!! route("data_project:dt") !!}',
        columns:[
            { 
                data:i, name: i, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data:'project_code', name: 'project_code' },
            {
                data:'project_name', name: 'project_name' },
            {
                data:'client_name', name: 'client_name' },
            {
                data:'contract_start', name: 'contract_start' },
            {
                data:'contract_finish', name: 'contract_finish' },
            { 
                data:'action', name: 'action' }
        ],
        "scrollX": true,
    });
});

function deleteProject(project_code,project_name){
    $('#deleteProject_'+project_code).submit(function(){
        var formData = new FormData();
        formData.append('project_code',project_code);
        formData.append('project_name',project_name);
        Swal.fire({
            title: 'Perhatian!',
            html: 'Apakah anda yakin ingin menghapus data project_name ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText:'Delete',
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
                    },
                    url:'project/deleteProject',
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