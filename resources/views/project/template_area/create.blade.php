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
                            <form method="post" id="form_template" class="form-horizontal" onsubmit="return false">
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
                                            <input type="text" name="AreaName[]" id="AreaName1" data-input-area="1" class="form-control form-control-sm"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="AreaName1" class="col-sm-2 col-form-label">Service Name</label>
                                        <div class="col-sm-2">
                                            <select name="service_code[]" id="service_code1" class="form-control form-control-sm"></select>
                                        </div>
                                    </div>
                                    <button type="button" class="btn bg-purple btn-sm mb-2" id="add_sub_area1" data-iterate-area="1">Add Sub Area</button>
                                    <div class="row">
                                        <table class="table table-striped table-bordered" id="area1Table_sub_area" data-iterate-table_sub_area="1" style="width:50%">
                                            <thead>
                                                <th>Sub Area Name</th>
                                                <th>Action</th>
                                            </thead>
                                            <tr>
                                                <td><input type="text" class="form-control form-control-sm" name="area1subAreaName[]" id="area1subAreaName1"></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
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
        var cols = "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area1subAreaName[]\" id=\"area1subAreaName"+counter_sub_area+"\"></td>"+
        "<td><button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea1RowSubArea"+counter_sub_area+"\">Hapus</button></td>";
        newRow.append(cols);
        $("#area1Table_sub_area").append(newRow);
        $("#area1Table_sub_area").on("click","#deleteArea1RowSubArea"+counter_sub_area,function(){
            $(this).closest("tr").remove();
        });
        counter_sub_area++;
    });
    var opt_service = "";
    $.ajax({
        headers:{
                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/getDataService",
        type:"GET",
        dataType:"JSON",
        processData:true,
        success: function(data_service){
            $.each(data_service,function(i,item){
                    opt_service +="<option value="+data_service[i].service_code+">"+data_service[i].service_name+"</option>";
            });
            $('select#service_code1').append(opt_service);
        },
        complete: function(){
            
            counter_area = 2;
            counter_sub_area=2;
            $(document).on('click','.btn_add_area',function(){
                var add_area = $('.add_area');
                var area = "<div id=\"div_area"+counter_area+"\"><hr/><div class=\"form-group row\">"+
                            "<label for=\"AreaName1\" class=\"col-sm-2 col-form-label\">Area Name "+counter_area+"</label>"+
                            "<div class=\"col-sm-2\">"+
                                "<input type=\"text\" name=\"AreaName[]\" id=\"AreaName"+counter_area+"\" class=\"form-control form-control-sm\" data-input-area="+counter_area+" />"+
                            "</div>"+
                            "<div class=\"col-sm-2\">"+
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea"+counter_area+"\" data-iterate="+counter_area+">Hapus</button>"+
                            "</div>"+
                        "</div>"+
                        "<div class=\"form-group row\">"+
                            "<label for=\"AreaName1\" class=\"col-sm-2 col-form-label\">Service Name</label>"+
                            "<div class=\"col-sm-2\">"+
                                "<select name\=\"service_code[]\" id=\"service_code"+counter_area+"\" class=\"form-control form-control-sm\"></select>"+
                            "</div>"+
                        "</div>"+
                        "<button type=\"button\" class=\"btn bg-purple btn-sm mb-2\" id=\"add_sub_area"+counter_area+"\" data-iterate-area=\""+counter_area+"\">Add Sub Area</button>"+
                    "<div class=\"row\">"+
                    "<table class=\"table table-striped table-bordered table_sub_area\" id=\"area"+counter_area+"Table_sub_area\" data-iterate-table_sub_area="+counter_area+" style=\"width:50%\">"+
                        "<thead>"+
                            "<th>Sub Area Name</th>"+
                            "<th>Action</th>"+
                        "</thead>"+
                        "<tbody>"+
                            "<tr>"+
                                "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area"+counter_area+"subAreaName[]\" id=\"area"+counter_area+"subAreaName1\"></td>"+
                                "<td></td>"+
                            "</tr>"+
                        "</tbody>"+
                    "</table>"+
                "</div></div>";
                $(document).on('click','#deleteArea'+counter_area,function(){
                    var dataIterateArea = $(this).attr('data-iterate');
                    $('#div_area'+dataIterateArea).remove();
                    counter_area--;
                })
                
                add_area.append(area);
                var pass_counter_area;
                counter_sub_area = 2;
                $(document).on('click','#add_sub_area'+counter_area,function(){
                    var dataIterate = $(this).attr("data-iterate-area");
                    var newRow = $("<tr>");
                    var cols = "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area"+pass_counter_area+"subAreaName[]\" id=\"area"+pass_counter_area+"subAreaName"+counter_sub_area+"\"></td>"+
                    "<td><button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea"+pass_counter_area+"RowSubArea"+dataIterate+"\">Hapus</button></td>";
                    newRow.append(cols);
                    var pass_counter_area2 = pass_counter_area;
                    $("#area"+dataIterate+"Table_sub_area").append(newRow);
                    $("#area"+dataIterate+"Table_sub_area").on("click","#deleteArea"+pass_counter_area2+"RowSubArea"+dataIterate,function(){
                        $(this).closest("tr").remove();
                    });
                    counter_sub_area++;
                });
                $('select#service_code'+counter_area).append(opt_service);
                pass_counter_area = counter_area;
                counter_area=counter_area+1;
            });
        }        
});
    
$(document).ready(function(){
    $('#form_template').validate({
        rules: {
            client_name:{
                required:true,
            },
            project_code:{
                required:true
            },
            start_date:{
                required:true
            },
            finish_date:{
                required:true
            },
            region_name:{
                required:true
            },
            location_name:{
                required:true
            }
        },
        messages:{
            client_name:{
                required:"Please input client name"
            },
            project_code:{
                required:"Please input project code"
            },
            start_date:{
                required:"Please input start date"
            },
            finish_date:{
                required:"Please input finish_date"
            },
            region_name:{
                required:"Please input region_name"
            },
            location_name:{
                required:"Please input location name"
            },
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
            var last_counter_area = counter_area-1;
            var dataPushArea = [];
            
            $('input[name="AreaName[]"]').each(function(i,item){
                const arrDataArea = [];
                var dataArea = $(this).attr('data-input-area');
                var areaName = $(this).val();
                var serviceCode = $('#service_code'+dataArea).val();
                arrDataArea.push({ 'areaName' : areaName,'serviceCode': serviceCode });
                // arrDataArea.set('areaName', areaName);
                var dataPushSubArea = new Array();
                
                $("input[name=\"area"+dataArea+"subAreaName[]\"]").each(function(a,item){
                    var subAreaName = $(this).val();
                    // arrDataArea = subAreaName;
                    dataPushSubArea.push({'sub_area_name' : subAreaName});
                    // arrDataArea.set('data',dataPushSubArea);
                    
                    // const data
                });
                arrDataArea.push({'data':dataPushSubArea});
                dataPushArea.push(arrDataArea)
            });
            // console.log(dataPushArea);
            // var formData = new FormData();
            // formData.append('arr_data',dataPushArea);
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                },
                url:'/template_area/storeDataTemplateArea',
                type:"POST",
                dataType:"JSON",
                async:false,
                processData:true,
                data:{
                    'location_id':$('#location_name').val(),
                    'start_date':$('#start_date').val(),
                    'finish_date':$('#finish_date').val(),
                    'arr_data':dataPushArea,
                    _token: '{{csrf_token()}}'
                },
                success:function(data){
                    Swal.fire({
                        title:data.title,
                        html:data.message,
                        icon:data.icon
                    });
                    if(data.is_valid == 1){
                        setTimeout(() => {
                            window.location.href=data.redirect;
                        }, 1500);
                    }
                    
                }
            });
        }
        
    });
});

</script>
@endsection
