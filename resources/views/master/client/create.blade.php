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
                            <h3 class="card-title">Form Client</h3>
                        </div>
                        <form method="post" id="form_client" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-4">
                                        <textarea name="address" class="form-control" id="address" cols="50" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContact1" class="col-sm-2 col-form-label">Phone 1</label>
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone1" id="phone1" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="inputContact1" class="col-sm-2 col-form-label">Phone 2</label>
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone2" id="phone2" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="inputContact1" class="col-sm-2 col-form-label">Mobile</label>
                                        <div class="col-sm-2">
                                            <select name="dial_country" id="dial_country" class="select2 form-control">
                                            @foreach($kode_dial as $row)
                                                @if($row->country == 'Indonesia')
                                                    <option value="{{ $row->dial_code }}" selected>{{ $row->dial_code." (".$row->country.")" }}</option>
                                                @endif
                                                <option value="{{ $row->dial_code }}">{{ $row->dial_code." (".$row->country.")" }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group col-sm-2">
                                            <input type="text" name="mobile" id="mobile" class="form-control" data-mask>
                                        </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-4">
                                        <textarea name="description" class="form-control" id="description" cols="50" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                                </div>
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
    $('#form_client').validate({
        rules:{
            client_name:{
                required:true
            },
        },
        messages:{
            client_name:{
                required:"Please type Client Name"
            },
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
            var formData = new FormData();
            formData.append('client_name',$('#client_name').val());
            formData.append('address',$('#address').val());
            formData.append('phone1',$('#phone1').val());
            formData.append('phone2',$('#phone2').val());
            formData.append('dial_country',$('#dial_country').val());
            formData.append('mobile',$('#mobile').val());
            formData.append('description',$('#description').val());
            formData.append('_token',$('meta[name=csrf-token]').attr('content'));
            
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"store_client",
                type:"POST",
                dataType:"JSON",
                data:formData,
                processData:false,
                contentType:false,
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
</script>
@endsection
