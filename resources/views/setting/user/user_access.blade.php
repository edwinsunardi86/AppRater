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
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail User</h3>
                        </div>
                        <form id="form_user" class="form-horizontal">
                            @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" id="username" class="form-control" value="{{ $role->username }}" placeholder="Username" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $role->email }}" placeholder="Email" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputFullName" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $role->fullname}}" placeholder="Full Name" readonly>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a href="#custom-tab-one-access-privileges" data-toggle="pill" class="nav-link active" id="custom-tabs-one-access-privileges-tab" role="tab" aria-controls="custom-tabs-one-access-privileges">Privileges</a>
                                </li>
                                @if($role->role == 3)
                                <li class="nav-item">
                                    <a href="#custom-tab-one-access-authority" data-toggle="pill" class="nav-link" id="custom-tabs-one-access-authority-tab" role="tab" aria-controls="custom-tabs-one-access-privileges">Authority</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tab-one-access-privileges" role="tabpanel" aria-labelledby="custom-tab-one-access-privileges-tab">
                                    <div class="col-12">
                                            <form method="post" id="form_user_access" class="form-horizontal">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="mb-6">
                                                        {{-- <table class="table table-hover">
                                                            <tbody>
                                                                @php $a = 0; @endphp
                                                                @foreach($access_menu_parent as $row_parent)
                                                                        @php
                                                                            $z = 0;
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
                                                                                        <h4>{{ $row_parent->nama_menu }}</h4>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                            @foreach($access_menu as $row_menu)
                                                                                @php
                                                                                $arr = array_filter($menu_array,function($ar) use($row_menu){
                                                                                    return $ar['menu_id'] == $row_menu->id;
                                                                                });
                                                                                @endphp
                                                                                <tr class="expandable-body">
                                                                                    @if($row_parent->id == $row_menu->menu_parent_id)
                                                                                        <td class="hiddenRow">
                                                                                            <div class="accordian-body expanded" id="demo{{ $a }}">
                                                                                                <table class="table table-hover">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <div class="form-group">
                                                                                                                    <div class="icheck-primary d-inline pl-5 col-md-4">
                                                                                                                        <input type="checkbox" class="menuParent{{ $a }}" id="checkbox{{ $a }}Menu{{ $i }}" name="menuParent[]" value="{{ $row_menu->id }}" {{ count($arr) > 0 ? 'checked' : '' }}>
                                                                                                                        <label for="checkbox{{ $a }}Menu{{ $i }}">
                                                                                                                            <h5>{{ $row_menu->nama_menu }}</h5>
                                                                                                                        </label>
                                                                                                                    </div>
                                                                                                                    <div class="icheck-primary d-inline pl-5">
                                                                                                                        <input type="checkbox" class="menuCreateParent{{ $a }}" id="checkbox{{ $a }}MenuCreate{{ $i }}" name="menuCreateParent[]" value="1" {{ count($arr) > 0 ? 'checked' : '' }}>
                                                                                                                        <label for="checkbox{{ $a }}Menu{{ $i }}">
                                                                                                                            Create
                                                                                                                        </label>
                                                                                                                    </div>
                                                                                                                    <div class="icheck-primary d-inline pl-5">
                                                                                                                        <input type="checkbox" class="menuUpdateParent{{ $a }}" id="checkbox{{ $a }}MenuUpdate{{ $i }}" name="menuUpdateParent[]" value="1" {{ count($arr) > 0 ? 'checked' : '' }}>
                                                                                                                        <label for="checkbox{{ $a }}Menu{{ $i }}">
                                                                                                                            Update
                                                                                                                        </label>
                                                                                                                    </div>
                                                                                                                    <div class="icheck-primary d-inline pl-5">
                                                                                                                        <input type="checkbox" class="menuDeleteParent{{ $a }}" id="checkbox{{ $a }}MenuDelete{{ $i }}" name="menuDeleteParent[]" value="1" {{ count($arr) > 0 ? 'checked' : '' }}>
                                                                                                                        <label for="checkbox{{ $a }}Menu{{ $i }}">
                                                                                                                            Delete
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
                                                                                            $z++;
                                                                                            $i++;
                                                                                            if(count($arr) > 0){ 
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
                                                        </table> --}}
                                                        @php
                                                        $checkedCreate = "";
                                                        $checkedUpdate = "";
                                                        $checkedDelete = "";
                                                        function isCreateChecked($menu_array,$row_menu){
                                                            foreach($menu_array as $arr){
                                                                if($arr['menu_id'] == $row_menu->id){
                                                                    if($arr['create']==1){
                                                                            return "checked";
                                                                    }
                                                                    break;
                                                                }
                                                            }
                                                        }

                                                        function isUpdateChecked($menu_array,$row_menu){
                                                            foreach($menu_array as $arr){
                                                                if($arr['menu_id'] == $row_menu->id){
                                                                    if($arr['update']==1){
                                                                            return "checked";
                                                                    }
                                                                    break;
                                                                }
                                                            }
                                                        }

                                                        function isDeleteChecked($menu_array,$row_menu){
                                                            foreach($menu_array as $arr){
                                                                if($arr['menu_id'] == $row_menu->id){
                                                                    if($arr['delete']==1){
                                                                            return "checked";
                                                                    }
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        @endphp
                                                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Menu</th>
                                                                    <th>Sub Menu</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php $a = 0; @endphp
                                                                @foreach($access_menu_parent as $row_parent)
                                                                <tr>
                                                                    <td>
                                                                        <div class="icheck-primary d-inline">
                                                                            <input type="checkbox" name="checkboxPrimary[]" id="checkboxPrimary{{ $a }}" value="{{ $row_parent->id }}">
                                                                            <label for="checkboxPrimary{{ $a }}">
                                                                                <h4>{{ $row_parent->nama_menu }}</h4>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <table class="table table-bordered">
                                                                            <tbody>
                                                                                @php
                                                                                    $z = 0;
                                                                                    $i = 1;
                                                                                    $count_user_access = 1;
                                                                                    $if_check_all = null;
                                                                                @endphp
                                                                                @foreach($access_menu as $row_menu)
                                                                                @php
                                                                                $arr = array_filter($menu_array,function($ar) use($row_menu){
                                                                                    return $ar['menu_id'] == $row_menu->id;
                                                                                });
                                                                                $checkedCreate = "";
                                                                                @endphp
                                                                                    @if($row_parent->id == $row_menu->menu_parent_id)
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="icheck-primary d-inline pl-5 col-md-4">
                                                                                                    <input type="checkbox" class="menuParent{{ $a }}" data-createId="checkbox{{ $a }}MenuCreate{{ $i }}" data-updateId="checkbox{{ $a }}MenuUpdate{{ $i }}" data-deleteId="checkbox{{ $a }}MenuDelete{{ $i }}" id="checkbox{{ $a }}Menu{{ $i }}" name="menuParent[]" value="{{ $row_menu->id }}" {{ count($arr) > 0 ? 'checked' : '' }}>
                                                                                                    <label for="checkbox{{ $a }}Menu{{ $i }}">
                                                                                                        <h5>{{ $row_menu->nama_menu }}</h5>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="icheck-primary d-inline pl-5">
                                                                                                    <input type="checkbox" class="menuParentCreate{{ $a }}" id="checkbox{{ $a }}MenuCreate{{ $i }}" name="menuParentCreate[]" value="1" {{ isCreateChecked($menu_array,$row_menu) }}>
                                                                                                    <label for="checkbox{{ $a }}MenuCreate{{ $i }}">
                                                                                                        Create
                                                                                                    </label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="icheck-primary d-inline pl-5">
                                                                                                    <input type="checkbox" class="menuParentUpdate{{ $a }}" id="checkbox{{ $a }}MenuUpdate{{ $i }}" name="menuParentUpdate[]" value="1" {{ isUpdateChecked($menu_array,$row_menu) }}>
                                                                                                    <label for="checkbox{{ $a }}MenuUpdate{{ $i }}">
                                                                                                        Update
                                                                                                    </label>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="icheck-primary d-inline pl-5">
                                                                                                    <input type="checkbox" class="menuParentDelete{{ $a }}" id="checkbox{{ $a }}MenuDelete{{ $i }}" name="menuParentDelete[]" value="1" {{ isDeleteChecked($menu_array,$row_menu) }}>
                                                                                                    <label for="checkbox{{ $a }}MenuDelete{{ $i }}">
                                                                                                        Delete
                                                                                                    </label>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @php
                                                                                            $z++;
                                                                                            $i++;
                                                                                            if(count($arr) > 0){ 
                                                                                                $count_user_access++;
                                                                                            }
                                                                                        @endphp
                                                                                    @endif          
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
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
                                <div class="tab-pane fade" id="custom-tab-one-access-authority" role="tabpanel" aria-labelledby="custom-tab-one-access-authority-tab">
                                    <div class="col-12">
                                            <form method="post" id="form_user_authority" class="form-horizontal">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="mb-6">
                                                        <div class="form-group row">
                                                            <label for="inputClientName" class="col-sm-2 col-form-label">Client Name</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" name="client_name" id="client_name" value="{{ isset($authority_client_per_project->client_name) ? $authority_client_per_project->client_name : "" }}" readonly>
                                                                <input type="hidden" class="form-control" name="client_id" id="client_id" value="{{ isset($authority_client_per_project->client_id) ? $authority_client_per_project->client_id : "" }}" readonly>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="choiceProject" class="col-form-label col-sm-2">Project</label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control select2" name="project_code" id="project_code" multiple="multiple" style="width:100%">
                                                                    {{-- <option value="{{ isset($authority_client_per_project->project_code) ? $authority_client_per_project->project_code : "" }}" selected>{{ isset($authority_client_per_project->project_name) ? $authority_client_per_project->project_name : "" }}</option> --}}
                                                                </select>
                                                                <input type="hidden" name="project_code_text" id="project_code_text">
                                                            </div>
                                                        </div>
                                                        <div class="div_region row  d-flex justify-content-center">
                    
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
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
            _token: '{{csrf_token()}}',
            
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
    var dataAuthLocation = [];
    var project = "{{ $project }}";
    var arr_project = project.split(",");
    $('#project_code_text').val(arr_project);
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/project/getProjectToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "client_id":$('#client_id').val(),
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success:function(data){
            $('.tb_sub_area > tbody').empty();
            $('select#project_code option').remove();
            var inputProject = "";
            $.each(data,function(i,item){
                
                $('select#project_code').append($('<option>',{
                    text:data[i].project_name,
                    value:data[i].project_code
                }));

                var res_project = arr_project.filter(function(item){
                    if(item == data[i].project_code){
                        inputProject +=data[i].project_code+",";
                    }
                    return item == data[i].project_code;
                });
            });
           
        }
    });
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/getDataRegionToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "project_code":arr_project,
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success:function(data){
            $('.div_location').remove();
            var region = "";
            $.each(data,function(i,item){
                region = "<div class=\"card card-info card-outline col-3  div_location mr-2\">"+
                            "<div class=\"card-header text-left\">"+
                                "<div class=\"custom-control custom-checkbox\">"+
                                    "<input class=\"custom-control-input\" type=\"checkbox\" id=\"region"+i+"\" name=\"region[]\">"+
                                    "<label for=\"region"+i+"\" class=\"custom-control-label\"><h5 class=\"card-title\">Region "+data[i].region_name+"</h5></label></div>"+
                            "</div>"+
                            "<div class=\"card-body\" id=\"div_location"+i+"\"></div></div>";
                $('.div_region').append(region);
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:"/getUserAuthorityLocationToSelectedByRegion",
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        'user_id':{{ $role->id }},
                        "region_id":data[i].id,
                        _token: '{{csrf_token()}}',
                    },
                    processData:true,
                    success:function(dataUserAuth){
                        $.each(dataUserAuth,function(i,item){
                            dataAuthLocation.push({ location_id:dataUserAuth[i]['id']});
                        });
                    }
                });
                
                $.ajax({
                    headers:{
                        'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
                    },
                    url:"/location/getDataLocationToSelected",
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        "region_id":data[i].id,
                        _token: '{{csrf_token()}}',
                    },
                    processData:true,
                    success:function(data_location){
                        var location="";
                        $.each(data_location,function(a,item){
                            var locchecked = dataAuthLocation.filter(function(item){ return item['location_id'] == data_location[a].id });
                            // console.log(locchecked.length);
                            if(locchecked.length > 0){
                                var is_checked = "checked"
                            }else{
                                var is_checked = ""
                            }
                            location ="<div class=\"custom-control custom-checkbox\">"+
                            "<input class=\"custom-control-input region"+i+"\" type=\"checkbox\" id=\"region"+i+"location"+a+"\" name=\"location[]\" value='"+data_location[a].id+"'"+is_checked+">"+
                            "<label for=\"region"+i+"location"+a+"\" class=\"custom-control-label\">"+data_location[a].location_name+"</label>"+
                            "</div>";
                            $('#div_location'+i).append(location);
                            if($('.region'+i).not(':checked').length > 0){
                                $('#region'+i).prop('checked',false);
                            }else{
                                $('#region'+i).prop('checked',true);
                            }
                        });
                    }
                });
                $('#region'+i).on('click',function(){
                    if($('#region'+i).is(':checked')){
                        $('.region'+i).prop('checked',true);
                    }else{
                        $('.region'+i).prop('checked',false);
                    }
                });
                
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
                const menu = [];
                $('input[name="menuParent[]"]:checked').each(function(){
                    var getDataCreateCB = $(this).attr('data-createId');
                    var getDataUpdateCB = $(this).attr('data-updateId');
                    var getDataDeleteCB = $(this).attr('data-deleteId');
                    var isCreateChecked = $('#'+getDataCreateCB).is(':checked') ? 1 : 0;
                    var isUpdateChecked = $('#'+getDataUpdateCB).is(':checked') ? 1 : 0;
                    var isDeleteChecked = $('#'+getDataDeleteCB).is(':checked') ? 1 : 0;
                    // menuParent.push(
                    //     $(this).val()
                    // );
                    menu.push({
                        'menu_id'   : $(this).val(),
                        'create' : isCreateChecked,
                        'update' : isUpdateChecked,
                        'delete' : isDeleteChecked
                    });
                });
                console.log(menu);
                formData.append('menu',menu);
                formData.append('user_id',param[5]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                    url:'/users/set_user_access_previlage',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        'menu':menu,
                        'user_id':param[5],
                        _token: '{{csrf_token()}}',
                    },
                    processData:true,
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

$(document).on('change','#project_code',function(){
    $('.div_location').remove();
    $.ajax({
        headers:{
            'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
        },
        url:"/region/getDataRegionToSelected",
        type:"POST",
        dataType:"JSON",
        data:{
            "project_code":$('#project_code').val(),
            _token: '{{csrf_token()}}',
        },
        processData:true,
        success:function(data){
            // $('.div_location').remove();
            var region = "";
            $.each(data,function(i,item){
                region = "<div class=\"card card-info card-outline col-3  div_location mr-2\">"+
                            "<div class=\"card-header text-left\">"+
                                "<div class=\"custom-control custom-checkbox\">"+
                                    "<input class=\"custom-control-input\" type=\"checkbox\" id=\"region"+i+"\" name=\"region[]\">"+
                                    "<label for=\"region"+i+"\" class=\"custom-control-label\"><h5 class=\"card-title\">Region "+data[i].region_name+"</h5></label></div>"+
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
                        _token: '{{csrf_token()}}',
                    },
                    processData:true,
                    success:function(data_location){
                        var location="";
                        $.each(data_location,function(a,item){
                            location ="<div class=\"custom-control custom-checkbox\">"+
                            "<input class=\"custom-control-input region"+i+"\" type=\"checkbox\" id=\"region"+i+"location"+a+"\" name=\"location[]\" value='"+data_location[a].id+"'>"+
                            "<label for=\"region"+i+"location"+a+"\" class=\"custom-control-label\">"+data_location[a].location_name+"</label>"+
                            "</div>";
                            $('#div_location'+i).append(location);

                            $('#region'+i+'location'+a).on('click',function(){
                                if($('.region'+i).not(':checked').length > 0){
                                    $('#region'+i).prop('checked',false);
                                }else{
                                    $('#region'+i).prop('checked',true);
                                }
                            });
                        });
                    }
                });
                $('#region'+i).on('click',function(){
                    if($('#region'+i).is(':checked')){
                        $('.region'+i).prop('checked',true);
                    }else{
                        $('.region'+i).prop('checked',false);
                    }
                });
                
            });
        }
    });
});


