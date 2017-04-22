<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Google Map</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        
        <style>
            #mapDiv{
                height: 500px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <div class="container">
            <div class="img-responsive" id="mapDiv"></div>
        </div>

        <!-- Google Map API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3GNUNqilg3CdYIedKxEY5zgCl4p7xp-4"></script>

        <script type="text/javascript">
            var CONTENT = 0;
            var LATITUDE = 1;
            var LONGITUDE = 2;
            var locations = [['DkIT', 53.98485693, -6.39410164]];

            var dkit_map = new google.maps.Map(document.getElementById('mapDiv'),
                    {zoom: 12,
                        center: new google.maps.LatLng(53.98485693, -6.39410164),
                        mapTypeId: google.maps.MapTypeId.ROADMAP});

            var location_marker;
            var mapWindow = new google.maps.InfoWindow();

            for (var i = 0; i < locations.length; i++)
            {
                location_marker = new google.maps.Marker({position: new google.maps.LatLng(locations[i][LATITUDE], locations[i][LONGITUDE]),
                    map: dkit_map});

                google.maps.event.addListener(location_marker, 'click', (function (location_marker, i)
                {
                    return function ()
                    {
                        mapWindow.setContent(locations[i][CONTENT]);
                        mapWindow.open(dkit_map, location_marker);
                    }
                })(location_marker, i));
            }
        </script>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
