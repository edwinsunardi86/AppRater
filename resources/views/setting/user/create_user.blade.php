@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah User</h1>
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
                        <form method="post" id="form_user" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFullName" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-4">
                                        <select name="role" id="role" class="form-control"">
                                            <option value="">Pilih</option>
                                            <option value="1">Super Administrator</option>
                                            <option value="2">Administrator</option>
                                            <option value="3">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row div_client" style="display:none">
                                    <label for="inputClient" class="col-sm-2 col-form-label">Client</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
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
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_client" class="diplay table table-bordered table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Client Name</th>
                            <th>Address</th>
                            <th>Contact 1</th>
                            <th>Contact 2</th>
                            <th>Mobile</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).on('change','#role', function(){
        if($('#role').val() != "" && $('#role').val() != '1'){
            $('.div_client').show();
        }else{
            $('.div_client').hide();
            $('#client_name').val("");
            $('#client_id').val("");
        }
    });

$(document).ready(function(){
    var i = 1;
    var tb_client = $('#table_client').DataTable({
    processing:true,
    serverSide:true,
    destroy: true,
    ajax:'{!! route("data_client_to_selected:dt") !!}',
    columns:[
        {data:'', name:'', render:function(row, type, set){
            return i++;
        }},
        { data:'client_name', name:'client_name' },
        { data:'address', name:'address' },
        { data: 'contact1', name:'contact1' },
        { data: 'contact2', name: 'contact2' },
        { data: 'contact_mobile', name: 'contact_mobile'},
        { data: 'description', name: 'description'},
        { data: 'action', name: 'action'}
        ],
    });
});

$(document).on('click','.pilih_client',function(){
    $('#client_id').val(($(this).attr('data-id')));
    $('#client_name').val(($(this).attr('data-client_name')));
    $('#client_description').val($(this).attr('data-client-description'));
    $('#modal-xl').modal('toggle');
});

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
            role : {
                required:true
            },
            client_name : {
                required:true
            }
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
            },
            role:{
                required:"Please choice role user"
            },
            client_name : {
                required:"Please choice client"
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
                
        }
    });
    $('#form_user').submit(function(e){
        e.preventDefault();
        var formData = new FormData();
        formData.append('username',$('#username').val());
        formData.append('email', $('#email').val());
        formData.append('fullname', $('#fullname').val());
        formData.append('role',$('#role').val());
        formData.append('client_id',$('#client_id').val());
        $.ajax({
            headers:
            {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url:"/users/store_user",
            type:"POST",
            data:formData,
            dataType:"JSON",
            processData:false,
            contentType:false,
            success:function(data){
                if(data.icon == 'success'){
                    Swal.fire({
                        title:"<b>Perhatian!</b>",
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
                        html: '<p>' + data.username +'<br/>'+ data.email + '</p>',
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