// $('#btn_submit_authority').click(function(e){
//     var url = window.location.href;
//     var param = url.split('/');
//     e.preventDefault();
//     var formData = new FormData();
//     formData.append('company',$('#company').val());
//     formData.append('user_id',param[5]);
//     $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
//             },
//             url:'/users/set_user_access_authority/',
//             type: 'POST',
//             dataType: 'JSON',
//             data: formData,
//             processData:false,
//             contentType:false,
//             success: function(data){
//                 if(data.error == 1){
//                     Toast.fire({
//                         icon: 'error',
//                         title: 'Warning!'
//                     })
//                 }else{
//                     Swal.fire({
//                         title: data.title,
//                         html : data.message,
//                         icon : data.icon,
//                         showConfirmButton: false
//                     });
//                     setTimeout(() => {
//                         window.location.href = data.redirect
//                     }, 1500);
                    
//                 }
//         }
//     });
// });
$(document).ready(function(){
    $('#form_user_authority').validate({
        rules:{
            client_name:{
                required:true
            },
            project_code:{
                required:true
            }
        },
        messages:{
            client_name:{
                required:"Please select client"
            },
            project_code:{
                required:"Please select project"
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
            var location = new Array();
            $('input[name^="location[]"]:checked').each(function(){
                location.push({
                    'location_id':$(this).val()
                });
            });

            $.ajax({
                headers:
                {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url:"/users/setUserAccessAuthority",
                type:"POST",
                data:{
                    'user_id':{{ $role->id }},
                    'location':location,
                    _token: '{{csrf_token()}}',
                },
                dataType:"JSON",
                processData:true,
                success:function(data){
                    Swal.fire({
                        title:data.title,
                        html:data.message,
                        icon:data.icon
                    });
                }
            });
        }
    });
});
</script>
@endsection