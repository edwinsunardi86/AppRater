@extends('layouts.main')
@section('container')
<style>

</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Template Area</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Template</a></li>
                    <li class="breadcrumb-item active">Area</li>
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
                            <h3 class="card-title">Template Area</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="form_template" class="form-horizontal">
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
                                <div class="form-group row">
                                    <label for="projectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <select name="project_code" id="project_code" class="form-control select2 col-sm-4">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="StartDate" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-2 input-group date" id="startDateFormat" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="Start Date" name="Start Date" data-target="#startDateFormat"/>
                                        <div class="input-group-append" data-target="#startDateFormat" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <label for="StartDate" class="col-sm-2 col-form-label">Finish Date</label>
                                    <div class="col-sm-2 input-group date" id="finishDateFormat" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="Finish Date" name="Finish Date" data-target="#finishDateFormat"/>
                                        <div class="input-group-append" data-target="#finishDateFormat" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regionName" class="col-sm-2 col-form-label">Region</label>
                                    <div class="col-sm-4">
                                        <select name="region_name" id="region_name" class="form-control select2 col-sm-4"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="locationName" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-4">
                                        <select name="location_name" id="location_name" class="form-control select2 col-sm-4"></select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-md btn_add_area">Add Area</button>
                                <div class="add_area">
                                    <hr/>
                                    <div class="form-group row">
                                        <label for="AreaName1" class="col-sm-2 col-form-label">Area Name 1</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="AreaName[]" id="AreaName1" class="form-control form-control-sm"/>
                                        </div>
                                    </div>
                                    <button type="button" class="btn bg-purple btn-sm mb-2" id="add_sub_area1" data-iterate_sub_area="1">Add Sub Area</button>
                                    <div class="row">
                                        <table class="table table-striped table-bordered" id="area1Table_sub_area" data-iterate-table_sub_area="1" style="width:50%">
                                            <thead>
                                                <th>Sub Area Name</th>
                                                <th>Action</th>
                                            </thead>
                                            <tr>
                                                <td><input type="text" class="form-control form-control-sm" name="Area1subAreaName1[]" id="Area1subAreaName1"></td>
                                                <td></td>
                                            </tr>
                                        </table>
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

$(document).on('change','#project_code',function(){
    arr_choice = [];
    //Get Setting Score
    $.ajax({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content'), 
        },
        url : '/evaluation/setScoreCurrentActiveScoreInEvaluation',
        type:"POST",
        dataType:"JSON",
        async:false,
         data:{
            'project_code' : $('#project_code').val()
        },
        processData:true,
        success:function(data_choice){
            $.each(data_choice,function(i,item){
                arr_choice.push({'category':data_choice[i].category,'initial': data_choice[i].initial,'score': data_choice[i].score});
            });
            console.log(arr_choice);
        }
    });
    var category_desc = "";
    $.each(arr_choice,function(i,item){
        category_desc += arr_choice[i].category+" ("+arr_choice[i].initial+") : "+arr_choice[i].score+"% ";
        if(arr_choice.length > (i+1)){
            category_desc += "| ";
        }
    });
    $('.desc_category').html(category_desc);
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/getDataRegionToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            project_code:$('#project_code').val(),
            _token: '{{csrf_token()}}'
        },
        processData:true,
        success: function(data){
            $('.tb_sub_area > tbody').empty();
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
        },
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
            _token: '{{csrf_token()}}'
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
counter_sub_area = 2;
$(document).on('click','#add_sub_area1',function(){
        var newRow = $("<tr>");
        var cols = "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area1subAreaName"+counter_sub_area+"[]\" id=\"area1subAreaName"+counter_sub_area+"\"></td>"+
        "<td><button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea1RowSubArea"+counter_sub_area+"\">Hapus</button></td>";
        newRow.append(cols);
        $("#area1Table_sub_area").append(newRow);
        $("#area1Table_sub_area").on("click","#deleteArea1RowSubArea"+counter_sub_area,function(){
            $(this).closest("tr").remove();
        });
        counter_sub_area++;
    });

counter_area = 2;
$(document).on('click','.btn_add_area',function(){
    var add_area = $('.add_area');
    var area = "<div id=\"div_area"+counter_area+"\"><hr/><div class=\"form-group row\">"+
                "<label for=\"AreaName1\" class=\"col-sm-2 col-form-label\">Area Name "+counter_area+"</label>"+
                "<div class=\"col-sm-2\">"+
                    "<input type=\"text\" name=\"AreaName[]\" id=\"AreaName"+counter_area+"\" class=\"form-control form-control-sm\"/>"+
                "</div>"+
                "<div class=\"col-sm-2\">"+
                "<button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea"+counter_area+"\" data-iterate="+counter_area+">Hapus</button>"+
                "</div>"+
            "</div>"+
            "<button type=\"button\" class=\"btn bg-purple btn-sm mb-2\" id=\"add_sub_area"+counter_area+"\" data-iterate-sub_area="+counter_area+">Add Sub Area</button>"+
        "<div class=\"row\">"+
        "<table class=\"table table-striped table-bordered table_sub_area\" id=\"area"+counter_area+"Table_sub_area\" data-iterate-table_sub_area="+counter_area+" style=\"width:50%\">"+
            "<thead>"+
                "<th>Sub Area Name</th>"+
                "<th>Action</th>"+
            "</thead>"+
            "<tbody>"+
                "<tr>"+
                    "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area"+counter_area+"subAreaName1[]\" id=\"area"+counter_area+"subAreaName1\"></td>"+
                    "<td></td>"+
                "</tr>"+
            "</tbody>"+
        "</table>"+
    "</div></div>";
    
    $(document).on('click','#deleteArea'+counter_area,function(){
        var dataIterateArea = $(this).attr('data-iterate');
        $('#div_area'+dataIterateArea).remove();
    })
    add_area.append(area);
    pass_counter_area = counter_area;
    $(document).on('click','#add_sub_area'+counter_area,function(){
        var dataIterate = $(this).attr("data-iterate-sub_area");
        var newRow = $("<tr>");
        var cols = "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area"+pass_counter_area+"subAreaName"+dataIterate+"[]\" id=\"area"+pass_counter_area+"subAreaName"+dataIterate+"\"></td>"+
        "<td><button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea"+pass_counter_area+"RowSubArea"+dataIterate+"\">Hapus</button></td>";
        newRow.append(cols);
        var pass_counter_area2 = pass_counter_area; 
        $("#area"+dataIterate+"Table_sub_area").append(newRow);
        $("#area"+dataIterate+"Table_sub_area").on("click","#deleteArea"+pass_counter_area2+"RowSubArea"+dataIterate,function(){
            $(this).closest("tr").remove();
        });
    });
    counter_area++;
});
</script>
@endsection
