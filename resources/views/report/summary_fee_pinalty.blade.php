@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Summary Pinalty Fee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item active">Summary Pinalty Fee</li>
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
                            <h3 class="card-title">Report Summary Pinalty Fee</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="convert_to_pdf" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="inputClientName" class="col-sm-3 col-form-label">Client Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm" name="client_name" id="client_name" readonly>
                                                <input type="hidden" class="form-control form-control-sm" name="client_id" id="client_id" readonly>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-xl">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="projectName" class="col-sm-3 col-form-label">Project Name</label>
                                            <div class="col-sm-9">
                                                <select name="project_code" id="project_code" class="form-control form-control-sm select2"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group row">
                                    <label for="service" class="col-form-label col-sm-2">Service</label>
                                    <div class="col-sm-3">
                                        <select name="service" id="service" class="form-control form-control-sm">
                                            <option value="">PILIH</option>
                                            @foreach($service as $row)
                                                <option value="{{ $row->service_code }}">{{ $row->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 form-group row">
                                    <label for="year_project" class="col-form-label col-sm-2">Year</label>
                                    <div class="col-sm-3">
                                        <select name="year_project" id="year_project" class="form-control form-control-sm">
                                            <option value="">PILIH</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="overflow:auto">
                                    <table id="table_summary_fee" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>Location Name</td>
                                                <td>Service</td>
                                                <td>Jan</td>
                                                <td>Feb</td>
                                                <td>Mar</td>    
                                                <td>Apr</td>
                                                <td>May</td>
                                                <td>Jun</td>
                                                <td>Jul</td>
                                                <td>Aug</td>
                                                <td>Sep</td>
                                                <td>Oct</td>
                                                <td>Nov</td>
                                                <td>Dec</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">Download</button>
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
<script>
$(document).ready(function(){
    var i = 1;
    var tb_client = $('#table_client').DataTable({
    processing:true,
    serverSide:true,
    destroy: true,
    ajax:'{!! route("data_client_to_selected:dt") !!}',
    columns:[
        { data:i, name: i, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
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
});

$(document).on('change','#year_project',function(){
    var data_row = "";
    if($('#year_project').val()!=""){
        $.ajax({
            headers:{
                'X_CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            url:"/report/getDataSummaryFeePinalty",
            dataType:"JSON",
            type:"POST",
            data:{
                project_code:$('#project_code').val(),
                year_project:$('#year_project').val(),
                "service_code":$("#service").val(),
                _token: '{{csrf_token()}}',
            },
            processData:true,
            success:function(data){
                let IDRupiah = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                });
                $('#table_summary_fee > tbody').empty();
                var sum_jan = 0;
                var sum_feb = 0;
                var sum_mar = 0;
                var sum_apr = 0;
                var sum_may = 0;
                var sum_jun = 0;
                var sum_jul = 0;
                var sum_aug = 0;
                var sum_sep = 0;
                var sum_oct = 0;
                var sum_nov = 0;
                var sum_dec = 0;
                $.each(data,function(i,item){
                    sum_jan += data[i].amount_pinalty_jan;
                    sum_feb += data[i].amount_pinalty_feb;
                    sum_mar += data[i].amount_pinalty_mar;
                    sum_apr += data[i].amount_pinalty_apr;
                    sum_may += data[i].amount_pinalty_may;
                    sum_jun += data[i].amount_pinalty_jun;
                    sum_jul += data[i].amount_pinalty_jul;
                    sum_aug += data[i].amount_pinalty_aug;
                    sum_sep += data[i].amount_pinalty_sep;
                    sum_oct += data[i].amount_pinalty_oct;
                    sum_nov += data[i].amount_pinalty_nov;
                    sum_dec += data[i].amount_pinalty_dec;
                    var amount_pinalty_jan = data[i].amount_pinalty_jan === null ? "" : data[i].amount_pinalty_jan.toFixed(2);
                    var amount_pinalty_feb = data[i].amount_pinalty_feb === null ? "" : data[i].amount_pinalty_feb.toFixed(2);
                    var amount_pinalty_mar = data[i].amount_pinalty_mar === null ? "" : data[i].amount_pinalty_mar.toFixed(2);
                    var amount_pinalty_apr = data[i].amount_pinalty_apr === null ? "" : data[i].amount_pinalty_apr.toFixed(2);
                    var amount_pinalty_may = data[i].amount_pinalty_may === null ? "" : data[i].amount_pinalty_may.toFixed(2);
                    var amount_pinalty_jun = data[i].amount_pinalty_jun === null ? "" : data[i].amount_pinalty_jun.toFixed(2);
                    var amount_pinalty_jul = data[i].amount_pinalty_jul === null ? "" : data[i].amount_pinalty_jul.toFixed(2);
                    var amount_pinalty_aug = data[i].amount_pinalty_aug === null ? "" : data[i].amount_pinalty_aug.toFixed(2);
                    var amount_pinalty_sep = data[i].amount_pinalty_sep === null ? "" : data[i].amount_pinalty_sep.toFixed(2);
                    var amount_pinalty_oct = data[i].amount_pinalty_oct === null ? "" : data[i].amount_pinalty_oct.toFixed(2);
                    var amount_pinalty_nov = data[i].amount_pinalty_nov === null ? "" : data[i].amount_pinalty_nov.toFixed(2);
                    var amount_pinalty_dec = data[i].amount_pinalty_dec === null ? "" : data[i].amount_pinalty_dec.toFixed(2);

                    data_row += "<tr><td>"+data[i].location_name+"</td><td>"+data[i].service_code+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_jan)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_feb)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_mar)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_apr)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_may)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_jun)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_jul)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_aug)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_sep)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_oct)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_nov)+"</td>"+
                    "<td>"+IDRupiah.format(amount_pinalty_dec)+"</td>"+
                    "</tr>"
                });
                data_row += "<tr>"+
                    "<td colspan=\"2\">Total</td>"+
                    "<td>"+IDRupiah.format(sum_jan.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_feb.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_mar.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_apr.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_may.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_jun.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_jul.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_aug.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_sep.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_oct.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_nov.toFixed(2))+"</td>"+
                    "<td>"+IDRupiah.format(sum_dec.toFixed(2))+"</td>"+
                    "</tr>"; 
                $("#table_summary_fee").append(data_row);
            }
        });
    }
});

