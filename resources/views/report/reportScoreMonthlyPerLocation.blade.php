@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Score Per Location</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item active">Score Per Location</li>
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
                            <h3 class="card-title">Report Score Per Location</h3>
                        </div>
                        
                        <div class="card-body">
                            <form method="post" id="convert_to_pdf" class="form-horizontal">
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
                                    <label for="projectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <select name="project_code" id="project_code" class="form-control select2"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regionName" class="col-sm-2 col-form-label">Region</label>
                                    <div class="col-sm-4">
                                        <select name="region_name" id="region_name" class="form-control select2"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="locationName" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-4">
                                        <select name="location_name" id="location_name" class="form-control select2"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="locationName" class="col-sm-2 col-form-label">Bulan-Tahun</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="month_project" id="month_project">
                                            <option value="">Pilih</option>
                                            <option value="Jan">January</option>
                                            <option value="Feb">February</option>
                                            <option value="Mar">March</option>
                                            <option value="Apr">April</option>
                                            <option value="May">Mei</option>
                                            <option value="Jun">June</option>
                                            <option value="Jul">July</option>
                                            <option value="Aug">August</option>
                                            <option value="Sep">September</option>
                                            <option value="Oct">October</option>
                                            <option value="Nov">November</option>
                                            <option value="Dec">December</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="year_project" id="year_project"></select>
                                    </div>
                                </div>
                                <table class="table table-score table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <th>Sub Area</th>
                                        <th>Score (%)</th>
                                        <th>Summary</th>
                                    </thead>
                                    <tbody>
                                        @foreach($service as $row)
                                        <tr data-service="{{ $row->service_code }}" class="{{ $row->service_code }}"><td class="bg-red">{{ $row->service_name }}</td><td class="bg-red"><div id="percentage_{{ $row->service_code }}"></div></td><td class="bg-red"><div id="summary_{{ $row->service_code }}"></div></td><tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        @if(Auth::user()->role == 3)
                                            <button type="button" class="btn btn-block btn-outline-primary btn-sm" id="modal_approval" data-toggle='modal' data-target="#modal_sign">Sign</button>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-block btn-outline-warning btn-sm">Download</button>
                                    </div>
                                </div>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal_sign">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="sign_report" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow:scroll">
                    <h2>Warning</h2>
                    <p>Do you want approve sign this report?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Approve</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$( "li.item-a" )
  .closest( "ul" )
  .css( "background-color", "red" );
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

$(document).on('change','#project_code',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/getDataRegionToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "project_code":$('#project_code').val(),
        },
        processData:true,
        success:function(data){
            $('.table_add_location > tbody').empty();
            $('select#region_name option').remove();
            $('select#region_name').append($('<option>',{
                    text:"Choice Region",
                    value:""
                }));
            $.each(data,function(i,item){
                $('select#region_name').append($('<option>',{
                    text:data[i].region_name,
                    value:data[i].id
                }));
            });
        }
    });
});

$(document).on('change','#region_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/location/getDataLocationToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            region_id:$('#region_name').val(),
        },
        processData:true,
        success: function(data){
            $('.tb_sub_area > tbody').empty();
            $('select#location_name option').remove();
            $('select#location_name').append($('<option>',{
                text:"Choice Location",
                value:""
            }));
            $.each(data,function(i,item){
                $('select#location_name').append($('<option>',{
                    text:data[i].location_name,
                    value:data[i].id
                }));
            });
        }
    });
});

$(document).on('change','#location_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/evaluation/getYearEvaluationProjectPerLocation",
        type:"POST",
        dataType:"JSON",
        data:{
            'project_code':$('#project_code').val(),
            'location_id':$('#location_name').val(),
        },
        processData:true,
        success: function(data){
            $('#year_project option').remove();
            $('#year_project').append($('<option>',{
                    value:"",
                    text:"Choice year project"
                }));
            $.each(data,function(i,item){
                $('#year_project').append($('<option>',{
                    value:data[i].year_project,
                    text:data[i].year_project
                }));
            });
        }
    });
});

$(document).on('change','#year_project,#month_project',function(){
    function summary(score){
    let summary;
    if(score == 100){
        summary = "SB";
    }else if(score >= 95){
        summary = "CB";
    }else if(score >= 89){
        summary = "B";
    }else{
        summary = "KB";
    }
    return summary;
}
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/getDataScoreMonthlyComponent',
        type:"POST",
        dataType:"JSON",
        data:{
            'project_code':$('#project_code').val(),
            'location_id':$('#location_name').val(),
            'month':$('#month_project').val(),
            'year':$('#year_project').val()
        },
        success:function(data){
            $('.tr_score').remove();
            $('.table-score tr[data-service]').each(function(i,item){
                var data_service = $(this).attr('data-service');
                var average_per_service = 0;
                var b = 0;
                $.each(data,function(a,item){
                    if(data_service == data[a].service_code){
                        average_per_service = parseFloat(average_per_service) + parseFloat(data[a].score);
                        $('<tr class="tr_score"><td>'+data[a].sub_area_name+'</td><td>'+parseFloat(data[a].score)+'</td><td>'+summary(parseFloat(data[a].score))+'</td></tr>').insertAfter($('.table-score tr.'+data[a].service_code));
                        b+=1;
                    }
                });
                // var service_code = $(this)[i];
                @foreach($service as $row)
                var service_code = "{{ $row->service_code }}";
                // alert(service_code);
                if(data_service == service_code){
                    var avg_per_service = average_per_service / b;
                    $('#percentage_'+service_code).html(avg_per_service);
                    $('#summary_'+service_code).html(summary(avg_per_service));
                    // alert(avg_per_service);
                }
                
                @endforeach
                
                // alert(avg_per_service);

                // $("#percentage_"+service_code).html(avg_per_service);
            });
        }
    });
});
$(document).ready(function(){
    $('#convert_to_pdf').validate({
    rules:{
        location_name:{
            required:true
        },
        month_project:{
            required:true
        },
        year_project:{
            required:true
        }
    },
    messages:{
        location_name:{
            required:"Please choice location name"
        },
        month_project:{
            required: "Please choice month"
        },
        year_project:{
            required:"Please choice year"
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
                window.open('/downloadPDFReportScorePerLocation/'+$('#project_code').val()+'/'+$('#location_name').val()+'/'+$('#month_project').val()+'/'+$('#year_project').val());
        }
    });
});

@if(Auth::user()->role == 3)
    $(document).on('click','#modal_approval',function(){
        var project_code = $('#project_code').val();
        var location_id = $('#location_name').val();
        var month_project = $('#month_project').val();
        var year_project = $('#year_project').val();
        if(location_id == "" || month_project == "" || year_project == ""){
            Swal.fire({
                icon:'error',
                title:'Warning',
                text:'Please complete filter report',
            });
        }else{
            $('#sign_report').submit(function(e){
                e.preventDefault();
                $.ajax({
                    headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:'/report/approvalByClient',
                    dataType:'JSON',
                    type:'POST',
                    data:{
                        'location_id':location_id,
                        'month': month_project,
                        'year': year_project,
                        'project_code':project_code
                    },
                    processData:true,
                    success:function(data){
                        Swal.fire({
                            title:data.title,
                            html:data.message,
                            icon:data.icon
                        });
                    }
                });
            });
        }
    });

@else
        
@endif


</script>
@endsection