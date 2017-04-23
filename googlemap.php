<?php
require_once('include/getLocation.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Places Searchbox</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 70%;
            }

            #walking{
                height: 15px;
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container img-responsive" id="map"></div>
        <input id="pac-input" class="controls" type="hidden" placeholder="Search Box">
        <br>

        <button class="visible-xs-inline-block visible-sm-inline-block"><i class="fa fa-car" onclick="travelMode = 'DRIVING';calculateRoute()"></i></button>
        <button class="visible-xs-inline-block visible-sm-inline-block"><i class="fa fa-subway" onclick="travelMode = 'TRANSIT';calculateRoute()"></i></button>
        <button class="visible-xs-inline-block visible-sm-inline-block"><i class="fa fa-bicycle" onclick="travelMode = 'BICYCLING';calculateRoute()"></i></button>
        <button class="visible-xs-inline-block visible-sm-inline-block"><i class="" onclick="travelMode = 'WALKING';calculateRoute()"><img id="walking" src="img/walking.png" alt=""/></i></button>

        <br><br>
        <details class="container visible-xs-inline-block visible-sm-inline-block"><summary>Directions</summary>
            <div class="col-md-12 visible-xs-inline-block visible-sm-inline-block" id="directions"></div>
        </details>


        <script>
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            function initAutocomplete() {
                var latt = <?php echo $location['lattitude'] ?>;
                var long = <?php echo $location['longtitude'] ?>;
                if (latt === 0) {
                    latt = -33.8688;
                }
                if (long === 0) {
                    long = 151.2195;
                }

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: latt, lng: long},
                    zoom: 18,
                    mapTypeId: 'roadmap'
                });

                // Create a marker for each place.
                var location = new google.maps.LatLng(latt, long);
                var markerImage = 'img/map-icon.png';
                var marker = new google.maps.Marker({
                    map: map,
                    icon: markerImage,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(latt, long),
                    visible: true
                });

                marker.setMap(map);

                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function () {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function () {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function (marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }


                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
            }

            function calculateRoute()
            {
                var start = document.getElementById('start').value;
                var end = document.getElementById('end').value;

                var request = {origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode[travelMode]};

                directionsService.route(request, function (response, status)
                {
                    if (status == google.maps.DirectionsStatus.OK)
                    {
                        directionsDisplay.setDirections(response);
                    }
                });
            }


        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPg0ETIZ5yEVLUw7ibbiKcnOJuTkr_wAA&libraries=places&callback=initAutocomplete"
        async defer></script>
    </body>
</html>
