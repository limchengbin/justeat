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
            }

            #edit-btn{
                background-color: rgba(0,0,0,0.5); /* Green */
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
                max-width: 200px;
                white-space: normal;
            }

            #edit-btn:hover{
                background-color: #ff0000;
            }

            .profile-post{
                margin-top: 50px;
            }
            
            .post{
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <?php include 'include/navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4 profile-pic">
                    <img class="img-circle profile-pic" src="img/1.jpg">
                </div>
                <div class="col-md-8 col-xs-8 col-lg-8 col-sm-8 username">
                    <h3 style="font-family: cursive; font-weight: bold;">Jin</h3>
                    <br>
                    <h4 class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit adipisicing elit</h4>
                    <h5 class="pull-right" style="font-weight: bold;">80 Posts</h5>
                </div>
            </div>
            <hr>
            <div class="container profile-post">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 post">
                        <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 post">
                        <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 post">
                        <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 post">
                        <img class="img-responsive" src="http://placehold.it/400x300" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
