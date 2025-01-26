@extends('layouts.app')
@section('content')
    
    <link href="{{ asset('css/DropZone.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Eye Droper</h2>
                        <br>
                        <div class="align-items-center">
                        <div class="drop-zone">
                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                            <input type="file" name="myFile" class="drop-zone__input">
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary btn-block" id="start-button">Start</button>
                        <br>
                        <p id="result"></p>
                        <br>
                        <P>Source & Tutorial:
                            <br>
                            <a href="https://codepen.io/dcode-software/pen/xxwpLQo">Drag and Drop Img</a><br>
                            <a href="https://developer.mozilla.org/en-US/docs/Web/API/EyeDropper">Eye Droper</a>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/DropZone.js') }}"></script>
    <script>
        document.getElementById("start-button").addEventListener("click", () => {
        const resultElement = document.getElementById("result");

        if (!window.EyeDropper) {
            resultElement.textContent =
            "Your browser does not support the EyeDropper API";
            return;
        }

        const eyeDropper = new EyeDropper();

        eyeDropper
            .open()
            .then((result) => {
            resultElement.textContent = result.sRGBHex;
            resultElement.style.backgroundColor = result.sRGBHex;
            })
            .catch((e) => {
            resultElement.textContent = e;
            });
        });
    </script>
@endsection
