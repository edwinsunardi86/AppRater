@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chart Progress Input SLA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Chart</a></li>
                    <li class="breadcrumb-item active">Progress Input SLA</li>
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
                            <h3 class="card-title">Log Sign Report</h3>
                        </div>
                        <div class="card-body">
                            <form id="form" class="form-horizontal">
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
                                        <select name="project_code" id="project_code" class="form-control select2 col-sm-4">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="locationName" class="col-sm-2 col-form-label">Bulan</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="month_project" id="month_project">
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    {{-- <div class="col-sm-2">
                                        <select class="form-control" name="year_project" id="year_project"></select>
                                    </div> --}}
                                </div>
                                <div class="form-group row">
                                    <label for="yearProject" class="col-sm-2 col-form-lable">Year</label>
                                    <div class="col-sm-2">
                                        <select name="year_project" id="year_project" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <button type="submit" class="btn btn-md btn-primary">Export</button>
                                </div>
                            </form>
                            <div class="col-12 col-sm-12">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="progress_input_sla-tab" data-toggle="pill" href="#content_progress_input_sla">Progress Input SLA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="existing_sign_sla-tab" data-toggle="pill" href="#content_existing_sign_sla">Sign SLA</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="content_report">
                                    <div class="tab-pane fade show active" id="content_progress_input_sla" role="tabpanel" aria-labelledby="progress_input_sla-tab">
                                        <div id="container" class="m-3"></div>
                                        <table id="table-summary" class="table table-striped table-bordered" style="width:50%">
                                            <thead>
                                                <th>Location Name</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Aug</th>
                                                <th>Sept</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="content_existing_sign_sla" role="tabpanel" aria-labelledby="existing_sign_sla-tab">
                                        
                                            <p>[C] : Cleaning Service</p>
                                            <p>[L] : Labour Service</p>
                                            <p>[S] : Security Service</p>
                                            <p>(Service yang sudah ditandatangani)/(Kelengkapan service yang harus ditandatangani)</p>
                                        <div class="table-responsive mt-3">
                                            <table id="table-summary-sign" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <th>Location Name</th>
                                                    <th>Jan</th>
                                                    <th>Feb</th>
                                                    <th>Mar</th>
                                                    <th>Apr</th>
                                                    <th>May</th>
                                                    <th>Jun</th>
                                                    <th>Jul</th>
                                                    <th>Aug</th>
                                                    <th>Sept</th>
                                                    <th>Oct</th>
                                                    <th>Nov</th>
                                                    <th>Dec</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>    
                            </div>
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
            <div class="modal-body" style="overflow:auto">
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
<script src="/plugins/Highcharts-10.3.3/code/highcharts.js"></script>
<script src="/plugins/Highcharts-10.3.3/code/modules/exporting.js"></script>
<script src="/plugins/Highcharts-10.3.3/code/modules/export-data.js"></script>
<script src="/plugins/Highcharts-10.3.3/code/modules/accessibility.js"></script>
<script>
function getMonthName(monthNumber) {
  const date = new Date();
  date.setMonth(monthNumber - 1);

  return date.toLocaleString('en-US', { month: 'long' });
}

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
            $('select#year_project option').remove();
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
    $(document).on('change','#project_code',function(){
        $.ajax({
            headers:{
                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
            },
            url:'/getInputRatePeriodYearPerProject',
            dataType:'JSON',
            type:'POST',
            processData:true,
            data:{
                'project_code':$('#project_code').val(),
                _token: '{{csrf_token()}}'
            },
            success:function(data){
                $('select#year_project option').remove();
                $('select#year_project').append($('<option>',{
                        text:"Pilih",
                        value:""
                    }));
                $.each(data,function(i,item){
                    $('select#year_project').append($('<option>',{
                        text:data[i].period,
                        value:data[i].period
                    }));
                });
                
            }
        });
    });

    $(document).on('change','#year_project,#month_project',function(){
        if($('#year_project').val() != ""){
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content'),
                },
                // url:'/getInputRateMonthlyPerLocation',
                url:'/getInputrateMonthlyPercentageByMonth',
                dataType:'JSON',
                type:'POST',
                processData:true,
                data:{
                    'project_code':$('#project_code').val(),
                    'month_project':$('#month_project').val(),
                    'year_project':$('#year_project').val(),
                    _token: '{{csrf_token()}}'
                },
                success:function(data){
                    // Data retrieved from https://netmarketshare.com
                    var chart = Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Progress Input SLA '+getMonthName($('#month_project').val())+' '+$('#year_project').val(),
                            align: 'left'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: [{
                            name: 'DONE ('+data.qty_done+')',
                            y: parseInt(data.percentage_done),
                            sliced: true,
                            selected: true
                        }, {
                            name: 'NOT YET ('+data.qty_not_yet+')',
                            y: parseInt(data.percentage_not_yet)
                        }]}]
                    });
                }
            });
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content'),
                },
                url:'/getInputRateMonthlyPerLocation',
                dataType:'JSON',
                type:'POST',
                processData:true,
                data:{
                    'project_code':$('#project_code').val(),
                    'year_project':$('#year_project').val(),
                    _token: '{{csrf_token()}}'
                },
                success:function(data){
                    $('#table-summary tbody').empty();
                    $.each(data,function(i,item){
                        var row = "<tr><td>"+data[i].location_name+"</td><td>"+data[i].Jan+"</td><td>"+data[i].Feb+"</td><td>"+data[i].Mar+"</td><td>"+data[i].Apr+"</td><td>"+data[i].May+"</td><td>"+data[i].Jun+"</td><td>"+data[i].Jul+"</td><td>"+data[i].Aug+"</td><td>"+data[i].Sep+"</td><td>"+data[i].Oct+"</td><td>"+data[i].Nov+"</td><td>"+data[i].Dec+"</td></tr>";
                        $("#table-summary > tbody").append(row);

                    });
                }
            });

            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content'),
                },
                url:'/report/getSignReportPeriodYearOfProject',
                dataType:'JSON',
                type:'POST',
                processData:true,
                data:{
                    'project_code':$('#project_code').val(),
                    'year_project':$('#year_project').val(),
                    _token: '{{csrf_token()}}'
                },
                success:function(data){
                    $('#table-summary-sign tbody').empty();
                    $.each(data,function(i,item){
                        var row = "<tr><td>"+data[i].location_name+"</td><td>"+data[i].Jan.replace(/,/g," ")+" / "+data[i].service_jan.replace(/,/g," ")+"</td><td>"+data[i].Feb.replace(/,/g," ")+" / "+data[i].service_feb.replace(/,/g," ")+"</td><td>"+data[i].Mar.replace(/,/g," ")+" / "+data[i].service_mar.replace(/,/g," ")+"</td><td>"+data[i].Apr.replace(/,/g," ")+" / "+data[i].service_apr.replace(/,/g," ")+"</td><td>"+data[i].May.replace(/,/g," ")+" / "+data[i].service_may.replace(/,/g," ")+"</td><td>"+data[i].Jun.replace(/,/g," ")+" / "+data[i].service_jun.replace(/,/g," ")+"</td><td>"+data[i].Jul.replace(/,/g," ")+" / "+data[i].service_jul.replace(/,/g," ")+"</td><td>"+data[i].Aug.replace(/,/g," ")+" / "+data[i].service_aug.replace(/,/g," ")+"</td><td>"+data[i].Sep.replace(/,/g," ")+" / "+data[i].service_sep.replace(/,/g," ")+"</td><td>"+data[i].Oct.replace(/,/g," ")+" / "+data[i].service_oct.replace(/,/g," ")+"</td><td>"+data[i].Nov.replace(/,/g," ")+" / "+data[i].service_nov.replace(/,/g," ")+"</td><td>"+data[i].Dec.replace(/,/g," ")+" / "+data[i].service_dec.replace(/,/g," ")+"</td></tr>";
                        $("#table-summary-sign > tbody").append(row);

                    });
                }
            });
        }
    });
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

    $('#form').validate({
        rules:{
            project_code:{
                required:true
            },
            year_project:{
                required:true
            }
        },
        messages:{
            project_code:{
                required:"Please input project name"
            },
            year_project:{
                required:"Please input Year Rate SLA"
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
                url:'/report/exportProgressInputRateArea',
                type:'post',
                processData:true,
                data:{
                    'project_code':$('#project_code').val(),
                    'year_project':$('#year_project').val(),
                    _token: '{{csrf_token()}}'
                },
                xhrFields:{
                    responseType:'arraybuffer'
                },
                error: function(blob){
                    console.log(blob);
                }
            }).done(function (data, status, xmlHeaderRequest) {
                    var downloadLink = document.createElement('a');
                    var blob = new Blob([data],
                        {
                            type: xmlHeaderRequest.getResponseHeader('Content-Type')
                        });
                    var url = window.URL || window.webkitURL;
                    var downloadUrl = url.createObjectURL(blob);
                    var fileName = '';

                  

                    if (typeof window.navigator.msSaveBlob !== 'undefined') {
                        window.navigator.msSaveBlob(blob, fileName);
                    } else {
                        if (fileName) {
                            if (typeof downloadLink.download === 'undefined') {
                                window.location = downloadUrl;
                            } else {
                                downloadLink.href = downloadUrl;
                                downloadLink.download = fileName;
                                document.body.appendChild(downloadLink);
                                downloadLink.click();
                            }
                        } else {
                            window.location = downloadUrl;
                        }

                        setTimeout(function () {
                            url.revokeObjectURL(downloadUrl);
                        },
                    100);
                }
            });
        }
    });
});
</script>
@endsection