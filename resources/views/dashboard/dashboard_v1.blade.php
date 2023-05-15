@extends('layouts.main')
@section('container')
<style>
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Weekly</li>
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
                            <h3 class="card-title">Weekly</h3>
                        </div>
                        <form method="post" id="form_evaluation" class="form-horizontal">
                        <div class="card-body">
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
                                    <label for="yearProject" class="col-sm-2 col-form-label">Service</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="service" id="service">
                                            <option value="">ALL</option>
                                            @foreach($service as $row)
                                                <option value="{{ $row->service_code }}">{{ $row->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="yearProject" class="col-sm-2 col-form-label">Year</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="year_project" id="year_project"></select>
                                    </div>
                                </div>
                            
                            <div class="row justify-content-around">
                                <div class="card card-info card-outline col-5">
                                    <div class="card-header">
                                        <h5 class="card-title">Weekly</h5>
                                    </div>
                                    <div class="card-body">
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
                                        <div id="small-box-report" class="row"></div>
                                    </div>
                                </div>
                                <div class="card card-success card-outline col-5">
                                    <div class="card-header">
                                        <h3 class="card-title">Chart Satisfaction Per Year</h3>
                                    </div>
                                    <div class="card-body">
                                        <figure class="highcharts-figure">
                                            <div id="container"></div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card card-danger card-outline col-12">
                                        <div class="card-header">
                                            <h5 class="card-title">Summary</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped table-bordered" id="table-summary">
                                                <thead>
                                                    <tr>
                                                        <th>Lokasi</th>
                                                        <th>Jan</th>
                                                        <th>Feb</th>
                                                        <th>Mar</th>
                                                        <th>Apr</th>
                                                        <th>May</th>
                                                        <th>Jun</th>
                                                        <th>Jul</th>
                                                        <th>Aug</th>
                                                        <th>Sep</th>
                                                        <th>Oct</th>
                                                        <th>Nov</th>
                                                        <th>Dec</th>
                                                    </tr>
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
<div class="modal fade" id="modal-more_info">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Daily Appraisal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:scroll">
                <table class="display table table-bordered table-striped table-hover" id="table-appraisal" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Location Name</th>
                            <th>Area</th>
                            <th>Sub Area</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
<script src="/plugins/Highcharts-10.3.3/code/highcharts.js"></script>
<script src="/plugins/Highcharts-10.3.3/code/modules/exporting.js"></script>
<script src="/plugins/Highcharts-10.3.3/code/modules/export-data.js"></script>
<script src="/plugins/Highcharts-10.3.3/code/modules/accessibility.js"></script>
<script>
    var arr_month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
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
/*----------------------------------------------WEEKLY-------------------------------------------*/
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

$(document).on('change','#location_name,#project_code,#region_name',function(){
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
            'region_id':$('#region_name').val(),
            _token: '{{csrf_token()}}',
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

$(document).on('change','#year_project,#month_project,#location_name,#region_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/dashboard/getAppraisalWeekly",
        type:"POST",
        dataType:"JSON",
        data:{
            'month_project' : $('#month_project').val(),
            'year_project' : $('#year_project').val(),
            'project_code' : $('#project_code').val(),
            'location_id' : $('#location_name').val(),
            'region_id' : $('#region_name').val(),
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success: function(data){
            $('#small-box-report').empty();
            $.each(data,function(i,item){
                var substr_weekappraisal = String(data[i].week_appraisal).substring(4,6);
                var substr_yearappraisal = String(data[i].week_appraisal).substring(0,4);
                if(data[i].score == 100){
                    var kategori = "SB";
                }else if(data[i].score >= 95){
                    var kategori = "CB";
                }else if(data[i].score >= 89){
                    var kategori = "B";
                }else{
                    var kategori = "KB";
                }
                var cardbox = "<div class=\"card card-primary card-outline mr-2\">"+
                        "<div class=\"card-body\">"+
                            "<div class=\"text-center mb-n4\">"+
                                "<h5>"+substr_yearappraisal+" - WEEK "+substr_weekappraisal+"</h5>"+
                            "</div>"+
                            "<div class=\"text-center\">"+
                                "<h1 class=\"mb-n2\" style=\"font-size:75px;\">"+kategori+"</h1>"+
                                "<h4 class=\"mb-n2\">"+data[i].score+" %</h4>"+
                            "</div>"+
                        "</div>"+
                        "<div class=\"card-footer text-center\">"+
                            "<div class=\"icon\">"+
                                "<i class=\"ion ion-stats-bars\"></i>"+
                            "</div>"+
                            "<a href=\"#\" data-yearappraisal="+substr_yearappraisal+" data-weekappraisal="+substr_weekappraisal+" data-toggle=\"modal\" data-target=\"#modal-more_info\" class=\"data_daily\">More info <i class=\"fas fa-arrow-circle-right\"></i></a>"+
                            "</div>"+
                        "</div>";
                $('#small-box-report').append(cardbox);
            });
        }
    });
});

$(document).on('click','.data_daily',function(){
    var i = 1;
    $('#table-appraisal').DataTable({
        processing:true,
        serverSide:true,
        destroy: true,
        ajax:{
            headers:{
                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
            },
            url:'/dailyAppraisalPerWeek',
            type:"POST",
            data:{
                'location_id':$('#location_name').val(),
                'year_project':$(this).attr('data-yearappraisal'),
                'week_project':$(this).attr('data-weekappraisal'),
                'project_code':$('#project_code').val(),
                _token: '{{csrf_token()}}',
            },
        },
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            {data:'appraisal_date', name:'appraisal_date'},
            {data:'location_name', name:'location_name'},
            {data:'area_name', name:'area_name'},
            {data:'sub_area_name', name:'sub_area_name'},
            {data:'score', name:'score'},
        ]
    });
});

/*-------------------------------------------------CHART SATISFACTION-------------------------------------------*/

$(document).on('change','#year_project,#month_project,#location_name,#region_name',function(){
    $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/getDataEvaluationProjectMonthlyPerYear",
                type:"POST", 
                dataType:"JSON",
                data:{
                    project_code:$('#project_code').val(),
                    region_id : $('#region_name').val(),
                    location_id:$('#location_name').val(),
                    year:$('#year_project').val(),
                    _token: '{{csrf_token()}}',
                },
                processData:true,
                success:function(data){
                    var project_code = $('select[name="project_code"]:selected').select2('data');
                    var get_location = $('#location_name option:selected').val() == "" ? "ALL Location (Periode "+$("#year_project").val()+")" : $('#location_name option:selected').text();
                    var get_region = $('#region_name option:selected').val() == "" ? "ALL Region" : $('#region_name option:selected').text();
                    chart = Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: $('#project_code option:selected').text(),
                        },
                        subtitle: {
                            useHTML:true,
                            text: "<table><tr><td><strong>Region</strong></td><td>:</td><td><strong>"+get_region+"</strong></td></tr><tr><td>Location</td><td>:</td><td>"+get_location+"</td></tr></table>"
                        },
                        xAxis:{ 
                            categories: arr_month,
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            max:100,
                            tickInterval:10,
                            title: {
                                text: 'Score(%)'
                            }
                        },
                        series: []
                    });
                    
                    var service_name = ['service_name'];
                    var groupByService = groupBy(data,'service_name',service_name,'service_name');
                    var month = ['MONTH'];
                    var groupByMonth = groupBy(data,'MONTH',month,'MONTH');
                    // var series = [];
                    
                    $.each(groupByService,function(i,item){
                        var arr_score = []; 
                        $.each(arr_month,function(a,item){
                            var value_month = [];
                            $.each(groupByMonth,function(b,item){
                                value_month.push(groupByMonth[b].MONTH);
                            });
                            if(value_month.includes(arr_month[a])){
                                var filterGroupServiceData = data.filter((data_group)=>data_group.service_name == groupByService[i].service_name && data_group.MONTH.includes(arr_month[a])==true);
                                arr_score.push(parseFloat(filterGroupServiceData[0].score));
                            }else{
                                arr_score.push(0);
                            }
                        });
                        chart.addSeries({name:groupByService[i].service_name,data:arr_score});
                    });


                    var scoreMonthAllService = [];
                    var value_month = [];
                    $.each(groupByMonth,function(b,item){
                            value_month.push(groupByMonth[b].MONTH);
                    });
                    $.each(arr_month,function(z,item){
                        if(value_month.includes(arr_month[z])){
                                var filterMonthly = data.filter((dataMonth)=>dataMonth.MONTH == arr_month[z]);
                                var scoreMonthPerService = 0;
                                $.each(filterMonthly,function(c,item){
                                    scoreMonthPerService += parseFloat(filterMonthly[c].score)
                                });
                                const avgScore = scoreMonthPerService / filterMonthly.length;
                                scoreMonthAllService.push(parseFloat(avgScore));
                        }else{
                            scoreMonthAllService.push(0);
                        }
                    });
                    chart.addSeries({ name:'Average All Service',data:scoreMonthAllService });
                }
            });
});

