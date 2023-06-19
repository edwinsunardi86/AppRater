@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Evaluation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active">Evaluation</li>
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
                            <h3 class="card-title">Form Evaluation</h3>
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
                                    <select name="project_code" id="project_code" class="form-control select2 col-sm-4">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="InputDateEvaluation" class="col-sm-2 col-form-label">Date Evaluation:</label>
                                  <div class="col-sm-4 input-group date" id="dateFormat" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input col-sm-4" id="date_evaluation" name="date_evaluation" data-target="#dateFormat"/>
                                      <div class="input-group-append" data-target="#dateFormat" data-toggle="datetimepicker">
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
                            @foreach($service as $row)
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <div class="row"><p class="card-title">{{ $row->service_name }}</p></div>
                                    <div class="row">
                                        <p class="card-title">Score :</p>
                                    </div>
                                    <div class="row"><p class="text-muted">Sangat Baik (SB) : 100% | Baik (B) : 96% | Cukup Baik (CB) : 89% | Kurang Baik (KB) : 74%</p></div>
                                </div>
                                <div class="card-body">
                                    <table class="table tb_sub_area table-striped table-bordered {{ $row->service_code }}" id="{{ $row->service_code }}">
                                    <thead>
                                        <th style="width:30%">Area</th>
                                        <th style="width:30%">Sub Area</th>
                                        <th style="width:40%">Score</th>
                                    </thead>
                                    <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                            <div class="rating-sub-area"></div>
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                        </form>
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
@if(Auth::user()->role==1)
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

