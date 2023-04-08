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
                    <li class="breadcrumb-item active">Area</li>
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
                            <h3 class="card-title">Form Add Area</h3>
                        </div>
                        <form method="post" id="form_area" class="form-horizontal">
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
                                    <label for="projectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <select name="project_code" id="project_code" class="form-control select2"></select>
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
                                    <label for="inputAreaName" class="col-sm-2 col-form-label">Area</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="area_name" id="area_name" rows="5">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="selectServiceName" class="col-sm-2 col-form-label">Service</label>
                                    <div class="col-sm-4">
                                        <select name="service" id="service" class="form-control">
                                            <option value="">Choice Service</option>
                                            @foreach($service as $row)
                                            <option value="{{ $row->service_code }}">{{ $row->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <button type="button" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
                                <button type="button" id="removeRow" class="btn btn-xl btn-danger mb-5 ml-2">Remove Row</button>
                                <table id="table_add_area" class="table table-bordered table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Area</th>
                                            <th>Service</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
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
    var counter = 0;
    var tb_area = $('#table_add_area').DataTable();
    var arr_service = new Array();
    var opt_service = "";
    $.ajax({
            headers:{
                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
            },
            url:"/area/getDataService",
            type:"GET",
            dataType:"JSON",
            processData:true,
            success: function(data_service){
            //console.log(data);
                
                $.each(data_service,function(i,item){
                    opt_service +="<option value="+data_service[i].service_code+">"+data_service[i].service_name+"</option>";
                    
                });
            
            }        
        });
        
    $('#addRow').on('click',function(){
        tb_area.row.add(['<input type="text" name="area_name[]" id="area_name'+counter+'" class="form-control form-control-sm" required data-msg="Please input field area"/>','<select class="form-control" name="service_code[]" id="service_code'+counter+'"></select>','<textarea class="form-control form-control-sm" id="area_description'+counter+'" name="area_description[]" rows="7" cols="20">']).draw(false);
            $('select#service_code'+counter).append(opt_service);
            alert(opt_service);
        counter++;
    });

    $('#removeRow').on('click',function(){
        tb_area.row('.selected').remove().draw(false);
    });

    $('#table_add_area tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
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
    $('#form_area').validate({
        rules:{
            location_name:{
                required:true,
            },
            area_name:{
                required:true
            },
            service:{
                required:true
            }
        },
        messages:{
            location_name: {
                required:"Please input Location Name"
            },
            area_name: {
                required:"Please input Area Name"
            },
            service: {
                required:"Please choice Service"
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
            var area_name = $('input[name^="area_name[]"]').length
            var arr_area = new Array();
            for(var i = 1;i <= area_name;i++){
                arr_area.push({
                    'area_name': $('#area_name'+i).val(),
                    'area_description': $('#area_description'+i).val(),
                    'service' : $('#service'+i).val(),
                });
            }
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/area/store_area",
                type:"POST",
                dataType:"JSON",
                data:{
                    location_id:$('#location_name').val(),
                    // area:arr_area,
                    area_name:$('#area_name').val(),
                    service:$('#service').val(),
                    description:$('#description').val()
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

$(document).on('change','#region_name',function(){
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
</script>
@endsection