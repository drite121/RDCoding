@extends('layouts.app')
@section('content')
    
    <link href="{{ asset('css/DropZone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Palette.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Color Palette</h2>
                        <br>
                        <div class="align-items-center">
                        <div class="drop-zone">
                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                            <input type="file" name="myFile" class="drop-zone__input">
                        </div>
                        <canvas id="canvas" style="display:none"></canvas>
                        <br>
                        <h4 class="text-center">Palette</h4>
                        <div id="palette"></div>
                        <br>
                        <h4 class="text-center">Complementary</h4>
                        <div id="complementary"></div>
                        <br>
                        <P>Source & Tutorial:
                            <br>
                            <a href="https://codepen.io/dcode-software/pen/xxwpLQo">Drag and Drop Img</a>
                            <br>
                            <a href="https://github.com/zygisS22/color-palette-extraction/">Color Palette</a>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Palette.js') }}"></script>
    <script src="{{ asset('js/DropZone.js') }}"></script>
@endsection
