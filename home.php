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

        <title>Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min1.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .post-container{
                background-color: #e6e6e6;
            }

            .user{
                
            }

            .user-pic{
                padding-top: 5px;
                padding-bottom: 5px;
                width: 50px;
                display: inline-block;
            }
            
            .username{
                padding-top: 15px;
                display: inline-block;
            }
            
            .location{
                padding-top: 20px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <?php include 'include/navbar.php' ?>
        <div class="container big-container">
            <div class="col-md-6 col-md-offset-3 col-xs-12 post-container">
                <div class="row user">
                    <div class="col-md-2 col-xs-3 user-pic">
                        <img class="img-circle user-pic" src="img/1.jpg">
                    </div>
                    <div class="col-md-6 col-xs-4 username">
                        <h4 style="font-family: cursive; font-weight: bold;">Jin</h4>
                    </div>
                    <div class="col-md-4 col-xs-5 location">
                        <h5 class="pull-right" style="font-weight: bold;"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;ireland</h5>
                    </div>
                </div>
                <div class="img-container">
                    <img src="img/bg.jpg" alt="" class="img-responsive"/>
                </div>
            </div>       
        </div>
    </body>
</html>
