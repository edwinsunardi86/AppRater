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
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $sub_area->client_name }}" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputClientDescription" class="col-sm-2 col-form-label">Client Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="client_description" id="client_description" rows="5" readonly>{{ $sub_area->client_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectRegionName" class="col-sm-2 col-form-label">Region Name</label>
                                    <div class="col-sm-4">
                                        <select name="region_name" id="region_name" class="form-control select2" disabled>
                                            <option value="{{ $sub_area->region_id }}">{{ $sub_area->region_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRegionDescription" class="col-sm-2 col-form-label">Region Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="region_description" id="region_description" rows="5" readonly>{{ $sub_area->region_description }}</textarea>
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
                                    <label for="inputLocationAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="address" id="address" rows="5" readonly>{{ $sub_area->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLocationDescription" class="col-sm-2 col-form-label">Location Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="location_description" id="location_description" rows="5" readonly>{{ $sub_area->location_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectAreaName" class="col-sm-2 col-form-label">Area Name</label>
                                    <div class="col-sm-4">
                                        <select name="area_name" id="area_name" class="form-control select2" disabled>
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
                                        <input type="text" class="form-control" name="sub_area_name" id="sub_area_name" value="{{ $sub_area->sub_area_name}}" readonly>
                                        <input type="hidden" name="sub_area_id" id="sub_area_id" value="{{ $sub_area->sub_area_id}}">
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
<script>
$('#form_sub_area').submit(function(e){
    e.preventDefault();
    
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/sub_area/update_sub_area",
        type:"POST",
        dataType:"JSON",
        data:{
                    sub_area_id:$('#sub_area_id').val(),
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
});
</script>
@endsection