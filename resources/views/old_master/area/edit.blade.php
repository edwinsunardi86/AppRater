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
                            <h3 class="card-title">Form Update Area</h3>
                        </div>
                        <form method="post" id="form_area" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputAreaName" class="col-sm-2 col-form-label">Area Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="area_name" id="area_name" value="{{ $area->area_name }}" readonly>
                                        <input type="hidden" name="area_id" id="area_id" value="{{ $area->area_id }}">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreaDescription" class="col-sm-2 col-form-label">Area Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="area_description" id="area_description" rows="5">{{ $area->area_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputService" class="col-sm-2 col-form-label">Service</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="service" id="service">
                                            @foreach($service as $row)
                                                <option value="{{ $row->service_code }}" {{ $area->service_code == $row->service_code ? 'selected' : '' }}>{{ $row->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLocationName" class="col-sm-2 col-form-label">Location Name</label>
                                    <div class="col-sm-4">
                                        <select class="form-control select2" name="location_name" id="location_name"></select>
                                        <input type="hidden" name="location_id" id="location_id" value="{{ $area->location_id }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Location Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="location_description" id="location_description" rows="5" readonly>{{ $area->location_description }}</textarea>
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
<script>
$(document).ready(function(){

    $('#form_area').validate({
        rules:{
            location_name:{
                required:true,
            }
        },
        messages:{
            location_name: "Please input Location Name"
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
                url:"/area/update_area",
                type:"POST",
                dataType:"JSON",
                data:{
                    location_id:$('#location_name').val(),
                    service:$('#service').val(),
                    description:$('#area_description').val(),
                    area_id:$('#area_id').val()
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

    $.each(data,function(i,item){
        $('#location_name').append($('<option>',{
            value:data[i].id,
            text:data[i].location_name
        }));
        if($('#location_id').val() == data[i].id){
            $('#location_name option[value='+data[i].id+']').attr('selected','selected');
        }
        $('#location_name').change(function(){
            if($('#location_name').val() == ""){
                $('#address').val("");
                $('#description').val("");
            }else{
                $('#address').val(data[i].address);
                $('#location_description').val(data[i].location_description);
            }
        });
    });
});
</script>
@endsection