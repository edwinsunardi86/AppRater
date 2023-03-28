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
                                <div class="form-group row">
                                    <label for="selectServiceName" class="col-sm-2 col-form-label">Service</label>
                                    <div class="col-sm-4">
                                        <select name="service" id="service" class="form-control">
                                            <option value="">Choice Service</option>
                                            @foreach($service as $row)
                                            <option value="{{ $row->service_code }}">{{ $row->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <button type="button" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
                                <button type="button" id="removeRow" class="btn btn-xl btn-danger mb-5 ml-2">Remove Row</button>
                                <table id="table_add_area" class="table table-bordered table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>Service</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table> --}}
                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function(){
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
            // var area_name = $('input[name^="area_name[]"]').length
            // var arr_area = new Array();
            // for(var i = 1;i <= area_name;i++){
            //     arr_area.push({
            //         'area_name': $('#area_name'+i).val(),
            //         'area_description': $('#area_description'+i).val(),
            //         'service' : $('#service'+i).val(),
            //     });
            // }
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

$.get('/location/getDataLocationToSelected',function(data,status){
    $('#location_name').append($('<option>',{
        value:"",
        text:"Choice Location"
    }));
var area_description = {};
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
});


    
</script>
@endsection