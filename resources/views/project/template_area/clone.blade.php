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
                            <h3 class="card-title">Template Area Location {{ $location->location_name }}</h3>
                        </div>
                        <div class="card-body">
                            <form id="form_clone" method="post" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="locationName" class="col-form-label col-sm-2" style="font-size:17px">Location Name</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="location_name" id="location_name" value="{{ $location->location_name }}" readonly>
                                        <input type="hidden" name="location_id" id="location_id" value="{{ $location->id }}">
                                    </div>
                                </div>
                                @php
                                $i = 0;
                                $a = 1;
                                @endphp
                                <div class="container-fluid h-100">
                                    <div class="row">

                                    
                                @foreach($service as $row_service)
                                    {{-- <h3>{{ $row_service['service_name']; }}</h3>
                                    @foreach($getData as $row)
                                        <div class="div_area" data-iterate = "{{ $i }}">
                                            <div class="form-group row offset-sm-1">
                                                <label for="areaName" class="col-form-label col-sm-2">Area Name {{ $i }}</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-sm" name="area_name[]" id="area_name {{ $i }}" value="{{ $row->area_name }}">
                                                    <input type="hidden" name="area_id" id="area_id{{ $i }}" value="{{ $row->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach --}}
                                    
                                            <div class="card card-secondary card-outline w-100 mr-1">
                                                <div class="card-header card-title">
                                                    {{ $row_service['service_name']}}
                                                </div>
                                                <div class="card-body">
                                                    @foreach($getData as $row)
                                                        @if($row->service_name == $row_service['service_name'])
                                                        <div class="div_area" id="div_area{{ $i }}" data-iterate = "{{ $i }}">
                                                            <div class="form-group row">
                                                                <label for="areaName" class="col-form-label col-sm-1">Area Name {{ $a }}</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" class="form-control form-control-sm" name="areaName[]" id="areaName{{ $i }}" value="{{ $row->area_name }}"><input type="hidden" id="service_code{{ $i }}" name="service_code[]" value="{{ $row->service_code }}">
                                                                    <input type="hidden" name="area_id" id="area_id{{ $i }}" value="{{ $row->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <button type="button" class="btn bg-purple btn-sm mb-2" id="add_sub_area{{ $i }}" data-iterate-area="{{ $i }}">Add Sub Area</button>
                                                        </div>
                                                        @php $i++; $a++; @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                @endforeach
                                </div>
                                <div class="add_area"></div>
                                <button type="button" class="btn btn-primary btn-md btn_add_area mb-4">Add Area</button>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
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
<script>
$(document).ready(function() {
    let getAreaLength = 0;
    $('.div_area').each(function() {
            var getIterate = $(this).attr('data-iterate');
            $.ajax({
                url: '/showDataSubAreaByIdTemplateArea/' + $('#area_id' + getIterate).val(),
                dataType: "JSON",
                type: "GET",
                success: function(data) {
                    var htmlData = "<div class=\"offset-md-2\"><table class=\"table table-striped table-bordered\" id=\"area" + getIterate + "Table_sub_area\" style=\"width:35%\"><tbody>";
                    data.forEach(function(item, index) {
                        htmlData += "<tr><td><input type=\"text\" class=\"form-control form-control-sm\" value=\"" + item.sub_area_name + "\" name=\"area" + getIterate + "subAreaName[]\" id=\"area" + getIterate + "subAreaName" + index + "\"></td><td></td></tr>";
                    });
                    htmlData += "</tbody></table></div>";
                    $('#div_area' + getIterate).append(htmlData);
                }
            });
            $(document).on('click', '#add_sub_area' + getIterate, function() {
                var newRow = $("<tr>");
                var cols = "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area" + getIterate + "subAreaName[]\" id=\"area" + getIterate + "subAreaName\"></td><td><button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea" + getIterate + "RowSubArea\">Hapus</button></td>";
                newRow.append(cols);
                $("#area" + getIterate + "Table_sub_area").append(newRow);
                $("#area" + getIterate + "Table_sub_area").on("click", "#deleteArea" + getIterate + "RowSubArea", function() {
                    $(this).closest("tr").remove();
                });
            });
        getAreaLength = getAreaLength + 1;
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
            
    counter_sub_area=2;
    var counter_area = getAreaLength;
    $(document).on('click', '.btn_add_area', function() {
        counter_area++;
        var add_area = $('.add_area');
        var area = "<div id=\"div_area" + counter_area + "\"><hr/><div class=\"form-group row\">" +
            "<label for=\"AreaName1\" class=\"col-sm-2 col-form-label\">Area Name " + counter_area + "</label>" +
            "<div class=\"col-sm-2\">" +
            "<input type=\"text\" name=\"areaName[]\" id=\"areaName" + counter_area + "\" class=\"form-control form-control-sm\" data-input-area=" + counter_area + " />" +
            "</div>" +
            "<div class=\"col-sm-2\">" +
            "<button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"deleteArea" + counter_area + "\" data-iterate=" + counter_area + ">Hapus</button>" +
            "</div>" +
            "</div>" +
            "<div class=\"form-group row\">" +
            "<label for=\"AreaName1\" class=\"col-sm-2 col-form-label\">Service Name</label>" +
            "<div class=\"col-sm-2\">" +
            "<select name\=\"service_code[]\" id=\"service_code" + counter_area + "\" class=\"form-control form-control-sm\"></select>" +
            "</div>" +
            "</div>" +
            "<button type=\"button\" class=\"btn bg-purple btn-sm mb-2\" id=\"add_sub_area" + counter_area + "\" data-iterate-area=\"" + counter_area + "\">Add Sub Area</button>" +
            "<div class=\"row\">" +
            "<table class=\"table table-striped table-bordered table_sub_area\" id=\"area" + counter_area + "Table_sub_area\" data-iterate-table_sub_area=" + counter_area + " style=\"width:50%\">" +
            "<thead>" +
            "<th>Sub Area Name</th>" +
            "<th>Action</th>" +
            "</thead>" +
            "<tbody>" +
            "<tr>" +
            "<td><input type=\"text\" class=\"form-control form-control-sm\" name=\"area" + counter_area + "subAreaName[]\" id=\"area" + counter_area + "subAreaName1\"></td>" +
            "<td></td>" +
            "</tr>" +
            "</tbody>" +
            "</table>" +
            "</div></div>";
            add_area.append(area);

            var pass_counter_area;
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
        });
    }
    });
});

// $('#form_clone').submit(function(e){
//     e.preventDefault();
//     alert($('input[name="area_name[]"]').length);
// });
$('#form_clone').on("submit", function(e){
    e.preventDefault();
    // alert($('input[name="areaName[]"]').length);
    arr_area = [];
    for(var i = 0; i < $('input[name="areaName[]"]').length; i++){
        console.log($("input[name=\"area"+i+"subAreaName[]\"]").length);
        arr_area.push({area_name:$("#areaName"+i).val()});
        arr_sub_area = [];
        for(var j = 0; j < $("input[name=\"area"+i+"subAreaName[]\"]").length; j++){
            console.log($("#area"+i+"subAreaName"+j).val());
            arr_sub_area.push($("#area"+i+"subAreaName"+j).val());
        }
        arr_area.push({sub_area_name:arr_sub_area});
    }
    console.log(arr_area);
});
</script>
@endsection