$(document).ready(function(){
    $('#convert_to_pdf').validate({
        rules:{
            project_code:{
                required:true
            },
            year_project:{
                required:true
            },
            service:{
                required:true
            }
        },
        messages:{
            project_code:{
                required:"Please input project name"
            },
            year_project:{
                required:"Please input Year Rate SLA"
            },
            service:{
                required:"Please input service"
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
            $.ajax({
                headers:{
                    'X_CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                url:'/report/exportDataSummaryFeePinalty',
                type:'post',
                processData:true,
                data:{
                    'project_code':$('#project_code').val(),
                    'year_project':$('#year_project').val(),
                    'service'     :$('#service').val(),
                    _token: '{{csrf_token()}}'
                },
                xhrFields:{
                    responseType:'arraybuffer'
                },
                error: function(blob){
                    console.log(blob);
                }
            }).done(function (data, status, xmlHeaderRequest) {
                    var downloadLink = document.createElement('a');
                    var blob = new Blob([data],
                        {
                            type: xmlHeaderRequest.getResponseHeader('Content-Type')
                        });
                    var url = window.URL || window.webkitURL;
                    var downloadUrl = url.createObjectURL(blob);
                    var fileName = '';

                  

                    if (typeof window.navigator.msSaveBlob !== 'undefined') {
                        window.navigator.msSaveBlob(blob, fileName);
                    } else {
                        if (fileName) {
                            if (typeof downloadLink.download === 'undefined') {
                                window.location = downloadUrl;
                            } else {
                                downloadLink.href = downloadUrl;
                                downloadLink.download = fileName;
                                document.body.appendChild(downloadLink);
                                downloadLink.click();
                            }
                        } else {
                            window.location = downloadUrl;
                        }

                        setTimeout(function () {
                            url.revokeObjectURL(downloadUrl);
                        },
                    100);
                }
            });
        }
    });
});
</script>
@endsection
