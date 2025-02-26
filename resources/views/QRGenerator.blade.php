@extends('layouts.app')
@section('content')
    <script>

    function generate() {
        const QRcolor =$('#QRColor').val();
        const QRr = parseInt(QRcolor.substr(1,2), 16);
        const QRg = parseInt(QRcolor.substr(3,2), 16);
        const QRb = parseInt(QRcolor.substr(5,2), 16);

        const BGcolor =$('#BGColor').val();
        const BGr = parseInt(BGcolor.substr(1,2), 16);
        const BGg = parseInt(BGcolor.substr(3,2), 16);
        const BGb = parseInt(BGcolor.substr(5,2), 16);

        $.ajax({
            type: "GET",
            url: '{{url("GenerateQR")}}',
            data: { 
                "text": $('#TextItem').val(),
                "QRCRed": QRr,
                "QRCGreen": QRg,
                "QRCBlue": QRb,
                "BGCRed": BGr,
                "BGCGreen": BGg,
                "BGCBlue": BGb,
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
        const QRcolor =$('#QRColor').val();
        const QRr = parseInt(QRcolor.substr(1,2), 16);
        const QRg = parseInt(QRcolor.substr(3,2), 16);
        const QRb = parseInt(QRcolor.substr(5,2), 16);

        const BGcolor =$('#BGColor').val();
        const BGr = parseInt(BGcolor.substr(1,2), 16);
        const BGg = parseInt(BGcolor.substr(3,2), 16);
        const BGb = parseInt(BGcolor.substr(5,2), 16);

        window.open("{{url('DownloadQR')}}?text="+$('#TextItem').val()+
        "&QRCRed="+QRr+"&QRCGreen="+QRg+"&QRCBlue="+QRb+"&BGCRed="+BGr+"&BGCGreen="+BGg+"&BGCBlue="+BGb,
         "_blank");

    };
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">QR generator</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <label for="TextItem" class="text-center">Text/URL</label>
                                    <input type="text" class="form-control" id="TextItem">
                                    <br>
                                    <label for="QRColor" class="text-center">QR Color</label>
                                    <input type="color" class="form-control" id="QRColor">
                                    <br>
                                    <label for="BGColor" class="text-center">Background Color</label>
                                    <input type="color" class="form-control" id="BGColor" value="#FFFFFF">
                                    <br>
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
                            <a href="https://harrk.dev/qr-code-generator-in-laravel-10-tutorial/">QR Code Generator Tutorial</a>
                            <br>
                            <a href="https://github.com/SimpleSoftwareIO/simple-qrcode/tree/develop/docs/en">QR Code Generator Documentation</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
