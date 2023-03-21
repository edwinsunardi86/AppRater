@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Area</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
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
                            <h3 class="card-title">Form Sub Area</h3>
                        </div>
                        <form method="post" id="form_sub_area" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputClientDescription" class="col-sm-2 col-form-label">Client Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="client_description" id="client_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectRegionName" class="col-sm-2 col-form-label">Region Name</label>
                                    <div class="col-sm-4">
                                        <select name="region_name" id="region_name" class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRegionDescription" class="col-sm-2 col-form-label">Region Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="region_description" id="region_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectLocationName" class="col-sm-2 col-form-label">Location Name</label>
                                    <div class="col-sm-4">
                                        <select name="location_name" id="location_name" class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLocationAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="address" id="address" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLocationDescription" class="col-sm-2 col-form-label">Location Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="location_description" id="location_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectAreaName" class="col-sm-2 col-form-label">Area Name</label>
                                    <div class="col-sm-4">
                                        <select name="area_name" id="area_name" class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreaDescription" class="col-sm-2 col-form-label">Area Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="area_description" id="area_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <button type="button" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
                                <table id="table_add_sub_area" class="table table-bordered table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sub Area Name</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
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
            <div class="modal-body">
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
    $(document).on('click','.pilih_client',function(){
    $('#client_id').val(($(this).attr('data-id')));
    $('#client_name').val(($(this).attr('data-client_name')));
    $('#client_description').val($(this).attr('data-client-description'));
    $('#modal-xl').modal('toggle');
});
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
    var counter = 1;
    var tb_sub_area = $('#table_add_sub_area').DataTable();
    $('#addRow').on('click',function(){
        tb_sub_area.row.add(['<input type="text" name="sub_area_name[]" id="sub_area_name'+counter+'" class="form-control form-control-sm" required/>','<textarea class="form-control form-control-sm " id="sub_area_description'+counter+'" name="sub_area_description[]" rows="7" cols="20">']).draw(false);
        counter++;
    });

    $('#form_sub_area').validate({
        rules:{
            client_name:{
                required:true,
            },
            region_name:{
                required:true,
            },
            location_name:{
                required:true,
            },
            area_name:{
                required:true,
            }
        },
        messages:{
            client_name:{
                required: "Please input Client Name"
            },
            region_name:{
                required: "Please input Region Name"
            },
            location_name: {
                required: "Please input Location Name"
            },
            area_name:{
                required:"Please input Area Name",
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
            var sub_area_name = $('input[name^="sub_area_name[]"]').length
            var arr_sub_area = new Array();
            for(var i = 1;i <= sub_area_name;i++){
                arr_sub_area.push({
                    'sub_area_name': $('#sub_area_name'+i).val(),
                    'sub_area_description': $('#sub_area_description'+i).val(),
                });
            }
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/sub_area/store_sub_area",
                type:"POST",
                dataType:"JSON",
                data:{
                    area_id:$('#area_name').val(),
                    sub_area:arr_sub_area
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
// $(document).on('click','.pilih_client',function(){
//         alert('test');
//     });
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
            $('#region_name').append($('<option>',{
                value:"",
                text:"Choice Region"
            }));
            $.each(data, function(i,item){
                $('#region_name').append($('<option>',{
                    value:data[i].id,
                    text:data[i].region_name
                }));
            });
        }
    });
});

$(document).on('change','#region_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/region/get_data_region_to_selected',
        type:'POST',
        dataType:"JSON",
        data:{
            region_id:$('#region_name').select2().val(),
            client_id:$('#client_id').val()
        },
        processData:true,
        success: function(data){
            $('#region_description').val(data[0].region_description);
            $('select#location_name').find('option').remove();
            $('select#location_name').append($('<option>',{
                value:"",
                text:"Choice Location"
            }));
            $.each(data, function(i,item){
                $('#location_name').append($('<option>', {
                    value:data[i].id,
                    text:data[i].location_name
                }));
            });
        }
    });

    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/location/get_data_location_to_selected',
        type:'POST',
        dataType:"JSON",
        data:{
            region_id:$('#location_name').select2().val(),
            client_id:$('#client_id').val(),
            region_id:$('#region_name').select2().val(),
        },
        processData:true,
        success: function(data){
            // $('#location_description').val(data[0].location_description);
            $('select#location_name').find('option').remove();
            $('select#location_name').append($('<option>',{
                value:"",
                text:"Choice Location"
            }));
            $.each(data, function(i,item){
                $('#location_name').append($('<option>', {
                    value:data[i].id,
                    text:data[i].location_name
                }));
            });
        }
    });
});
$(document).on('change','#location_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/location/get_data_location_to_selected',
        type:'POST',
        dataType:"JSON",
        data:{
            location_id:$('#location_name').select2().val(),
            region_id:$('#region_name').val(),
            client_id:$('#client_id').val()
        },
        processData:true,
        success: function(data){
            // $('select#area_name').find('<option>').remove();
                
            $.each(data, function(i,item){
                $('#location_name option').each(function(){
                    $('#address').val(data[i].address);
                    $('#location_description').val(data[i].location_description);
                });
            });
        }
    });
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/area/get_data_area_to_selected',
        type:'POST',
        dataType:"JSON",
        data:{
            location_id:$('#location_name').select2().val(),
        },
        processData:true,
        success: function(data){
            $('select#area_name').find('option').remove();
            $('select#area_name').append($('<option>',{
                value:"",
                text:"Choice Location"
            }));
            $.each(data, function(i,item){
                $('#area_name').append($('<option>', {
                    value:data[i].id,
                    text:data[i].area_name
                }));
            });
        }
    });
});
$(document).on('change','#area_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/area/get_data_area_to_selected',
        type:'POST',
        dataType:"JSON",
        data:{
            area_id:$('#area_name').val()
        },
        processData:true,
        success: function(data){
            $.each(data, function(i,item){
                $('#area_name option').each(function(){
                    $('#area_description').val(data[i].area_description);
                });
            });
        }
    });
});
</script>
@endsection