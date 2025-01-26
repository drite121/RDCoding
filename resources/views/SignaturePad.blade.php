@extends('layouts.app')
@section('content')
    <script src="{{ asset('js/signature_pad.umd.min.js') }}"></script>
    <script>
        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        }

        $(function () {
        var wrapper = document.getElementById("signature-pad"),
            clearButton = wrapper.querySelector("[data-action=clear]"),
            saveButton = wrapper.querySelector("[data-action=save]"),
            canvas = wrapper.querySelector("canvas"),
            signaturePad;

        window.resizeCanvas = function () {
            var ratio =  window.devicePixelRatio || 1;
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

        resizeCanvas();

        signaturePad = new SignaturePad(canvas);

        clearButton.addEventListener("click", function(event) {
            signaturePad.clear();
        });

        saveButton.addEventListener("click", function(event) {
            event.preventDefault();

                if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
                } else {
                var dataUrl = signaturePad.toDataURL();

                downloadURI(dataUrl, "signature.png");
                }
            });
        });
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Signature Pad</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <div id="signature-pad" class="m-signature-pad">
                                        <div class="m-signature-pad--body">
                                            <canvas style="border: 2px dashed #ccc;width: 100%;height:250px"></canvas>
                                        </div>

                                        <div class="m-signature-pad--footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-action="clear">Clear</button>
                                            <button type="button" class="btn btn-sm btn-primary" data-action="save">Save</button>
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <P>Source:
                                    <br>
                                    <a href="https://github.com/szimek/signature_pad">Signatur Pad Data</a>
                                    <br>
                                    <a href="https://jsfiddle.net/aq9Laaew/56575/">jsfiddle.net</a>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
