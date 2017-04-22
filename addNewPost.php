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

        <title>New Post</title>

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
        <?php include 'navbar.php' ?>

        <section id="portfolio" class="bg-light-gray">
            <div class="section-content">
                <h1 class="section-header"></h1>
            </div>
            <div class="contact-section">
                <div class="container">
                    <form id="register-form" method="post" action="">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-xs-12">
                                <div class="form-group">
                                    
                                </div>
                                <div class="form-group">
                                    <textarea rows="4" type="text" class="form-control" id="about-you" name="about-you" placeholder="Write a caption..." value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress" class="form-title">Check-in</label>
                                    <input id="user_input_autocomplete_address" name="user_input_autocomplete_address" class="form-control" placeholder="Location">
                                </div>	
                                <div>
                                    <center>
                                        <button type="button" id="register_button" class="button submit">Post</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&type=restaurant&amp;key=AIzaSyDRSAJSb7N61y_TZCgOu1cRWmq7iPCYBLc"></script>
        <script src="js/autocomplete.js" type="text/javascript"></script>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>


