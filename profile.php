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

        <title>Profile</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        
        <style>
            .profile-pic{
                max-width: 100%;
                height: auto;
                background-color: yellow;
            }
            
            .username{
                background-color: blue;
            }
        </style>
    </head>
    <body>
        <?php include 'include/navbar.php'?>
        <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 profile-pic">
                        <img class="img-circle profile-pic" src="img/1.jpg">
                    </div>
                    <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 username">
                        <h4 style="font-family: cursive; font-weight: bold;">Jin</h4>
                    </div>
                    <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 location">
                        <h5 class="pull-right" style="font-weight: bold;"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;ireland</h5>
                    </div>
                </div>
            </div>
    </body>
</html>
