<?php 
    session_start();
   
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Food-in</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/index.css" rel="stylesheet" type="text/css"/>

            <!-- Custom CSS -->
            <link href="css/stylish-portfolio.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>

        <!-- Header -->
        <header id="top" class="header">
            <div class="text-vertical-center">
                <h1><img class="bounce" src="img/logo2.png" alt=""/></h1>
                <h1 class="title">Food-in</h1>
                <div class="modal-dialog">
                    <div class="loginmodal-container">
                        <form id="login-form" method="post" action="include/loginProcess.php">
                            <input type="text" name="email" id="email" placeholder="Email Address">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <?php  if(isset($_SESSION['error_message'])){echo $_SESSION['error_message'];} ?>
                            <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                            <center>via</center>
                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                        </form>
                        <br>
                        <div class="login-help">
                            <a href="register.php">Register</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
    </body>

</html>
<?php 
$_SESSION['error_message'] = "";