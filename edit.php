<?php
require_once("include/database.php");

$email = $_SESSION['email'];

$query1 = "SELECT * from users where email = :email";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(":email", $_SESSION['email']);
    $statement1->execute();
    $user = $statement1->fetchAll();
    $statement1->closeCursor();

foreach ($user as $u):
    $edit_password = $u['password'];
    $edit_confirmpassword = $u['password'];
    $edit_username = $u['username'];
    $edit_name = $u['name'];
    $edit_personalText = $u['personalText'];
endforeach;
?>
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

        <title>Edit Profile</title>

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
                    <form id="register-form" method="post" action="include/editProcess.php">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-xs-12">
                                <div style="background-color: red; color:white;text-align: center;font-family: roboto;"><?php echo $_SESSION['error_message']; ?></div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputUsername" class="form-title">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder=" Enter username" value="<?php echo $edit_username ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail" class="form-title">Email Address</label>
                                    <input disabled type="email" class="form-control" id="email" name="email" placeholder=" Enter Email Address" value="<?php echo $email ;?>">
                                </div>	
                                <div class="form-group">
                                    <label for="exampleInputUsername" class="form-title">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder=" Enter Name" value="<?php echo $edit_name ;?>">
                                </div> 
                                <div class="form-group">
                                    <label for="password" class="form-title">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Not less than 8 characters, at least 1 integer,1 uppercase letter and 1 lower case" value="<?php echo $edit_password ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-title">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="" value="<?php echo $edit_confirmpassword ;?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText" class="form-title">About you</label>
                                    <textarea rows="4" type="text" class="form-control" id="about-you" name="about-you" placeholder="Not more than 10 words" value="<?php echo $edit_personalText ;?>"></textarea>
                                </div>
                                <div>
                                    <center>
                                        <button type="submit" id="register_button" class="button submit">Edit</button>
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

