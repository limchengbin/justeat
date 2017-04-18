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

        <title>Sign up</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <style>
            .submit{
                background-color: rgba(0,0,0,0.7); /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .submit:hover{
                background-color: #ff0000;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="background-color: #fff; border-bottom-color: #f2f2f2;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="border-bottom-color: #f2f2f2;">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img id="navbar-logo" class="pull-left" src="img/logo2.png" alt=""/>
                    <a class="navbar-brand" href="index.php" id="title">Food-In</a>
                </div> 
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" id="title-right">
                        <li>
                            <a href="index.php"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp; Login</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <section id="portfolio" class="bg-light-gray">
            <div class="section-content">
                <h1 class="section-header"></h1>
            </div>
            <div class="contact-section">
                <div class="container">
                    <form id="register-form" method="post" action="include/registerProcess.php">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername" class="form-title">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder=" Enter username" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail" class="form-title">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder=" Enter Email Address" value="">
                                </div>	
                                <div class="form-group">
                                    <label for="exampleInputUsername" class="form-title">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder=" Enter Name" value="">
                                </div> 
                                <div class="form-group">
                                    <label for="password" class="form-title">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Not less than 8 characters, at least 1 integer,1 uppercase letter and 1 lower case" value="">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-title">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="" value="">
                                </div>
                                <div class="form-group">
                                    <label for ="gender" class="form-title">Gender</label>
                                    <select class="form-control" id="gender" name="gender"  value="<?php echo $gender; ?>">
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>
                                <div>
                                    <center>
                                        <button type="button" id="register_button" class="button submit">Sign up</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
