@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Setup Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active">Setup Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" id="form_setup_project" class="form-horizontal">
                        <div class="card">
                            @csrf
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
                                @endif
                                <div class="form-group row">
                                    <label for="inputProjectName" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="project_name" id="project_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dateContract" class="col-sm-2 col-form-label">Date Contract:</label>
                                    <div class="input-group col-sm-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="dateContract" name="dateContract">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group row">
                                    <label for="choiceRegion" class="col-form-label col-sm-2">Region</label>
                                    <div class="col-sm-4">
                                        <select class="select2" name="region_name" id="region_name" multiple="multiple" data-placeholder="Select a region" style="width: 100%;">
                                          </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-md bg-purple preview">Preview</button>
                                    </div>
                                </div>
                                  <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </div>
                        <div class="row show_detail_region">

                        </div>
                    </form>
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
    $('#form_setup_project').validate({
        rules:{
            client_name:{
                required:true
            },
            project_name:{
                required:true
            },
            dateContract:{
                required:true
            },
            region_name:{
                required:true
            }
        },
        messages:{
            client_name:{
                required:"Please choice client"
            },
            project_name:{
                required:"Please input project name"
            },
            dateContract:{
                required:"Please input date contract"
            },
            region_name:{
                required:"Please input region name"
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
            var region = $('#region_name').val();
            var formData = new FormData();
            formData.append('client_id',$('#client_id').val());
            formData.append('project_name',$('#project_name').val());
            formData.append('date_contract',$('#dateContract').val());
            formData.append('region_name',region);
            $.ajax({
                headers:
                {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url:"/setup_project/storeProjectSetup",
                type:"POST",
                data:formData,
                dataType:"JSON",
                processData:false,
                contentType:false,
                success:function(data){
                    if(data.icon == 'success'){
                        Swal.fire({
                            title:"<b>Perhatian!</b>",
                            text:data.message,
                            icon:data.icon,
                            confirmButtonText:"OK"
                        });

                        setTimeout(function(){ 
                            window.location.href=data.redirect; }, 
                                2000
                        );
                    }else{
                        Swal.fire({
                            title:"<b>perhatian!</b>",
                            html: '<p>' + data.username +'<br/>'+ data.email + '</p>',
                            customClass: {
                                popup: 'format-pre'
                            },
                            icon:data.icon,
                            confirmButtonText:"OK"
                        });
                    }
                },
                error:function(xhr,error,errorThrown){
                    alert(xhr.status); 
                }
            });
        }
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
});

$(document).on('click','.preview',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/setup_project/getDetailRegion",
        type:"POST",
        dataType:"JSON",
        data:{
            region_name:$('#region_name').val()
        },
        processData:true,
        success: function(data){
            var region = $('#region_name').select2('data');
            $('.card-region').remove();
        
            for(var i = 0;i<region.length;i++){
                var html = "<div class=\"col-sm-12 card-region\">"+
                "<h1>"+region[i].text+"</h1><div class=\"row\">";
                $.each(data,function(a,item){
                    html += "";
                    if(data[a].region_name == region[i].text){
                        html +="<div class=\"col-sm-3 card mr-3\">"+
                        "<div class=\"card-body\">"+
                        "<div class=\"row\"><h3 class=\"card-title\">"+data[a].location_name+"</h3></div>"+
                        "<div class=\"row\"><span class=\"text-muted\">"+data[a].address+"</span></div>";
                        $.ajax({
                            headers:{
                                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                            },
                            url:"/setup_project/getDetailLocation/"+data[a].location_id,
                            type:"GET",
                            dataType:"JSON",
                            processData:true,
                            success: function(data_area){
                                $.each(data,function(c,item){
                                    html+="<div class=\"row\">"+data_area[c].area_name+"</div>";
                                });
                            }
                        });
                        html +="</div></div>";
                    }
                });   
                html += "</div>"+
                "</div>";
                $('.show_detail_region').append(html);
            }
            
        }
    });
});
$(document).on('click','.pilih_client',function(){
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/get_data_region_to_selected",
        type:"POST",
        dataType:"JSON",
        data:{
            client_id:$('#client_id').val()
        },
        processData:true,
        success: function(data){
            $('select#region_name').find('option').remove();
            $.each(data, function(i,item){
                $('#region_name').append($('<option>',{
                    value:data[i].id,
                    text:data[i].region_name
                }));
                $('#region_name option').each(function(){
                    if(this.selected){
                        $('#region_description').val(data[i].description);
                    }
                });
            });
        }
    });
});
</script>
@endsection