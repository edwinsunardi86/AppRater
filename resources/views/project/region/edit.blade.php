@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Region</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Region</li>
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
                            <h3 class="card-title">Form Region</h3>
                        </div>
                        <form method="post" id="form_region" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputRegionName" class="col-sm-2 col-form-label">Region Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="region_name" id="region_name" value="{{ $region->region_name }}" readonly>
                                        <input type="hidden" class="form-control" name="id" id="id" value="{{ $region->id }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRegionDescription" class="col-sm-2 col-form-label">Region Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="description" id="description" rows="5">{{ $region->description }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
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
$('#form_region').submit(function(e) {
    e.preventDefault();
    $.ajax({
        headers: {
            'X_CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        url: "/region/update_region",
        type: "POST",
        dataType: "JSON",
        data: {
            description: $('#description').val(),
            region_name: $('#region_name').val(),
            id: $('#_id').val()
        },
        processData: true,
        success: function(data) {
            Swal.fire({
                title: data.title,
                html: data.message,
                icon: data.icon
            });
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 1500);
        }
    });
});

</script>
@endsection