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
                            <form method="post" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="locationName" class="col-form-label col-sm-2" style="font-size:17px">Location Name</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-sm" name="location_name" id="location_name" value="{{ $location->location_name }}" readonly>
                                        <input type="hidden" name="location_id" id="location_id" value="{{ $location->id }}">
                                    </div>
                                </div>
                                @php
                                $i = 1;
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
                                                    <input type="text" class="form-control form-control-sm" name="area_name[]" id="area_name {{ $i }}" value="{{ $row->area_name }}" readonly>
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
                                                                <label for="areaName" class="col-form-label col-sm-1"> Area Name</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" class="form-control form-control-sm" name="area_name[]" id="area_name {{ $i }}" value="{{ $row->area_name }}" readonly>
                                                                    <input type="hidden" name="area_id" id="area_id{{ $i }}" value="{{ $row->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @php $i++; @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                @endforeach
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
$(document).ready(function(){
    $('.div_area').each(function(){
        var getIterate = $(this).attr('data-iterate');
        $.ajax({
            url:'/showDataSubAreaByIdTemplateArea/'+$('#area_id'+getIterate).val(),
            dataType:"JSON",
            type:"GET",
            success:function(data){
                var htmlData = "<div class=\"offset-md-2\"><table class=\"table table-striped table-bordered\" style=\"width:35%\"><tbody>";
                data.forEach(function(item,index){
                    htmlData += "<tr><td><input type=\"text\" class=\"form-control form-control-sm\" value=\""+item.sub_area_name+"\" name=\"area"+getIterate+"sub_area_name[]\" id=\"area"+getIterate+"sub_area_name"+index+"\" readonly></td></tr>";
                });
                htmlData += "</tbody></table></div>";
                $('#div_area'+getIterate).append(htmlData);
            }
        });
    });
});
</script>
@endsection