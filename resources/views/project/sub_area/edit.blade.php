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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Sub Area</h3>
                        </div>
                        <form method="post" id="form_sub_area" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $sub_area->client_name }}" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" value="{{ $sub_area->client_id }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="projectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <select name="project_code" id="project_code" class="form-control select2">
                                            <option value="{{ $sub_area->project_code }}">{{ $sub_area->project_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectRegionName" class="col-sm-2 col-form-label">Region Name</label>
                                    <div class="col-sm-4">
                                        <select name="region_name" id="region_name" class="form-control select2">
                                            <option value="{{ $sub_area->region_id }}">{{ $sub_area->region_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectLocationName" class="col-sm-2 col-form-label">Location Name</label>
                                    <div class="col-sm-4">
                                        <select name="location_name" id="location_name" class="form-control select2">
                                            <option value="{{ $sub_area->location_id }}">{{ $sub_area->location_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectAreaName" class="col-sm-2 col-form-label">Area Name</label>
                                    <div class="col-sm-4">
                                        <select name="area_name" id="area_name" class="form-control select2">
                                            <option value="{{ $sub_area->area_id }}">{{ $sub_area->area_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreaDescription" class="col-sm-2 col-form-label">Area Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="area_description" id="area_description" rows="5" readonly>{{ $sub_area->area_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSubAreaName" class="col-sm-2 col-form-label">Sub Area Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="sub_area_name" id="sub_area_name" value="{{ $sub_area->sub_area_name}}">
                                        <input type="hidden" name="sub_area_id" id="sub_area_id" value="{{ $sub_area->sub_area_id }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreaDescription" class="col-sm-2 col-form-label">Sub Area Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="sub_area_description" id="sub_area_description" rows="5">{{ $sub_area->sub_area_description }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                                <a href="{{ url()->previous() }}" class="btn bg-purple btn-md">Back</a>
                            </div>
                        </form>
                    </div>
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
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function(){
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
$(document).on('change','#region_name',function(){
    $('#location_name option').remove();
    $('#area_name option').remove();
    $("#sub_area_name").val("");
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/location/getDataLocationToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            region_id:$('#region_name').val()
        },
        processData:true,
        success:function(data){
            $('select#location_name').empty();
            $('select#location_name').append($('<option>',{
                    text:"Choice Location",
                    value:""
            }));
            $.each(data,function(i,item){
                $('#location_name').append($('<option>',{
                    value:data[i].id,
                    text:data[i].location_name
                }));
                $('#location_name').change(function(){
                    if($('#location_name').val() == ""){
                        $('#address').val("");
                        $('#location_description').val("");
                    }else{
                        $('#address').val(data[i].address);
                        $('#location_description').val(data[i].location_description);
                    }
                });
            });
        }
    });
});

$(document).on('click','.pilih_client',function(){
    $('#region_name option').remove();
    $('#location_name option').remove();
    $('#area_name option').remove();
    $("#sub_area_name").val("");
    $('#client_id').val(($(this).attr('data-id')));
    $('#client_name').val(($(this).attr('data-client_name')));
    $('#client_description').val($(this).attr('data-client-description'));
    $('#modal-xl').modal('toggle');
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/project/getProjectToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "client_id":$('#client_id').val(),
        },
        processData:true,
        success:function(data){
            $('.tb_sub_area > tbody').empty();
            $('select#project_code option').remove();
            $('select#project_code').append($('<option>',{
                    text:"Choice Project",
                    value:""
                }));
            $.each(data,function(i,item){
                $('select#project_code').append($('<option>',{
                    text:data[i].project_name,
                    value:data[i].project_code
                }));
            });
        }
    });
});

$(document).on('change','#project_code',function(){
    $('#region_name option').remove();
    $('#location_name option').remove();
    $('#area_name option').remove();
    $("#sub_area_name").val("");
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/getDataRegionToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "project_code":$('#project_code').val(),
        },
        processData:true,
        success:function(data){
            $('.table_add_location > tbody').empty();
            $('select#region_name option').remove();
            $('select#region_name').append($('<option>',{
                    text:"Choice Region",
                    value:""
                }));
            $.each(data,function(i,item){
                $('select#region_name').append($('<option>',{
                    text:data[i].region_name,
                    value:data[i].id
                }));
            });
        }
    });
});

$(document).on('change','#location_name',function(){
    $('#area_name option').empty();
    $("#sub_area_name").val("");
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/area/getDataAreaSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "location_id":$('#location_name').val(),
        },
        processData:true,
        success:function(data){
            $('select#area_name').empty();
            $('select#area_name').append($('<option>',{
                    text:"Choice Area",
                    value:""
            }));
            $.each(data,function(i,item){
                $('select#area_name').append($('<option>',{
                    text:data[i].area_name,
                    value:data[i].id
                }));
            });
        }
    });
});

$(document).on('change','#area_name',function(){
    $("#sub_area_name").val("");
});
$(document).ready(function(){
    $('#form_sub_area').validate({
    rules:{
        area_name:{
            required:true,
        },
        location_name:{
            required:true,
        },
        region_name:{
            required:true
        },
        project_code:{
            required:true
        },
        client_name:{
            required:true
        }
    },
    messages:{
        area_name:{
            required:"Please choice area name"
        },
        location_name:{
            required:"Please choice location"
        },
        region_name:{
            required:"Please choice region"
        },
        project_code:{
            required:"Please choice project"
        },
        client_name:{
            required:"Please choice client name"
        }
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
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/sub_area/update_sub_area",
                type:"POST",
                dataType:"JSON",
                data:{
                    sub_area_id:$('#sub_area_id').val(),
                    sub_area_name:$('#sub_area_name').val(),
                    area_id:$('#area_name').val(),
                    sub_area_description:$('#sub_area_description').val()
                },
                processData:true,
                success: function(data){
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



// $.get('/area/getDataAreaSelected',function(data,status){
//     $('#area_name').append($('<option>',{
//             value: "",
//             text: "Choice Area",
//         }));
//     $.each(data,function(i,item){
//         if(data[i].id == {{ $sub_area->area_id }}){
//             $('#area_name').append($('<option>',{
//                 value: data[i].id,
//                 text: data[i].area_name,
//             }).prop('selected',true));
//         }else{
//             $('#area_name').append($('<option>',{
//                 value: data[i].id,
//                 text: data[i].area_name,
//             }));
//         }
        
//         $('#area_name').change(function(){
//             if($('#area_name').find(':selected').val() == ""){
//                 $('#area_description').val("");
//             }else{
//                 var id = $('#area_name').find(':selected').val();
//                 $.get('/area/getDataDescriptionById/'+id,function(data_desc,status){
//                     $('#area_description').val(data_desc.area_description);
//                 });
//             }
//         });
//     });
// });
</script>
@endsection