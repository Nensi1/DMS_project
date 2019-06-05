@extends('layout')
@section('title','create')
@section('content')      

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                </div>
                <a href="inventory.createProduct">Create Product</a>
                <div id="map" class="map"></div>
            </div>
            
        </div>
   
            <!-- Make sure you put this AFTER Leaflet's CSS -->
            <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
            <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
            <script type='text/javascript' src='maps/markers.json'></script>
            <script type='text/javascript' src='maps/leaf-demo.js'></script>
            <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
            <script src="leaflet-routing-machine.js"></script>
    <script>
        //  var mymap = L.map('map').setView([51.505, -0.09], 13);
        // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
        // {
        //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        //     maxZoom: 18,
        //     id: 'mapbox.streets',
        //     accessToken: 'pk.eyJ1IjoibmVuc2kxIiwiYSI6ImNqdHJlbGZwdzBwYXY0ZW9jaGxuc3p2Z2UifQ.oBdlLR2_jD4doFIaDGqbcw'
        // }).addTo(mymap);
        // L.control.locate().addTo(map);
// Create variable to hold map element, give initial settings to map
// var map = L.map('map',{ center: [42.362432, -71.086086], zoom: 14});
// var map = L.map('map').setView([0, 0], 2);
// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
//     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
//     maxZoom: 18,
//     id: 'mapbox.streets',
//     accessToken: 'pk.eyJ1IjoibmVuc2kxIiwiYSI6ImNqdHJlbGZwdzBwYXY0ZW9jaGxuc3p2Z2UifQ.oBdlLR2_jD4doFIaDGqbcw'
// }).addTo(map);

// L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);
// var geocoder= L.Control.geocoder({
//     defaultMarkGeocode: false
//     })
//     .on('markgeocode', function(e) {
//         var bbox = e.geocode.bbox;
//         var poly = L.polygon([
//              bbox.getSouthEast(),
//              bbox.getNorthEast(),
//              bbox.getNorthWest(),
//              bbox.getSouthWest()
//         ]).addTo(map);
//         map.fitBounds(poly.getBounds());
//     })
//     .addTo(map);



// getContent() return peza/ you are here
// var newpopup = L.popup({ closeOnClick: false }).setContent("Peza");
// var myDataPoint = L.marker([41.2236165, 19.7307821]).addTo(map).bindPopup(newpopup);


//locate current position
// map.locate({setView: true, maxZoom: 16});

// function onLocationFound(e) {

//     L.marker(e.latlng).addTo(map).bindPopup("You are here").openPopup();

//     L.circle(e.latlng).addTo(map);
// }
// map.on('locationfound', onLocationFound);
// function onLocationError(e) {
//     alert(e.message);
// }
// map.on('locationerror', onLocationError);

// calculate route
// L.Routing.control({
//     waypoints: [
//         L.latLng(57.74, 11.94),
//         L.latLng(41.2236165, 19.7307821)
//     ],
//     routeWhileDragging: true
// }).addTo(map);

// pop up when clicked - where is destination?
// function createButton(label, container) {
//     var btn = L.DomUtil.create('button', '', container);
//     btn.setAttribute('type', 'button');
//     btn.innerHTML = label;
//     return btn;
// }

// map.on('click', function(e) {
//     var container = L.DomUtil.create('div'),
//         startBtn = createButton('Start from this location', container),
//         destBtn = createButton('Go to this location', container);

//     L.popup()
//         .setContent(container)
//         .setLatLng(e.latlng)
//         .openOn(map);
// });

//if past 5, don't locate
// var now = new Date();
// var time = now.getHours();
// if (time>=17){
//     stopLocate();
//     alert("User can't be tracked now");
// }

//geolocation address==> coordinates
// map.on('geosearch_showlocation', function (result) {
//     alert(result.x);
//     alert(result.y);
//     // L.marker([result.x, result.y]).addTo(map)
// });
 </script>
@endsection
