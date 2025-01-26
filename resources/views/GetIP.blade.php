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
    #info {
        height: 252px;
    }
    </style>
    <script>
        $(document).ready(()=>{
            $.getJSON("https://api.ipify.org?format=json",
            function (data) {
                $("#IPv4").html(data.ip);
            })
        });
        $(document).ready(()=>{
            $.getJSON("https://api6.ipify.org?format=json",
            function (data) {
                $("#IPv6").html(data.ip);
            })
        });
    </script>
    

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Get IP</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-6 p-0">     
                                    <div class="border border-dark p-3" id="info">
                                        <p>Your IP is:</p>
                                        <div class="border border-dark pl-3">
                                            <label for="IPv4">IPv4: </label>
                                            <br><label id="IPv4"></label>
                                        </div>
                                        <br>
                                        <div class="border border-dark pl-3">
                                            <label for="IPv6">IPv6: </label>
                                            <br><label id="IPv6"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="border border-dark">
                                        <div id="map"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">     
                                    <div class="border border-dark p-3">
                                        <p>Your IP Info:</p>
                                        <div class="border border-dark pl-3">
                                            <label for="Latitude">Latitude: </label>
                                            <label id="Latitude"></label>
                                            <label for="Longitude">Longitude: </label>
                                            <label id="Longitude"></label>
                                        </div>
                                        <br>
                                        <div class="border border-dark pl-3">
                                            <label for="Location">Location: </label>
                                            <label id="Location"></label>
                                        </div>
                                    </div>
                                </div>
                                <P>Source:
                                    <br>
                                    <a href="https://www.geoapify.com/">Location: Geoapify API</a>
                                    <br>
                                    <a href="https://www.ipify.org/">IP info: Ipify</a>
                                    <br>
                                    <a href="https://leafletjs.com/">Map: Leafletjs</a>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dataLat;
        var dataLong;
        fetch("https://api.geoapify.com/v1/ipinfo?apiKey=d9a5174132b24b1aba0c071e3d5190fc")
        .then(response => response.json())
        .then(result => {
            console.log(result)
            $("#Latitude").html(result.location.latitude);
            $("#Longitude").html(result.location.longitude);
            $("#Location").html(result.city.name+', '+result.country.name);
            var map = L.map('map').setView([result.location.latitude, result.location.longitude], 10);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        })
        .catch(error => console.log('error', error));
    </script>
@endsection
