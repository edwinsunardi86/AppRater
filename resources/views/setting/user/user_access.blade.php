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
                                        <label for="inputClient" class="col-form-label col-sm-2">Perusahaan/Client</label>
                                        <div class="col-sm-8">
                                          @php 
                                          $arr_authority = explode(",",$authority);
                                          $in_authority = array();
                                          @endphp
                                          <select class="form-control" id="company" name="company" data-placeholder="Select a Company" required>
                                                <option value="">Choice</option>
                                              @php
                                              foreach($arr_authority as $row){
                                                  array_push($in_authority,$row);
                                              }
                                              @endphp
                                              @foreach($company as $row)
                                                  <option value="{{ $row->id }}" {{ in_array($row->client_name,$in_authority) ? 'selected':''}}>{{ $row->client_name }}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="choiceProject" class="col-form-label col-sm-2">Project</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="project_code" id="project_code"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-project">

                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function(){
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

$(document).on('change','#project_code', function(){
    $.ajax({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
        },
        url:'/setup_project/getLocationSetupProject',
        type:'POST',
        dataType:'JSON',
        data:{
            project_code:$('#project_code').val()
        },
        processData:true,
        success:function(data){
            $('.card-project').empty();

            $.each(data,function(i,item){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
                    },
                    url:'/setup_project/getAreaSetupProject',
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        location_id:data[i].location_id
                    },
                    processData:true,
                    contentType:false,
                    success:function(data_area){
                        console.log(data_area);
                        $.each(data_area,function(a,item){
                            $("#card-location-"+data[i].location_id).closest(".card_area").append(data_area[a].area_name);
                            //$('.card-area').append(data_area[a].area_name);
                        });
                    }
                });
                var card_outline = "<div class=\"card card-primary card-outline\" id=\"card-location-"+data[i].location_id+"\">"+
                    "<div class=\"card-body\"\">"+
                    "<h5 class=\"card-title\" id=\"card-title"+data[i].location_id+"\">"+data[i].location_name+"</h5>"+
                    "<div class=\"card-area\"></div>"+
                    "<a href=\"#\" class=\"card-link\">Card link</a>"+
                    "<a href=\"#\" class=\"card-link\">Another link</a>"+
                    "</div>"+
                "</div>";
                $('.card-project').append(card_outline);
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