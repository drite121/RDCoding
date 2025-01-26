@extends('layouts.app')
@section('content')
    
    <script>
        $(function () {
            $('.ShowModal').on('click', function (e) {
                e.preventDefault();
                $('#modalTest').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                if($('#TextItem').val())
                {
                    $('#TheTittle').text("This is the text you have written");
                    $('#TheText').text($('#TextItem').val());
                }
                else
                {
                    $('#TheTittle').text("You didn't write anything");
                    $('#TheText').text("Textbox empty");
                }
            });
        });
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">PopUp Modal</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="TextItem" class="text-center">Type Text</label>
                        <input type="text" class="form-control" id="TextItem">
                        <br>
                        <button type="button" class="btn btn-primary btn-block ShowModal">Show</button>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalTest">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="TheTittle">This is the text you have written<h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="panel-body">
                    <form class="formPegawai" method="POST" enctype="multipart/form-data" action="" >
                        <div class="modal-body">
                            <p id="TheText"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
