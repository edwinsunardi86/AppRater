@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Setup Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    <li class="breadcrumb-item active">Setup Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" id="form_project" class="form-horizontal">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Project</h3>
                            </div>
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $project->client_name }}" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" value="{{ $project->client_id }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputProjectName" class="col-sm-2 col-form-label">Project Code</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="project_code" id="project_code" value="{{ $project->project_code }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputProjectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="project_name" id="project_name" value="{{ $project->project_name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dateContract" class="col-sm-2 col-form-label">Date Contract:</label>
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="dateContractEdit" name="dateContractEdit">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                  <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </div> 
                        </div>
                        <div class="row show_detail_region">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:scroll">
                <table id="table_client" class="diplay table table-bordered table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Client Name</th>
                            <th>Address</th>
                            <th>Contact 1</th>
                            <th>Contact 2</th>
                            <th>Mobile</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
$(document).ready(function(){
    $('#form_project').validate({
        rules:{
            client_name:{
                required:true
            },
            project_name:{
                required:true
            },
            dateContract:{
                required:true
            },
        },
        messages:{
            client_name:{
                required:"Please choice client"
            },
            project_name:{
                required:"Please input project name"
            },
            dateContract:{
                required:"Please input date contract"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function() {
            var region = $('#region_name').val();
            var formData = new FormData();
            formData.append('client_id',$('#client_id').val());
            formData.append('project_name',$('#project_name').val());
            formData.append('project_code',$('#project_code').val());
            formData.append('dateContractEdit',$('#dateContractEdit').val());
            formData.append('region_name',region);
            $.ajax({
                headers:
                {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url:"/project/updateProject",
                type:"POST",
                data:formData,
                dataType:"JSON",
                processData:false,
                contentType:false,
                success:function(data){
                    if(data.icon == 'success'){
                        Swal.fire({
                            title:"<b>Perhatian!</b>",
                            text:data.message,
                            icon:data.icon,
                            confirmButtonText:"OK"
                        });

                        setTimeout(function(){ 
                            window.location.href=data.redirect; }, 
                                2000
                        );
                    }else{
                        Swal.fire({
                            title:"<b>Perhatian!</b>",
                            text:data.message,
                            icon:data.icon,
                            confirmButtonText:"OK"
                        });
                    }
                },
                error:function(xhr,error,errorThrown){
                    alert(xhr.status); 
                }
            });
        }
    });
    var i = 1;
    var tb_client = $('#table_client').DataTable({
    processing:true,
    serverSide:true,
    destroy: true,
    ajax:'{!! route("data_client_to_selected:dt") !!}',
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
    });
});
$(document).on('click','.pilih_client',function(){
    $('#client_id').val(($(this).attr('data-id')));
    $('#client_name').val(($(this).attr('data-client_name')));
    $('#client_description').val($(this).attr('data-client-description'));
    $('#modal-xl').modal('toggle');
});

$(document).on('click','.pilih_client',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/get_data_region_to_selected",
        type:"POST",
        dataType:"JSON",
        data:{
            client_id:$('#client_id').val()
        },
        processData:true,
        success: function(data){
            $('select#region_name').find('option').remove();
            $.each(data, function(i,item){
                $('#region_name').append($('<option>',{
                    value:data[i].id,
                    text:data[i].region_name
                }));
                $('#region_name option').each(function(){
                    if(this.selected){
                        $('#region_description').val(data[i].description);
                    }
                });
            });
        }
    });
});
$('#dateContractEdit').daterangepicker({
  locale: {
    format:'YYYY/MM/DD'
  },

  startDate: '{{ $project->contract_start }}',
  endDate: '{{ $project->contract_finish }}'
});
</script>
@endsection
