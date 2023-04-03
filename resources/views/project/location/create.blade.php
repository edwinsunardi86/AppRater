@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Location</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
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
                                    <label for="selectRegionName" class="col-sm-2 col-form-label">Region Name</label>
                                    <div class="col-sm-4">
                                        <select name="region_name" id="region_name" class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRegionDescription" class="col-sm-2 col-form-label">Region Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="region_description" id="region_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <button type="button" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
                                <table id="table_add_location" class="table table-bordered table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Location Name</th>
                                            <th>Address</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
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
    $.get('/region/geDataRegionToSelected',function(data,status){
        $('#region_name').append($('<option>',{
            value:"",
            text:"Choice Region"
        }))
        $.each(data,function(i,item){
            $('#region_name').append($('<option>',{
                value:data[i].id,
                text:data[i].region_name
            }));

            $('#region_name').change(function(){
                if($('#region_name').val() == ""){
                    $('#region_description').val("");
                }else{
                    $('#region_description').val(data[i].description);
                }
            });
        });
    });

    var counter = 1;
    var tb_location = $('#table_add_location').DataTable();
    $('#addRow').on('click',function(){
        tb_location.row.add(['<input type="text" name="location_name[]" id="location_name'+counter+'" class="form-control form-control-sm"/>','<textarea class="form-control form-control-sm " id="address'+counter+'" name="address[]" rows="7" cols="20">','<textarea class="form-control form-control-sm " id="location_description'+counter+'" name="location_description[]" rows="7" cols="20">']).draw(false);
        counter++;
    });
    $('#addRow').click();
    $('#form_location').validate({
        rules:{
            region_name: {
                required: true,
            },
        },
        messages: {
                region_name:{
                    required: "Mohon Pilih Region Anda"
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
            var location_name = $('input[name^="location_name[]"]').length;
            var arr_location = new Array();
            for(var i = 1;i <= location_name;i++){
                arr_location.push({
                    'location_name': $('#location_name'+i).val(),
                    'address' : $('#address'+i).val(),
                    'location_description': $('#location_description'+i).val(),
                });
            }
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/location/store_location",
                type:"POST",
                dataType:"JSON",
                data:{
                    region_id:$('#region_name').val(),
                    location:arr_location
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

    
</script>
@endsection