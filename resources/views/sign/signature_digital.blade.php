@extends('layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Signature</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active">Signature</li>
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
                            <h3 class="card-title">Form Signature Digital</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="form_signature" class="form-horizontal">
                                <div class="row p-10">
                                    <canvas id="signature-pad" class="signature-pad">
                                        Your browser does not support the HTML canvas tag.
                                    </canvas>
                                </div>
                                <div class="row inline">
                                    <div class="col col-sm justify-content-md-center pt-3">
                                        <center>
                                            
                                        </center>
                                        <!-- tombol undo  -->
                                        <center><button type="button" class="btn btn-dark" id="undo">
                                            <span class="fas fa-undo"></span>
                                            Undo
                                        </button>
                                        </center>
                                    </div>
                                    <div class="col col-sm justify-content-md-center pt-3">
                                        <!-- tombol hapus tanda tangan  -->
                                      <center><button type="button" class="btn btn-danger" id="clear">
                                        <span class="fas fa-eraser"></span>
                                        Clear
                                        </button></center>
                                    </div>
                                    <div class="col col-sm justify-content-md-center pt-3">
                                        <!-- tombol submit  -->
                                      <center><button type="submit" class="btn btn-primary" id="submit">
                                        <span class="fas fa-submit"></span>
                                        Submit
                                        </button></center>
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
    $('#form_signature').submit(function(e){
        e.preventDefault();
        var signature = signaturePad.toDataURL();
        console.log(signature);
    });
});
</script>
@endsection