/*---------------------------------------------Summary-----------------------------------------*/

$(document).on('change','#project_code,#region_name,#location_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/getFilterLocation",
        type:"POST", 
        dataType:"JSON",
        data:{
            project_code:$('#project_code').val(),
            region_id:$('#region_name').val(),
            location_id:$('#location_name').val(),
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success:function(getLocation){
            var table = "";
            // $('table#table-summary > tbody').append('<tr><td>HAHAHAHAH</td></tr>');
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:"/getDataSummaryMonthlyPerLocation",
                type:"POST",
                dataType:"JSON",
                data:{
                    project_code:$('#project_code').val(),
                    region_id:$('#region_name').val(),
                    location_id:$('#location_name').val(),
                    year:$('#year_project').val(),
                    _token: '{{csrf_token()}}',
                },
                success:function(dataSummaryLocation){
                    $('table#table-summary > tbody').empty();
                    $.each(getLocation,function(i,item){
                        var mapSummaryLocation = dataSummaryLocation.filter((data_location)=>data_location.location_id == getLocation[i].location_id);
                        var arrSummaryPerLocation = [];
                        var html_td ="";
                        var a = 0;
                        $.each(mapSummaryLocation,function(a,item){
                            arrSummaryPerLocation.push({location_id:mapSummaryLocation[a].location_id,Jan:mapSummaryLocation[a].Jan,Feb:mapSummaryLocation[a].Feb,Mar:mapSummaryLocation[a].Mar,Apr:mapSummaryLocation[a].Apr,May:mapSummaryLocation[a].May,Jun:mapSummaryLocation[a].Jun,Jul:mapSummaryLocation[a].Jul,Aug:mapSummaryLocation[a].Aug,Sep:mapSummaryLocation[a].Sep,Oct:mapSummaryLocation[a].Oct,Nov:mapSummaryLocation[a].Nov,Dec:mapSummaryLocation[a].Dec});

                        });
                         console.log(arrSummaryPerLocation.some(item=>item.location_id == getLocation[i].location_id));
                        if(arrSummaryPerLocation.some(item=>item.location_id == getLocation[i].location_id)===true){
                            table="<tr><td>"+getLocation[i].location_name+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Jan)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Feb)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Mar)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Apr)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].May)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Jun)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Jul)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Aug)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Sep)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Oct)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Nov)+"</td><td>"+parseFloat(arrSummaryPerLocation[a].Dec)+"</td></tr>";
                            a++;
                        }else{
                            table="<tr><td>"+getLocation[i].location_name+"</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
                        }
                        $('table#table-summary > tbody').append(table);
                    });
                }
            });
            
        }
    });
});
</script>
@endsection