@extends('layouts.app')
@section('content')
    <script>

    function generate() {
        $.ajax({
            type: "GET",
            url: '{{url("GenerateBarcode")}}',
            data: { 
                "text": $('#TextItem').val(),
            },
            success: function(result) {
                $("#result").html(result);
                
            },
            error: function(result) {
                alert('Maaf Proses Generate ERROR, Harap Hub Dev');
            }
        });
            document.getElementById("download").style.display = "block";
        
    };

    function download() {
        window.open("{{url('DownloadBarcode')}}?text="+$('#TextItem').val(),
         "_blank");

    };
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Barcode Generator</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <label for="TextItem" class="text-center">Text</label>
                                    <input type="text"  class="form-control" id="TextItem" maxlength="9">
                                    
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <br>
                                <button type="button" class="btn btn-primary btn-block" id="generate" onclick="generate()">Generate</button>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>

                                <div class="col-md-6">
                                    <br>
                                    <p class="text-center" id="result"></p>
                                    <button type="submit" class="btn btn-primary btn-block" id="download" onclick="download()" style="display:none;" target="_blank">Download</button>
                                    <br>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>

                        <P>Source:
                            <br>
                            <a href="https://magecomp.com/blog/generate-barcode-laravel-10/">Barcode Generator Tutorial</a>
                            <br>
                            <a href="https://github.com/picqer/php-barcode-generator">Barcode Generator Documentation</a>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
