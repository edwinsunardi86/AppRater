@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Weekly</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
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
                            <h3 class="card-title">Report Project Per Client</h3>
                        </div>
                        <form method="post" id="form_evaluation" class="form-horizontal">
                        <div class="card-body">
                            <figure class="highcharts-figure">
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
                                <div id="container0"></div>
                                <div id="container1"></div>
                            </figure>
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



    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/report/getDataProjectCurrentEvaluation",
        type:"POST", 
        dataType:"JSON",
        data:{
            client_id:$('#client_id').val(),
            project_code:$('#project_code').val(),
        },
        processData:true,
        success:function(data){
            var location_name = ['location_name'];
            var per_location = groupBy(data,'location_id',location_name,'location_name');
            $.each(per_location,function(i,item){
                var seriesOptions = [];
                var filter_location = data.filter((location)=>(location.location_id == per_location[i].location_id));
                console.log(filter_location);
                var arr_month = [];
                $.each(filter_location,function(a,item){ 
                    arr_month.push(filter_location[a].MONTH);
                });
                //console.log(arr_month);
                chart = Highcharts.chart('container'+i, {
                    chart: {
                        type: 'column'
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: $('#project_code').val(),
                    },
                    subtitle: {
                        text: filter_location[i].location_name
                    },
                    xAxis:{ categories:arr_month },
                    series: []
                });
                // console.log(filter_location);
                var service_name = ['service_name'];
                var per_service = groupBy(filter_location,'service_code',service_name,'service_name');
                //console.log(per_service);
                var arr_service = [];
                $.each(per_service,function(a,item){
                    arr_service.push({service_code:per_service[a].service_code,service_name:per_service[a].service_name});
                });
                //alert(arr_service.length);
                for(var z = 0;z < arr_service.length; z++){
                    var filterLocationPerService = data.filter((location)=>(location.service_code == arr_service[z]['service_code'] && location.location_id == per_location[i].location_id));
                    //console.log(filterLocationPerService);
                    var arr_score = [];
                    $.each(filterLocationPerService,function(b,item){
                    
                        if(filterLocationPerService[b].service_code == arr_service[z].service_code){                            
                            arr_score.push(parseInt(filterLocationPerService[b].score));
                        }
                    });
                    chart.addSeries({name:arr_service[z].service_code, data:arr_score });
                    // alert(arr_score);
                }
            });
            
        }
    });
});

</script>
@endsection