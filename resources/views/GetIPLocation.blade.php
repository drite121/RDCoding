@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <style>
    #map {
        height: 250px;
    }
    </style>
    

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Signature Pad</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-6">     
                                    <div id="map"></div>
                                </div>
                                <div class="col-md-6">

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
    <script>
        // fetch("https://api.geoapify.com/v1/ipinfo?apiKey=d9a5174132b24b1aba0c071e3d5190fc")
        // .then(response => response.json())
        // .then(result => console.log(result))
        // .catch(error => console.log('error', error));
        var map = L.map('map').setView([-7.2484, 112.7419], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
@endsection
