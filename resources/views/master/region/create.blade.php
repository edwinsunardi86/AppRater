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
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputClientDescription" class="col-sm-2 col-form-label">Client Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="client_description" id="client_description" rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <button type="button" id="addRow" class="btn btn-xl btn-primary mb-5 ml-2">Add New Row</button>
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

    var tb_region = $('#table_add_region').DataTable();

    var counter = 1;

    $('#addRow').on('click',function(){
        tb_region.row.add(['<input type="text" name="region_name[]" id="region_name'+counter+'" class="form-control form-control-sm"/>','<textarea class="form-control form-control-sm " id="region_description'+counter+'" name="region_description[]" rows="7" cols="20">']).draw(false);
        counter++;
    });
    $('#addRow').click();

    $('#form_region').validate({
        rules:{
            client_name:{
                required:true
            }
        },
        messages:{
            client_name:{
                required:"Please Choice Client"
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
            var region_name = $('input[name^="region_name[]"]').length;
            var arr_region = new Array();
            for(var i = 1;i <= region_name;i++){
                arr_region.push({
                    'region_name': $('#region_name'+i).val(),
                    'region_description': $('#region_description'+i).val(),
                });
            }

            // var data = {
            //     'client_id':$('#client_id').val(),
            //     'region':arr_region
            // };
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/region/store_region",
                type:"POST",
                dataType:"JSON",
                data:{
                    client_id:$('#client_id').val(),
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
        }
    });
});
$(document).on('click','.pilih_client',function(){
    $('#client_id').val(($(this).attr('data-id')));
    $('#client_name').val(($(this).attr('data-client_name')));
    $('#client_description').val($(this).attr('data-client-description'));
    $('#modal-xl').modal('toggle');
});
// $('#form_region').submit(function(e){
//     e.preventDefault();
//     var region_name = $('input[name^="region_name[]"]').length;
//     var arr_region = [];
//     for(var i = 1;i <= region_name;i++){
//         arr_region.push({
//             'region_name': $('#region_name'+i).val(),
//             'region_description': $('#region_description'+i).val(),
//         });
//     }
// });


</script>
@endsection