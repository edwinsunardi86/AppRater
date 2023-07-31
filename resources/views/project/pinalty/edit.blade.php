@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Setup Pinalty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setup</a></li>
                    <li class="breadcrumb-item active">Pinalty</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal" id="form">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Setup Pinalty</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <input type="hidden" name="id_header" id="id_header" value="{{ $header_pinalty->id_header }}">
                                    <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $header_pinalty->client_name }}" readonly>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id" value="{{ $header_pinalty->client_id }}" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="projectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <select name="project_code" id="project_code" class="form-control select2">
                                            <option value="{{ $header_pinalty->project_code }}">{{ $header_pinalty->project_name }}</option>
                                        </select>
                                     </div>
                                </div>
                                @php
                                    $exp_start_date = explode("-",$header_pinalty->start_date);
                                    $start_date = $exp_start_date[1]."/".$exp_start_date[2]."/".$exp_start_date[0];

                                    $exp_finish_date = explode("-",$header_pinalty->finish_date);
                                    $finish_date = $exp_finish_date[1]."/".$exp_finish_date[2]."/".$exp_finish_date[0];
                                @endphp
                                <div class="form-group row">
                                    <label for="StartDate" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-2 input-group date" id="startDateFormat" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="start_date" name="start_date" data-target="#startDateFormat" value="{{ $start_date }}"/>
                                        <div class="input-group-append" data-target="#startDateFormat" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <label for="StartDate" class="col-sm-1 col-form-label">Finish Date</label>
                                    <div class="col-sm-2 input-group date" id="finishDateFormat" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="finish_date" name="finish_date" data-target="#finishDateFormat" value="{{ $finish_date }}"/>
                                        <div class="input-group-append" data-target="#finishDateFormat" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-md btn-primary m-3" id="btn-template-score" data-toggle="modal" data-target="#modal-template-score">Template Score</button>
                                <div class="card card-danger card-outline">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h5>Set Percent Pinalty</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="display_score">

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" name="id_header_set_score" id="id_header_set_score" value="{{ $header_pinalty->id_header_set_score }}">
                    </form>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-template-score">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Template Score</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:auto">
                <table id="table-template-score" class="table-bordered table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Project Code</th>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
$(document).ready(function(){
    $('#startDateFormat').datetimepicker({
        format: 'L',
    });
    $('#finishDateFormat').datetimepicker({
        format: 'L',
    });
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

    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/pinalty/getDetailScorePinalty/"+{{ $header_pinalty->id_header }},
        type:"GET",
        dataType:"JSON",
        success:function(data){
            $('#display_score').empty();
            $.each(data,function(i,item){
                $('#id_header').val(data[i].id_header);
                var html_pinalty = "<div class=\"form-group row\">"+
                        "<label for=\"score"+i+"\" class=\"col-sm-2 col-form-label\">"+data[i].score+" ("+data[i].category+")</label>"+
                        "<div class=\"col-sm-1\">"+
                            "<input type=\"number\" min=0 max=100 class=\"form-control form-control-sm num_valid\" name=\"percentage[]\" value="+data[i].percent_pinalty+" id=\"percentage"+i+"\" maxlength=3>"+
                            "<input type=\"hidden\" name=\"score[]\" id=\"score"+i+"\" value=\""+data[i].score+"\">"+
                        "</div>"+
                        "<label for=\"score"+i+"\" class=\"col-sm-2 col-form-label\">%</label>"+
                    "</div>";
                $('#display_score').append(html_pinalty);
            });
        }
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
            _token: '{{csrf_token()}}'
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

$(document).on('click','#btn-template-score',function(){
    var i = 1;
    var tb_template_score = $('#table-template-score').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:{
            headers:{
                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
            },
            type:'POST',
            url:'{!! route("score_to_selected:dt") !!}',
            processData:true,
            data:{
                'project_code':$('#project_code').val()
            },
        },
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            { data: 'project_code', name:'project_code' },
            { data: 'project_name', name: 'project_name' },
            { data: 'start_date', name: 'start_date' },
            { data: 'finish_date', name: 'finish_date' },
            { data: 'kategori_nilai', name: 'kategori_nilai' },
            { data: 'action', name: 'action' }
        ]
    });
});

$(document).on('click','.choose-template-score',function(){
    var data_id = $(this).attr('data-id');
    var data_start_date = $(this).attr('data-start_date');
    var data_finish_date = $().attr('data-finish_date');
    $('#modal-template-score').modal('toggle');
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content'),
        },
        data:{
            'id':data_id
        },
        type:'GET',
        url:'/score/getDataScoreByIdHeader/'+data_id,
        dataType:'JSON',
        processData:true,
        success:function(data){
            $('#display_score').empty();
            $.each(data,function(i,item){
                $('#id_header_set_score').val(data[i].id_header_set_score);
                var html_pinalty = "<div class=\"form-group row\">"+
                        "<label for=\"score"+i+"\" class=\"col-sm-2 col-form-label\">"+data[i].score+" ("+data[i].category+")</label>"+
                        "<div class=\"col-sm-1\">"+
                            "<input type=\"number\" min=0 max=100 class=\"form-control form-control-sm num_valid\" name=\"percentage[]\" id=\"percentage"+i+"\" maxlength=3>"+
                            "<input type=\"hidden\" name=\"score[]\" id=\"score"+i+"\" value=\""+data[i].score+"\">"+
                        "</div>"+
                        "<label for=\"score"+i+"\" class=\"col-sm-2 col-form-label\">%</label>"+
                    "</div>";
                $('#display_score').append(html_pinalty);
            });
        }
    });
});

$(document).on('keyup','.num_valid',function(){
    var jthis = $(this)
    var val = jthis.val();
    var min  = parseInt(jthis.attr('min'));
    var max = parseInt(jthis.attr('max'));
    if(val > max){
        jthis.val(100);
    }else if(val < min){
        jthis.val(0);
    }
});

$(document).ready(function(){
    $('#form').validate({
        rules:{
            project_code:{
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
            project_code:{
                required:"Please Input Project Name"
            },
            start_date:{
                required:"Please Input Start Date"
            },
            finish_date:{
                required:"Please Input Finish Date"
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
            var percentage = $('input[name="percentage[]"]');
            fill_percent = 0;
            arr_percent_id = [];
            $.each(percentage,function(i,item){
                if($('#percentage'+i).val() != ""){
                    // arr_percent_id.push({'id':$('#id'+i).val(),'percent_pinalty':$('#percentage'+i).val()});
                    arr_percent_id.push({ percent_pinalty:$('#percentage'+i).val(), score:$('#score'+i).val()});
                    fill_percent++;
                }
            })
            if(percentage.length == fill_percent){
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:'/pinalty/update_pinalty/',
                    dataType:'JSON',
                    type:'POST',
                    processData:true,
                    async:false,
                    data:{
                        'id_header'             :   $('#id_header').val(),
                        'id_header_set_score'   :   $('#id_header_set_score').val(),
                        'percent_id'            :   arr_percent_id,
                        'start_date'            :   $('#start_date').val(),
                        'finish_date'           :   $('#finish_date').val()
                    },
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
            }else{
                alert('please input percent pinalty');
            }
        }
    });
});
</script>
@endsection