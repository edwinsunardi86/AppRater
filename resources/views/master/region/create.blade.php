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
                                <button type="button" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
                                <button type="button" id="removeRow" class="btn btn-xl btn-danger mb-5 ml-2">Remove Row</button>
                                <table id="table_add_region" class="table table-bordered table-stripped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Region</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
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
        
    var tb_region = $('#table_add_region').DataTable();

    var counter = 1;

    $('#addRow').on('click',function(){
        tb_region.row.add(['<input type="text" name="region_name[]" id="region_name'+counter+'" class="form-control form-control-sm" required data-msg="Please input field region"/>','<textarea class="form-control form-control-sm " id="region_description'+counter+'" name="region_description[]" rows="7" cols="20">']).draw(false);
        counter++;
    });
    $('#addRow').click();

    $('#removeRow').on('click',function(){
        tb_region.row('.selected').remove().draw(false);
    });

    $('#table_add_region tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });
    
});




$('#form_region').submit(function(e){
    e.preventDefault();
    var region_name = $('input[name^="region_name[]"]').length;
    var arr_region = new Array();
    for(var i = 1;i <= region_name;i++){
        arr_region.push({
            'region_name': $('#region_name'+i).val(),
            'region_description': $('#region_description'+i).val(),
        });
     }
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/store_region",
        type:"POST",
        dataType:"JSON",
        data:{
            region:arr_region
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
});




</script>
@endsection