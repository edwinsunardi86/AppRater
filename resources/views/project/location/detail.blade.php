@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setup Location</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setup</a></li>
                    <li class="breadcrumb-item active">Location</li>
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
                            <h3 class="card-title">Form Location</h3>
                        </div>
                        <form method="post" id="form_location" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputLocationName" class="col-sm-2 col-form-label">Location Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="location_name" id="location_name" value="{{ $location->location_name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Location Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="location_description" id="location_description" rows="5" readonly>{{ $location->location_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="selectRegionName" class="col-sm-2 col-form-label">Region Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $location->region_name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRegionDescription" class="col-sm-2 col-form-label">Region Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="region_description" id="region_description" rows="5" readonly>{{ $location->region_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputProjectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="project_name" id="project_name" value="{{ $location->project_name }}" readonly>
                                        <input type="hidden" class="form-control" name="project_code" id="project_code" value="{{ $location->project_code }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $location->client_name }}" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" value="{{ $location->client_id }}">
                                    </div>
                                </div>
                                <a href="{{ url()->previous() }}" class="btn bg-purple btn-md">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection