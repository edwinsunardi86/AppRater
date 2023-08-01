@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Management Fee - Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Management Fee</a></li>
                    <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputClientName" class="col-sm-3 col-form-label">Client Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" name="client_name" id="client_name" readonly>
                                    <input type="hidden" class="form-control form-control-sm" name="client_id" id="client_id" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="projectName" class="col-sm-3 col-form-label">Project Name</label>
                                <div class="col-sm-3">
                                    <select name="project_code" id="project_code" class="form-control form-control-sm select2"></select>
                                </div>
                            </div>
                            <button data-toggle="modal" data-target="#modal-location" class="btn btn-block bg-gradient-primary col-md-2"><i class="fas fa-user-plus"></i>Add Location</button>
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
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-location">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:scroll">
                <div class="table-responsive">
                    <table id="table_location" class="diplay table table-bordered table-striped table-hover" style="width:70%">
                        <thead>
                            <tr>
                                <th><div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary_all">
                                    <label for="checkboxPrimary_all">
                                    </label>
                                  </div></th>
                                <th>Location Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$(document).on('change','#project_code', function(){
    $('#modal-location').on('shown.bs.modal',function(){
        var i = 1;
        var table_location = $('#table_location').DataTable({
            processing:false,
            serverSide:false,
            // destroy:true,
            // autoWidth: true,
            ajax:{
                headers:{
                    'X_CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
                },
                type:'POST',
                dataType:'JSON',
                url:'{!! route("data_location_to_selected:dt") !!}',
                processData:true,
                data:{
                    'project_code':$('#project_code').val()
                }
            },
            columns:[
                { data: 'action', width:"5%", name: 'action'},
                { data: 'location_name', name: 'location_name' },
                { data: 'description', name: 'description' }
            ],
        });

        $(document).on('click','#checkboxPrimary_all',function(){
            var checkbox_all = document.getElementById('checkboxPrimary_all');
            if(checkbox_all.checked == true){
                alert('all');
            }else{
                alert('not');
            }
            var data = table_location.row(0).data();
            var cb_location = table_location.rows().nodes().to$().find('input[name="cb_location[]"]:checked').each(function(){
                if($(this).is(':checked')){
                    alert('test');
                }
            });
            // console.log(data);
            console.log(cb_location.length);
        });
    });
    // table_location.columns.adjust();
})

</script>
@endsection