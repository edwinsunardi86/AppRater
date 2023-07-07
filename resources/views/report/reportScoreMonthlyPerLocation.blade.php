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
                                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
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
                                @endif
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
                                    <label for="recommend_critics" class="col-sm-2 col-form-label">Score</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="avg" id="avg" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row p-10 col-sm-4">
                                    <canvas id="signature-pad" class="signature-pad">
                                        Your browser does not support the HTML canvas tag.
                                    </canvas>
                                </div>
                                <div class="row p-3 inline col-sm-4">
                                    <div class="col col-sm justify-content-md-center pt-3">
                                        <!-- tombol undo  -->
                                        <center><button type="button" class="btn btn-dark" id="undo">
                                            <span class="fas fa-undo"></span>
                                            Undo
                                        </button>
                                        </center>
                                    </div>
                                    <div class="col col-sm justify-content-md-center pt-3">
                                        <!-- tombol hapus tanda tangan  -->
                                      <center><button type="button" class="btn btn-danger" id="clear">
                                        <span class="fas fa-eraser"></span>
                                        Clear
                                        </button></center>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block btn-outline-warning btn-sm">Download</button>
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
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
$('#startDateFormat').datetimepicker({
        format: 'L'
});
$('#finishDateFormat').datetimepicker({
        format: 'L'
});
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

