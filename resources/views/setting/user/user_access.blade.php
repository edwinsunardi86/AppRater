@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Access</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">User Access</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Access Privilege</h3>
                        </div>
                        <form method="post" id="form_user_access" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="mb-6">
                                    <table class="table table-hover">
                                        <tbody>
                                            @php $a = 0; @endphp
                                            @foreach($access_menu_parent as $row_parent)
                                                    @php
                                                        $i = 1;
                                                        $count_user_access = 1;
                                                        $if_check_all = null;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw" data-toggle="expanded" data-target="#demo{{ $a }}"></i>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" name="checkboxPrimary[]" id="checkboxPrimary{{ $a }}" value="{{ $row_parent->id }}">
                                                                <label for="checkboxPrimary{{ $a }}">
                                                                    {{ $row_parent->nama_menu }}
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        @foreach($access_menu as $row_menu)
                                                        
                                                            <tr class="expandable-body">
                                                                @if($row_parent->id == $row_menu->menu_parent_id)
                                                                    <td class="hiddenRow">
                                                                        <div class="accordian-body expanded" id="demo{{ $a }}">
                                                                            <table class="table table-hover">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="form-group">
                                                                                                <div class="icheck-primary d-inline pl-5">
                                                                                                    <input type="checkbox" class="menuParent{{ $a }}" id="checkbox{{ $a }}Menu{{ $i }}" name="menuParent[]" value="{{ $row_menu->id }}" {{ in_array($row_menu->id,$menu_id) ? 'checked':''}}>
                                                                                                    <label for="checkbox{{ $a }}Menu{{ $i }}">
                                                                                                        {{ $row_menu->nama_menu }}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                    @php
                                                                        $i++;
                                                                        if(in_array($row_menu->id,$menu_id)){ 
                                                                            $count_user_access++;
                                                                        }
                                                                    @endphp
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        @php
                                                        $if_check_all = ($i == $count_user_access) ? 'all' : '';
                                                        echo '<input type="hidden" name="check_all[]" id="check_all'.$a.'" value="'.$if_check_all.'">';
                                                        @endphp
                                                @php $a++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if($role->role == 2)
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Access Authority</h3>
                        </div>
                        <form method="post" id="form_user_access" class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="mb-6">
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
                                        <label for="choiceProject" class="col-form-label col-sm-2">Project</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="project_code" id="project_code"></select>
                                        </div>
                                    </div>
                                    <div class="div_region row">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
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

    $('input[name="check_all[]"]').each(function(){
        if($(this).val()=='all'){
            var number = this.id.match(/\d+/);
            $('#checkboxPrimary'+number).prop('checked',true);
        }
    });
    $('input[name="checkboxPrimary[]"]').each(function(){
        $(this).click(function(){
            var idParent = this.id.match(/\d+/);
            
            if($(this).is(':checked')){
                // $('input[name="menuParent'+idParent+'[]"]').prop('checked',true);
                $('.menuParent'+idParent).prop('checked',true);
            }else{
                $('.menuParent'+idParent).prop('checked',false);
            }
        });
    });

    $('#form_user_access').validate({
        rules:{
            'menuParent[]':{
                required:true
            }
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            },
            highlight: function (element, errorClass, validClass) {
            Swal.fire({
                title : "Perhatian!",
                html  : "Mohon isi privilegenya!",
                icon  : "error"
            });
            },
            unhighlight: function (element, errorClass, validClass) {
            },
            submitHandler: function() { 
                var url = window.location.href;
                var param = url.split('/');
                var formData = new FormData();
                const menuParent = [];
                $('input[name="menuParent[]"]:checked').each(function(){
                    menuParent.push($(this).val());
                });
                formData.append('menu_id',menuParent);
                formData.append('user_id',param[5]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                    url:'/users/set_user_access_previlage/',
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    processData:false,
                    contentType:false,
                    success: function(data){
                        if(data.error == 1){
                            Toast.fire({
                                icon: 'error',
                                title: 'Warning!'
                            })
                        }else{
                            Swal.fire({
                                title: data.title,
                                html : data.message,
                                icon : data.icon,
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.href = data.redirect
                            }, 1500);
                            
                        }
                    }
                });
            }
    });
});

$(document).on('change','#company',function(){
    $.ajax({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
        },
        url:'/setup_project/getProjectSetupToSelected',
        type:'POST',
        dataType:'JSON',
        data:{
            client_id:$('#company').val()
        },
        processData:true,
        success:function(data){
            $('select#project_code option').remove();
            $('select#project_code').append($('<option>',{
                value:"",
                text:"Choice Project"
            }));
            $.each(data,function(i,item){
                $('select#project_code').append($('<option>',{
                    value:data[i].project_code,
                    text:data[i].project_name
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
            var region = "";
            $.each(data,function(i,item){
                region = "<div class=\"card card-info card-outline col-6\">"+
                            "<div class=\"card-header text-right\">"+
                                "<h5 class=\"card-title\">Region "+data[i].region_name+"</h5>"+
                            "</div>"+
                            "<div class=\"card-body\" id=\"div_location"+i+"\"></div></div>";
                $('.div_region').append(region);
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:"/location/getDataLocationToSelected",
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        "region_id":data[i].id,
                    },
                    processData:true,
                    success:function(data_location){
                        var location="";
                        $.each(data_location,function(a,item){
                            location ="<div class=\"custom-control custom-checkbox\">"+
                            "<input class=\"custom-control-input\" type=\"checkbox\" id=\"region"+i+"location"+a+"\" name=\"location[]\" value='"+data_location[a].location_id+"'>"+
                            "<label for=\"region"+i+"location"+a+"\" class=\"custom-control-label\">"+data_location[a].location_name+"</label>"+
                            "</div>";
                            $('#div_location'+i).append(location);
                        });
                    }
                });
            });
        }
    });
});


$('#btn_submit_authority').click(function(e){
    var url = window.location.href;
    var param = url.split('/');
    e.preventDefault();
    var formData = new FormData();
    formData.append('company',$('#company').val());
    formData.append('user_id',param[5]);
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url:'/users/set_user_access_authority/',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            processData:false,
            contentType:false,
            success: function(data){
                if(data.error == 1){
                    Toast.fire({
                        icon: 'error',
                        title: 'Warning!'
                    })
                }else{
                    Swal.fire({
                        title: data.title,
                        html : data.message,
                        icon : data.icon,
                        showConfirmButton: false
                    });
                    setTimeout(() => {
                        window.location.href = data.redirect
                    }, 1500);
                    
                }
        }
    });
});
</script>
@endsection