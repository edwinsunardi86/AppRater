<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.css">
  <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
  <style>    
    .bg-image {
      /* The image used */
      background-image: url("images/grey-abstract.jpg");
      
      /* Add the blur effect */
      filter: blur(8px);
      -webkit-filter: blur(8px);
      
      /* Full height */
      height: 100%; 
      width : 100%; 
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      z-index:-1;
      position:absolute;
    }    
    </style>
</head>
<body class="hold-transition login-page">
  <div class="bg-image"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html" style="color:deeppink"><b>Apps</b>  Appraisal Service SOS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="row d-flex justify-content-center">
    <div class="card-body login-card-body col-md-5 justify-content-center">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/login" id="formLogin" method="post">
        @csrf
        @if(session('loginError'))
        <div class="alert alert-danger alert-dismissible" style="animation: fadeIn ease 3s;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-ban"></i> Alert!</h5>
          {{ session('loginError') }}
          </div>
        @endif
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" id="email" value="{{ Cookie::get('email') }}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" value="{{ Cookie::get('password') }}" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" {{ Cookie::get('remember') == "true" ? "checked" : "" }}>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block" id="btn_submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <div class="col-md-6 d-flex align-items-center">
        <img src="/assets/images/business.jpg" class="img-fluid" alt="Responsive image">
    </div>
    </div>
    <!-- /.login-card-body -->
    <div class="bg-primary py-2"> 
      <div class="row px-2"> <small class="ml-4 ml-sm-5">Copyright &copy; 2023. All rights reserved by IT PT.SOS Indonesia</small>
          {{-- <div class="social-contact ml-4 ml-sm-auto"> <span class="fas fa-solid fa-facebook mr-4 text-sm"></span> <span class="fas fa-solid fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div> --}}
      </div>
    </div>
  </div>
  
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
{{-- <script>
  $(function(){
    $('#formLogin').validate({
      rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });
  });
  
  $(document).ready(function(){
    // alert($('#remember').is(':checked'));
    $('#formLogin').submit(function(e){
      e.preventDefault();
      var formData = new FormData();
      formData.append('email', $('#email').val());
      formData.append('password', $('#password').val());
      formData.append('remember', $('#remember').is(':checked'));
      $.ajax({
        headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        url:"/login",
        type : "POST",
        data : formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success:function(data){
          Swal.fire({
          title: "<b>Perhatian!</b>",
          text: data.message,
          icon: data.icon,
          confirmButtonText : "OK"
        });
        if(data.message == 'Login Sukses'){
          window.location.href = data.redirect;
        }
        },
        error: function(xhr,error, errorThrown) {  
            alert(xhr.status);
               
        }
      });
    });
  });
</script> --}}
</body>
</html>