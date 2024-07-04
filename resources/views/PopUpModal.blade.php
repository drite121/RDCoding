@extends('layouts.app')
@section('content')
@include('modalTest')
    
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
                <div class="bg-white border">
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
@endsection
