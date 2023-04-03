{{-- @php
print_r($kode_dial);die();
@endphp --}}
@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Client</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Client</li>
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
                            <h3 class="card-title">Detail Client</h3>
                        </div>
                        <form method="post" id="form_client" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $data_client->client_name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-4">
                                        <textarea name="address" class="form-control" id="address" cols="50" rows="5" readonly>{{ $data_client->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContact1" class="col-sm-2 col-form-label">Phone 1</label>
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone1" id="phone1" class="form-control" value="{{ $data_client->contact1 }}" data-inputmask='"mask": "(999) 999-9999"' data-mask readonly>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="inputContact1" class="col-sm-2 col-form-label">Phone 2</label>
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone2" id="phone2" class="form-control" value="{{ $data_client->contact2 }}" data-inputmask='"mask": "(999) 999-9999"' data-mask readonly>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="inputContact1" class="col-sm-2 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select name="dial_country" id="dial_country" class="select2 form-control" disabled>
                                            @foreach($kode_dial as $row)
                                                @if($data_client->mobile != "")
                                                    <option value="{{ $row->dial_code }}" {{ $data_client->dial_code_mobile == $row->dial_code ? 'selected': '' }}>{{ $row->dial_code." (".$row->country.")" }}</option>
                                                @else
                                                    <option value="{{ $row->dial_code }}" selected>{{ $row->dial_code." (".$row->country.")" }}</option>
                                                @endif
                                                
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group col-sm-2">
                                            <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $data_client->mobile }}" readonly>
                                        </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-4">
                                        <textarea name="description" class="form-control" id="description" cols="50" rows="5" readonly>{{ $data_client->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a class="btn bg-purple" href="{{ url()->previous() }}">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