@if(Auth::user()->role == 1)
$(document).ready(function(){
    var i = 1;
    var tb_client = $('#table_client').DataTable({
    processing:true,
    serverSide:true,
    destroy: true,
    ajax:'{!! route("data_client_to_selected:dt") !!}',
    columns:[
        { data:i, name: i, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
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

$(document).ready(function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/getDataRegionToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "project_code":$('#project_code').val(),
            _token: '{{csrf_token()}}',
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
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success:function(data){
            $('.table_add_location > tbody').empty();
            $('select#region_name option').remove();
            $('select#region_name').append($('<option>',{
                    text:"ALL Region",
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
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success: function(data){
            $('.tb_sub_area > tbody').empty();
            $('select#location_name option').remove();
            $('select#location_name').append($('<option>',{
                text:"ALL Location",
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

@endif

@if(Auth::user()->role==3)
function groupBy(list, group, key, value) {
    return Array.from(list
        .reduce(
            (map, object) => map.set(object[group], Object.assign(
                map.get(object[group]) || { [group]: object[group] },
                { [key]: object[value] }
            )), new Map
        )
        .values()
    );
}
function regionProject(project_code){
    var project_code = $('#project_code').val()
    return project_code;
}


$(document).ready(function(){
    $('#project_code').append($('<option>',{
                value:"",
                text:"Choice Project"
    }));
    
    $.get('/getUserAccessAuthority',function(data){
        var project_name = ['project_name'];
        var project = groupBy(data,'project_code',project_name,'project_name');
        $.each(project,function(i,item){
            $('#project_code').append($('<option>',{
                value:project[i].project_code,
                text:project[i].project_name
            }));
        });
        $(document).on('change','#project_code',function(){
            var region_name = ['region_name'];
            var filter_region = data.filter(project => project.project_code == $('#project_code').val());
            var region  = groupBy(filter_region,'region_id',region_name,'region_name');
            $('#region_name').append($('<option>',{
                value:"",
                text:"ALL"
            }));
            $.each(region,function(i,item){
                $('#region_name').append($('<option>',{
                    value:region[i].region_id,
                    text:region[i].region_name
                }));
            });

            $(document).on('change','#region_name',function(location){
                $('#location_name').empty();
                var location_name = ['location_name'];
                var filter_location = data.filter(region => region.region_id == $('#region_name').val());
                var location = groupBy(filter_location,'location_id',location_name,'location_name');
                $('#location_name').append($('<option>',{
                    value:"",
                    text:"ALL"
                }));
                
                $.each(location, function(i,item){
                    $('#location_name').append($('<option>',{
                        value:location[i].location_id,
                        text:location[i].location_name
                    }));
                });
            });
        });
    });
});
@endif

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
            _token: '{{csrf_token()}}'
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
        var category;
        $.ajax({
            headers:{
                'X_CSRF-TOKEN': $('meta[name=csrf_token]').attr('content'),
            },
            url:'/report/getCategory',
            type:"POST",
            dataType:"JSON",
            async:false,
            data:{
                project_code:   $('#project_code').val(),
                bulan:          $('#month_project').val(),
                tahun:          $('#year_project').val(),
                score:          score,
                _token:'{{csrf_token()}}'
            },
            success:function(data){
                category = data.initial
            }
        });
        return category;
    }

    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/getDataScoreMonthlyPerLocation',
        type:"POST",
        dataType:"JSON",
        data:{
            'project_code':$('#project_code').val(),
            'location_id':$('#location_name').val(),
            'month':$('#month_project').val(),
            'year':$('#year_project').val(),
            _token: '{{csrf_token()}}'
        },
        success:function(data){
            $('.tr_score').remove();
            $('.table-score tr[data-service]').each(function(i,item){
                var data_service = $(this).attr('data-service');
                var average_per_service = 0;
                var b = 0;
                $.each(data.data_score,function(a,item){
                    if(data_service == data.data_score[a].service_code){
                        average_per_service = parseFloat(average_per_service) + parseFloat(data.data_score[a].score);
                        $('<tr class="tr_score"><td>'+data.data_score[a].sub_area_name+'</td><td>'+parseFloat(data.data_score[a].score)+'</td><td>'+data.data_score[a].initial+'</td></tr>').insertAfter($('.table-score tr.'+data.data_score[a].service_code));
                        b+=1;
                    }
                });
                // var service_code = $(this)[i];
                @foreach($service as $row)
                var service_code = "{{ $row->service_code }}";
                // alert(service_code);
                if(data_service == service_code){
                    var avg_per_service = average_per_service / b;
                    $('#percentage_'+service_code).html(avg_per_service.toFixed(2));
                    $('#summary_'+service_code).html(summary(avg_per_service));
                    // alert(avg_per_service);
                }
                
                @endforeach
                
                // alert(avg_per_service);

                // $("#percentage_"+service_code).html(avg_per_service);
            });
            var avg_score = data.avg.score
            $('#avg').val(parseFloat(avg_score).toFixed(2));
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
            var location_id = $('#location_name option:selected').val();
            var project_code = $('#project_code option:selected').val();
            var month = $('#month_project').val();
            var year = $('#year_project').val();
                // window.open('/downloadPDFReportScorePerLocation/'+$('#project_code').val()+'/'+$('#location_name').val()+'/'+$('#month_project').val()+'/'+$('#year_project').val());
                var signature = signaturePad.toDataURL();
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:'/report/approvalSignReportScoreMonthly',
                    type:'POST',
                    data:{
                        'signature'     :   signature,
                        'location_id'   :   location_id,
                        'project_code'  :   project_code,
                        'month'         :   month,
                        'year'          :   year,
                        _token: '{{csrf_token()}}'
                    },
                    processData:true,
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(response){
                        var blob = new Blob([response]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "ReportScoreMonthly"+project_code+location_id+month+year+".pdf";
                        link.click();
                    },
                    error: function(blob){
                        console.log(blob);
                    }
                });
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
                        'project_code':project_code,
                        _token: '{{csrf_token()}}'
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

document.addEventListener('DOMContentLoaded', function () {
                resizeCanvas();
            })
    
            //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 0.5, 0.5);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }
    
    
            var canvas = document.getElementById('signature-pad');
    
            //warna dasar signaturepad
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
    
            //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
            document.getElementById('clear').addEventListener('click', function () {
                signaturePad.clear();
            });
    
            //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
            document.getElementById('undo').addEventListener('click', function () {
                var data = signaturePad.toData();
      if (data) {
    data.pop(); // remove the last dot or line
    signaturePad.fromData(data);
    }
});
$(document).ready(function(){
    $('#form_signature').submit(function(e){
        e.preventDefault();
        var signature = signaturePad.toDataURL();
        
    });
});
</script>
@endsection