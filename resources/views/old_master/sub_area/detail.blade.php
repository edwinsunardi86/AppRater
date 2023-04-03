@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Sub Area</h1>
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
                            <h3 class="card-title">Detail Sub Area</h3>
                        </div>
                        <form method="post" id="form_sub_area" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="selectAreaName" class="col-sm-2 col-form-label">Area Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="area_name" id="area_name" value="{{ $sub_area->area_name}}" readonly>
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
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreaDescription" class="col-sm-2 col-form-label">Sub Area Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="sub_area_description" id="sub_area_description" rows="5" readonly>{{ $sub_area->sub_area_description }}</textarea>
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