$(document).on('change','#location_name',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/sub_area/getDataSubAreaSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            location_id:$('#location_name').val(),
            _token: '{{csrf_token()}}'
        },
        processData:true,
        success: function(data){
            $('#count_sub_area').remove();
            var a=1;
            $('.tb_sub_area > tbody').empty();
            $.each(data,function(i,item){
                if($('.'+data[i].service_code).attr('id') == data[i].service_code){
                    var content = "<tr><td>"+data[i].area_name+"<input type=\"hidden\" name=\"area_id[]\" id=\"area_id"+a+"\" value="+data[i].area_id+"></td><td>"+data[i].sub_area_name+"<input type=\"hidden\" name=\"sub_area_id[]\" id=\"sub_area_id"+a+"\" value="+data[i].sub_area_id+"></td><td>"+
                    "<div class=\"col-sm-12\">"+
                        "<div class=\"form-group row clearfix\">"+
                            "<div class=\"icheck-primary d-inline m-1\">"+
                                "<input class=\"score\" type=\"radio\" id=\"ratingsb"+a+"\" name=\"score"+a+"[]\" value=\"100\">"+
                                "<label for=\"ratingsb"+a+"\">SB"+
                                "</label>"+
                            "</div>"+
                            "<div class=\"icheck-primary d-inline m-1\">"+
                                "<input class=\"score\" type=\"radio\" id=\"ratingb"+a+"\" name=\"score"+a+"[]\" value=\"96\">"+
                                "<label for=\"ratingb"+a+"\">B"+
                                "</label>"+
                            "</div>"+
                            "<div class=\"icheck-primary d-inline m-1\">"+
                                "<input class=\"score\" type=\"radio\" id=\"ratingcb"+a+"\" name=\"score"+a+"[]\" value=\"89\">"+
                                "<label for=\"ratingcb"+a+"\">CB"+
                                "</label>"+
                            "</div>"+
                            "<div class=\"icheck-primary d-inline m-1\">"+
                                "<input class=\"score\" type=\"radio\" id=\"ratingkb"+a+"\" name=\"score"+a+"[]\" value=\"74\">"+
                                "<label for=\"ratingkb"+a+"\">KB"+
                                "</label>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                                "<label for=\"locationName\" class=\"col-sm-12 col-form-label\">Recommendation and critics</label>"+
                                "<div class=\"col-sm-12\">"+
                                    "<textarea id=\"recommend"+a+"\" name=\"recommend"+a+"[]\" class=\"form-control\" cols=\"50\" rows=\"3\"></textarea>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                    "</td>"
                    "<td>"+
                    
                    "</td>"+
                    "</tr>";
                    $('.'+data[i].service_code+" > tbody").append(content);
                }
                a++;
            });
            var rating_count="<input type=\"hidden\" name=\"count_sub_area\" id=\"count_sub_area\" value="+ parseInt(a-1) +">";
            $('.rating-sub-area').append(rating_count);
        }
    });
});
@endif
$(document).ready(function(){
    $('#form_evaluation').validate({
        rules:{
            client_name:{
                required:true
            },
            project_code:{
                required:true
            },
            region_name:{
                required:true
            },
            location_name:{
                required:true
            },
            date_evaluation:{
                required:true
            }
        },
        messages:{
            client_name:{
                required:"Please choice client name"
            },
            project_code:{
                required:"Please choice project name"
            },
            region_name:{
                required:"Please choice region name"
            },
            location_name:{
                required:"Please choice location name"
            },
            date_evaluation:{
                required: "Please input date evaluation"
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
            var score = [];
            $('input[class="score"]:checked').each(function(){
                if($(this).val() !=""){
                    score.push($(this).val());
                }
            });
            
            if(score.length == $('#count_sub_area').val()){
                var formData = new FormData();
                formData.append('client_id',$('#client_id').val());
                formData.append('project_code',$('#project_code').val());
                formData.append('date_evaluation',$('#date_evaluation').val())
                formData.append('region_id',$('#region_name').val());
                formData.append('location_id',$('#location_name').val());
                formData.append('_token',$('meta[name=csrf-token]').attr('content'));
                var sub_area_id = [];
                var recommend = [];
                    
                for(var i = 1;i<=$('input[name="count_sub_area"]').length;i++){
                    score.push($('input[name="score'+i+']').val());
                }
                for(var i = 1;i<=$('input[name="sub_area_id[]"]').length;i++){
                    sub_area_id.push($('#sub_area_id'+i).val());
                    recommend.push($('#recommend'+i).val());
                }
                formData.append('score',score);
                formData.append('sub_area_id',sub_area_id);
                formData.append('recommend',recommend);

                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:"/evaluation/storeEvaluation",
                    type:"POST",
                    dataType:"JSON",
                    data: formData,
                    processData:false,
                    contentType:false,
                    success: function(data){
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
                Swal.fire({
                    title:"Perhatian!!",
                    html:"Mohon input semua score sub area",
                    icon:"error"
                });
            }
            

        }
    });
});

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
        console.log(data);
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
                $('select#location_name option').remove();
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
                $(document).on('change','#location_name',function(){
                    var area = ['area'];
                    var filter_area_sub_area = data.filter(location => location.location_id == $('#location_name').val());
                    var a=1;
                    $('.tb_sub_area > tbody').empty();
                    $.each(filter_area_sub_area,function(i,item){
                        if($('.'+filter_area_sub_area[i].service_code).attr('id') == filter_area_sub_area[i].service_code){
                            var content = "<tr><td>"+filter_area_sub_area[i].area_name+"<input type=\"hidden\" name=\"area_id[]\" id=\"area_id"+a+"\" value="+filter_area_sub_area[i].area_id+"></td><td>"+filter_area_sub_area[i].sub_area_name+"<input type=\"hidden\" name=\"sub_area_id[]\" id=\"sub_area_id"+a+"\" value="+filter_area_sub_area[i].sub_area_id+"></td><td>"+
                            "<div class=\"col-sm-12\">"+
                                "<div class=\"form-group row clearfix\">"+
                                    "<div class=\"icheck-primary d-inline m-1\">"+
                                        "<input class=\"score\" type=\"radio\" id=\"ratingsb"+a+"\" name=\"score"+a+"[]\" value=\"100\">"+
                                        "<label for=\"ratingsb"+a+"\">SB"+
                                        "</label>"+
                                    "</div>"+
                                    "<div class=\"icheck-primary d-inline m-1\">"+
                                        "<input class=\"score\" type=\"radio\" id=\"ratingb"+a+"\" name=\"score"+a+"[]\" value=\"96\">"+
                                        "<label for=\"ratingb"+a+"\">B"+
                                        "</label>"+
                                    "</div>"+
                                    "<div class=\"icheck-primary d-inline m-1\">"+
                                        "<input class=\"score\" type=\"radio\" id=\"ratingcb"+a+"\" name=\"score"+a+"[]\" value=\"89\">"+
                                        "<label for=\"ratingcb"+a+"\">CB"+
                                        "</label>"+
                                    "</div>"+
                                    "<div class=\"icheck-primary d-inline m-1\">"+
                                        "<input class=\"score\" type=\"radio\" id=\"ratingkb"+a+"\" name=\"score"+a+"[]\" value=\"74\">"+
                                        "<label for=\"ratingkb"+a+"\">KB"+
                                        "</label>"+
                                    "</div>"+
                                "</div>"+
                                "<div class=\"form-group\">"+
                                    "<label for=\"locationName\" class=\"col-sm-12 col-form-label\">Recommendation and critics</label>"+
                                    "<div class=\"col-sm-12\">"+
                                        "<textarea id=\"recommend"+a+"\" name=\"recommend"+a+"[]\" class=\"form-control\" cols=\"30\" rows=\"3\"></textarea>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                            "</td></tr>";
                            $('.'+filter_area_sub_area[i].service_code+" > tbody").append(content);
                        }
                        a++;
                    });
                    var rating_count="<input type=\"hidden\" name=\"count_sub_area\" id=\"count_sub_area\" value="+ parseInt(a-1) +">";
                    $('.rating-sub-area').append(rating_count);
                });
            });
        });
    });

    
});
@endif
</script>
@endsection