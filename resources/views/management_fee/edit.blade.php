@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Management Fee - Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Management Fee</a></li>
                    <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" id="form" method="post">
                                <div class="form-group row">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="client_name" id="client_name" readonly>
                                        <input type="hidden" class="form-control form-control-sm" name="client_id" id="client_id" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="projectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-3">
                                        <select name="project_code" id="project_code" class="form-control form-control-sm select2"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pinalty" class="col-sm-2 col-form-label">Pinalty</label>
                                    <div class="col-sm-3">
                                        <textarea name="set_pinalty" id="set_pinalty" cols="10" rows="5" class="form-control form-control-sm">{{ $data->description_pinalty }}</textarea>
                                        <input type="hidden" name="id_pinalty" id="id_pinalty" value="{{ $data->id_header_pinalty }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-sm btn-primary" id="btn_set_pinalty" data-toggle="modal" data-target="#modal-set-pinalty">Set Pinalty</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="locationName" class="col-sm-2 col-form-label">Location Name</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="location_name" id="location_name" value="{{ $data->location_name }}">
                                        <input type="hidden" name="location_id" id="location_id" value="{{ $data->location_id }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" data-toggle="modal" data-target="#modal-location" class="btn btn-sm btn-block bg-gradient-primary mb-5"><i class="fas fa-user-plus"></i>Change Location</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="StartDate" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-2 input-group date" id="startDateFormat" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="start_date" name="start_date" data-target="#startDateFormat"/>
                                        <div class="input-group-append" data-target="#startDateFormat" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <label for="StartDate" class="col-sm-1 col-form-label">Finish Date</label>
                                    <div class="col-sm-2 input-group date" id="finishDateFormat" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="finish_date" name="finish_date" data-target="#finishDateFormat"/>
                                        <div class="input-group-append" data-target="#finishDateFormat" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fee" class="col-sm-2 col-form-label">Fee</label>
                                    <div class="col-sm-3">
                                        <input type="number" name="fee" id="fee" value="{{ $data->fee }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
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
            <div class="modal-body" style="overflow:scroll">
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
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-set-pinalty">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Setup Pinalty</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:scroll">
                <div class="table-responsive">
                    <table id="table_pinalty" class="display table table-bordered table-striped table-hover" style="width:70%">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Pinalty Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-location">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:scroll">
                <div class="table-responsive">
                    <table id="table_location" class="diplay table table-bordered table-striped table-hover" style="width:70%">
                        <thead>
                            <tr>
                                <th>Location Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
                <button type="button" id="choiceLocation" class="btn btn-md btn-primary" data-dismiss="modal">Pilih</button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
@php
    $exp_start_date = explode("-",$data->start_date);
    $start_date = $exp_start_date[1]."/".$exp_start_date[2]."/".$exp_start_date[0];
    $exp_finish_date = explode("-",$data->finish_date);
    $finish_date = $exp_finish_date[1]."/".$exp_finish_date[2]."/".$exp_finish_date[0];
@endphp
<script>
    
$('#startDateFormat').datetimepicker({
    defaultDate: new Date("{{ $start_date }}"),
    format: 'L',
});
$('#finishDateFormat').datetimepicker({
    defaultDate: new Date("{{ $finish_date }}"),
    format: 'L',
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
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/project/getProjectToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "client_id":$('#client_id').val(),
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success:function(data){
            $('.tb_sub_area > tbody').empty();
            $('select#project_code option').remove();
            $('select#project_code').append($('<option>',{
                    text:"Choice Project",
                    value:""
                }));
            $.each(data,function(i,item){
                $('select#project_code').append($('<option>',{
                    text:data[i].project_name,
                    value:data[i].project_code
                }));
            });
        }
    });
});
$(document).on('change','#project_code', function(){
    var table_pinalty = $('#table_pinalty').DataTable({
        processing:false,
        serverSide:false,
        destroy:true,
        ajax:{
            headers:{
                'X_CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
            },
            type:'POST',
            dataType:'JSON',
            url:'{!! route("data_pinalty_per_project_to_selected:dt") !!}',
            processData:true,
            data:{
                    'project_code':$('#project_code').val()
            },
        },
        columns:[
                { data: 'period', name: 'period' },
                { data: 'pinalty_score', name: 'pinalty_score' },
                { data: 'action', name: 'action',width: "5%" },
            ]
    });
    $(document).on('click','.btn_choice', function(){
        var id_header_pinalty = $(this).attr('data-id_header_pinalty');
        var period = $(this).attr('data-period');
        var pinalty_score = $(this).attr('data-pinalty_score');
        $('#id_pinalty').val(id_header_pinalty);
        var html_desc = period + "\n" + pinalty_score;
        $('#set_pinalty').val(html_desc);
    });
    var table_location = $('#table_location').DataTable({
        processing:false,
        serverSide:false,
        destroy:true,
        ajax:{
            headers:{
                'X_CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
            },
            type:'POST',
            dataType:'JSON',
            url:'{!! route("data_location_to_selected:dt") !!}',
            processData:true,
            data:{
                'project_code':$('#project_code').val()
            }
        },
        columns:[
            { data: 'location_name', name: 'location_name' },
            { data: 'description', name: 'description' },
            { data: 'action', width:"5%", name: 'action'}
        ],
    });

    $(document).on('click','.btn-choose-location',function(){
        var location_id = $(this).attr('data-location_id');
        var location_name = $(this).attr('data-location_name');
        $('#location_id').val(location_id);
        $('#location_name').val(location_name);
    })
});

$(document).ready(function(){
    $('#form').validate({
        rules:{
            set_pinalty:{
                required:true
            },
            start_date:{
                required:true
            },
            finish_date:{
                required:true
            }
        },
        messages:{
            set_pinalty:{
                required:"Please choice set pinalty"
            },
            start_date:{
                required:"Please choice start date"
            },
            finish_date:{
                required:"Please choice finish_date"
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
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                url:'/management_fee/updateManagementFee',
                type:"POST",
                dataType:"JSON",
                data:{
                    'id'        : {{ $data->id }},
                    'id_pinalty': $('#id_pinalty').val(),
                    'start_date': $('#start_date').val(),
                    'finish_date': $('#finish_date').val(),
                    'location_id': $('#location_id').val(),
                    'fee'        : $('#fee').val() 
                },
                processData:true,
                success:function(data){
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