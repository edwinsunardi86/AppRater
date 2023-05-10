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
                                <div class="row p-10 col-sm-4">
                                    <canvas id="signature-pad" class="signature-pad">
                                        Your browser does not support the HTML canvas tag.
                                    </canvas>
                                </div>
                                <div class="row inline col-sm-4">
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
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
                resizeCanvas();
            })
    
            //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 0.5, 0.5);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }
    
    
            var canvas = document.getElementById('signature-pad');
    
            //warna dasar signaturepad
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
    
            //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
            document.getElementById('clear').addEventListener('click', function () {
                signaturePad.clear();
            });
    
            //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
            document.getElementById('undo').addEventListener('click', function () {
                var data = signaturePad.toData();
      if (data) {
    data.pop(); // remove the last dot or line
    signaturePad.fromData(data);
    }
});
$(document).ready(function(){
    $('#form_signature').submit(function(e){
        e.preventDefault();
        var signature = signaturePad.toDataURL();
        $.ajax({
            headers:{
                'X_CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
            },
            url:'/sign/storeSignatureDigital',
            type:'POST',
            dataType:'JSON',
            data:{
                'signature':signature
            },
            processData:true,
            success:function(data){
                Swal.fire({
                    title:data.title,
                    html:data.message,
                    icon:data.icon
                });
                setTimeout(() => {
                        window.location.href=data.redirect;
                }, 1500);
            }
        });
    });
});
</script>
@endsection