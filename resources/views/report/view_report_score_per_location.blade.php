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
                            <form method="post" id="form_evaluation" class="form-horizontal">
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
                            </form>
                            <table class="table table-score table-bordered table-striped" style="width:100%">
                                <thead>
                                    <th>Sub Area</th>
                                    <th>Week 1</th>
                                    <th>Week 2</th>
                                    <th>Week 3</th>
                                    <th>Week 4</th>
                                    <th>Week 5</th>
                                    <th>Week 6</th>
                                </thead>
                                <tbody>
                                    @foreach($service as $row)
                                    <tr data-service="{{ $row->service_code }}" class="{{ $row->service_code }}"><td class="bg-red" colspan="7">{{ $row->service_name }}</td><tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:'/getDataScorePerLocation',
        type:"POST",
        dataType:"JSON",
        data:{
            'project_code':$('#project_code').val(),
            'location_id':$('#location_name').val(),
            'month':$('#month_project').val(),
            'year':$('#year_project').val()
        },
        success:function(data){
            // $('.table > tbody').append('<tr><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td></tr>');
            // $('.table > tbody').append('<tr><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td><td>sdsadsa</td></tr>');
            
            // $.each(data,function(i,item){
                
            //     $('<tr><td>sadsadda</td></tr>').insertAfter($('.table > tbody > tr').attribute('data-service',data[i].service_code));
            // });
            $('.table-score tr[data-service]').each(function(i,item){
                var data_service = $(this).attr('data-service');
                // alert(data_service);
                $.each(data,function(a,item){
                    
                    if(data_service == data[a].service_code){
                        $('<tr><td>'+data[a].sub_area_name+'</td><td>'+parseFloat(data[a].score_week1)+'</td><td>'+parseFloat(data[a].score_week2)+'</td><td>'+parseFloat(data[a].score_week3)+'</td><td>'+parseFloat(data[a].score_week4)+'</td><td>'+parseFloat(data[a].score_week5)+'</td><td>'+parseFloat(data[a].score_week6)+'</td></tr>').insertAfter($('.table-score tr.'+data[a].service_code));
                        // $('<tr><td>'+data[a].sub_area_name+'</td></tr>').insertAfter($(this).attr('data-service'));
                        // alert(data[a].service_code);
                    }
                });
            });
        }
    });
    
});
</script>
@endsection