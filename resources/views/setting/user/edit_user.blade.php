@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Edit User</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active">Tambah User</li>
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
                            <h3 class="card-title">Form User</h3>
                        </div>
                        <form id="form_user" class="form-horizontal">
                            @method('put')
                            @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="inputLevel" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="level" id="level" style="width: 100%;">
                                        <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $user->level == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $user->level == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $user->level == 4 ? 'selected' : '' }}>4</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="inputFullName" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $user->fullname }}" placeholder="Full Name">
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
    $(function(){
        $('#form_user').validate({
            rules :{
                username : {
                    required:true,
                    minlength:5
                },
                email : {
                    email:true,
                    required:true
                },
                fullname : {
                    required:true,
                    minlength:5
                },
            },
            messages:{
                username:{
                    required:"Please enter a username",
                    minlength:"Username must be at least 4 characters long"
                },
                email:{
                    required:"Please enter a email address",
                    email:"Please enter a valid email address"
                },
                fullname:{
                    required:"Please enter a full name",
                    minlength:"Full name must be at least 4 characters long"
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
        });
        $('#form_user').submit(function(e){
        e.preventDefault();
        let data = {
            username : $('#username').val(),
            email : $('#email').val(),
            // level : $('#level').val(),
            fullname : $('#fullname').val() 
        };
        $.ajax({
            headers:
            {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },
            url:"/users/update_user",
            method:'POST',
            data: data,
            dataType:"JSON",
            success:function(data){
                if(data.icon == 'success'){
                    Swal.fire({
                        title:"<b>perhatian!</b>",
                        text:data.message,
                        icon:data.icon,
                        confirmButtonText:"OK"
                    });

                    setTimeout(function(){ 
                        window.location.href=data.redirect; }, 
                        2000
                    );
                    
                }else{
                    Swal.fire({
                        title:"<b>perhatian!</b>",
                        html: '<pre>'+ data.email + '</pre>',
                        customClass: {
                            popup: 'format-pre'
                        },
                        icon:data.icon,
                        confirmButtonText:"OK"
                    });
                }
            },
            error:function(xhr,error,errorThrown){
                alert(xhr.status); 
            }
        });
    });
    });

    
</script>
@endsection