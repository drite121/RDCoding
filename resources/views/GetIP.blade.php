@extends('layouts.app')
@section('content')
    <script>
        fetch("https://api.geoapify.com/v1/ipinfo?apiKey=zOFUEXHa97bLwtaSF6Ap")
        .then(response => response.json())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
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
