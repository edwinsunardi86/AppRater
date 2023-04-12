@extends('layouts.main')
@section('container')
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
                            <h3 class="card-title">Dashboard</h3>
                        </div>
                        <form method="post" id="form_evaluation" class="form-horizontal">
                        <div class="card-body">
                            @if(Auth::user()->role == 1)
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
                                <div class="col-sm-2">
                                    <select class="form-control" name="year_project" id="year_project"></select>
                                </div>
                            </div>
                            <div id="small-box-report" class="row"></div>
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
                <table class="display table table-bordered table-striped table-hover" id="table-appraisal">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
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
<script>
@if(Auth::user()->role == 1)
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
    // alert(project_code);
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
                text:"Choice Region"
            }));
            $.each(region,function(i,item){
                $('#region_name').append($('<option>',{
                    value:region[i].region_id,
                    text:region[i].region_name
                }));
            });

            $(document).on('change','#region_name',function(location){
                var location_name = ['location_name'];
                var filter_location = data.filter(region => region.region_id == $('#region_name').val());
                var location = groupBy(filter_location,'location_id',location_name,'location_name');
                $('#location_name').append($('<option>',{
                    value:"",
                    text:"Choice Location"
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

                var cardbox =   "<div class=\"card card-primary card-outline mr-2\">"+
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
                                    "</div>"
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
                'week_project':$(this).attr('data-weekappraisal')
            },
        },
        columns:[
            {data:'', name:'', render:function(row, type, set){
                return i++;
            }},
            {data:'appraisal_date', name:'appraisal_date'},
            {data:'area_name', name:'area_name'},
            {data:'sub_area_name', name:'sub_area_name'},
            {data:'score', name:'score'},
        ]
    });
});
    
    
</script>
@endsection