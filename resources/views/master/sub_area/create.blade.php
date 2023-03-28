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
                                    <label for="selectAreaName" class="col-sm-2 col-form-label">Area Name</label>
                                    <div class="col-sm-4">
                                        <select name="area_name" id="area_name" class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAreaDescription" class="col-sm-2 col-form-label">Area Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="area_description" id="area_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <button type="button" value="add" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
                                <button type="button" id="removeRow" class="btn btn-xl btn-primary mb-5 ml-2">Remove Row</button>
                                <table id="table_add_sub_area" class="table table-bordered table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sub Area Name</th>
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
    var counter = 1;
    var tb_sub_area = $('#table_add_sub_area').DataTable();
    $('#addRow').on('click',function(){
        tb_sub_area.row.add(['<input type="text" name="sub_area_name[]" id="sub_area_name'+counter+'" class="form-control form-control-sm sub_area_id"/>','<textarea class="form-control form-control-sm" id="sub_area_description'+counter+'" name="sub_area_description[]" rows="7" cols="20">']).draw(false);
        counter++;
    });
    $('#addRow').click();
    $('#form_sub_area').validate({
        rules:{
            area_name:{
                required:true,
            },
        },
        messages:{
            area_name:{
                required:"Please input Area Name",
            },
            'sub_area_name[]':{
                required:"Please input sub area"
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
            var sub_area_name = $('input[name^="sub_area_name[]"]').length
            var arr_sub_area = new Array();
            for(var i = 1;i <= sub_area_name;i++){
                arr_sub_area.push({
                    'sub_area_name': $('#sub_area_name'+i).val(),
                    'sub_area_description': $('#sub_area_description'+i).val(),
                });
            }
            var count_not_empty = 0;

            $('input.sub_area_id').each(function(){
                count_not_empty = $('input.sub_area_id').val() != "" ? count_not_empty += 1 : count_not_empty;
            });

            if(count_not_empty == $('input.sub_area_id').length){
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:"/sub_area/store_sub_area",
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        area_id:$('#area_name').val(),
                        sub_area:arr_sub_area
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
            }else{
                Swal.fire({
                    title:"Warning",
                    html:"Please complete input sub area",
                    icon:"error"
                });
            }
        }
    });
});

$.get('/area/getDataAreaSelected',function(data,status){
    $('#area_name').append($('<option>',{
            value: "",
            text: "Choice Sub Area",
        }));
    $.each(data,function(i,item){
        $('#area_name').append($('<option>',{
            value: data[i].id,
            text: data[i].area_name,
        }));
        $('#area_name').change(function(){
            if($('#area_name').find(':selected').val() == ""){
                $('#area_description').val("");
            }else{
                var id = $('#area_name').find(':selected').val();
                $.get('/area/getDataDescriptionById/'+id,function(data_desc,status){
                    $('#area_description').val(data_desc.area_description);
                });
            }
        });
    });
});
</script>
@endsection