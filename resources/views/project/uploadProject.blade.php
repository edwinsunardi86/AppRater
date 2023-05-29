@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Upload Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active">Upload Project</li>
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
                                <h3 class="card-title">Form Upload Project</h3>
                            </div>
                            @csrf
                            <div class="card-body">
                                <form method="post" id="form_upload" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="form-group">
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" name="uploadFile" id="uploadFile">
                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" id="review" data-action-review = "0">Preview</button>
                                        <button type="submit" class="btn btn-primary" id="save" data-action-save = "1">Submit</button>
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
    bsCustomFileInput.init();

    $('#form_upload').validate({
        rules:{        
            uploadFile:{
                required:true,
                extension:"xls|xlsx|csv"
            },
        },
        messages:{
            uploadFile:{
                required: "Please Upload File Project",
                extension: "Upload with extension XLS or XLSX"
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
            $('#review').click(function(){
                $('#save').data('clicked',false);
                $(this).data('clicked',true);
            });

            $('#save').click(function(){
                $('#review').data('clicked',false);
                $(this).data('clicked',true);
            });
            var formData = new FormData();
            var yourArray = [];
            if($("#save").data('clicked')==true){
                formData.append('action',$('#save').data('action-save'));
            }else if($("#review").data('clicked')==true){
                formData.append('action',$('#review').data('action-review'));
            }

            formData.append('uploadFile',$('#uploadFile')[0].files[0]);
            formData.append('_token',$('meta[name=csrf-token]').attr('content'));
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:formData,
                url:"/project/uploadNewProject",
                processData:false,
                contentType:false,
                type:"POST",
                dataType:"JSON",
                success:function(data){
                    
                }
            });
        }
    });
});
</script>
@endsection