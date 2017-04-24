<!DOCTYPE html>
<?php
require_once('include/selectedPic.php');

$query10 = "SELECT * from users where email = :email";
$statement10 = $db->prepare($query10);
$statement10->bindValue(":email", $_SESSION['email']);
$statement10->execute();
$user = $statement10->fetch();
$statement10->closeCursor();

$userID = $user['id'];
?>

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

        <title>Post</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link href="css/home.css" rel="stylesheet" type="text/css"/>

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
        <style>
            .delete{
                background-color: transparent;
                border: none;
                color: red;
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .delete:hover{
                color: black;
            }
            
            .big-container{
                padding-bottom: 50px; 
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <div class="container big-container">
            <div class="col-md-6 col-md-offset-3 col-xs-12 post-container">
                <div class="row user">
                    <div class="col-md-2 col-xs-3 user-pic">
                        <img class="img-circle user-pic" src=<?php echo"'img/". $poster['profilePic'] ."'" ?>>
                    </div>
                    <div class="col-md-6 col-xs-4 username">
                        <h4 style="font-family: cursive; font-weight: bold;"><?php echo $poster['name'] ?></h4>
                    </div>
                    <div class="col-md-4 col-xs-5 location">
                        <h5 class="pull-right" style="font-weight: bold;"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;<a href=<?php echo "'googlemap.php?id=" . $photos['id'] . "'" ?>><?php echo $photos['checkIn'] ?></a></h5>
                    </div>
                </div>
                <div class="img-container">
                    <img src=<?php echo "'img/" . $photos['name'] ."'" ?> alt="" class="img-responsive"/>
                </div>
                <br><form action=<?php echo "'include/deletePic.php?id=". $photos['id'] ."'" ?> method="post">
                <button class="delete pull-right"><i class="glyphicon glyphicon-trash"></i></button>
                </form>><br><br>
                <div class="col-md-12 col-xs-12 caption-container">
                    <p class="caption"><?php echo $photos['caption'] ?></p>
                </div>
                <div class="col-md-12 col-xs-12 comments-container">
                    <h5 class="title">Comments:</h5>

                    <?php
                    if (!empty($comments)) {
                        for ($x = 0; $x < sizeof($comments); $x++) {
                            $owner = false;
                            if ($comments[$x]['userID'] == $userID || $userID == $poster['id']) {
                                $owner = true;
                            }
                            echo '<div class="col-md-12 col-xs-12 comments">';
                            echo '<label>' . $array[$x]['name'] . ' : ' . $result[$x] . '</label>';
                            if ($owner) {
                                echo '<button onclick="deleteComment(' . $comments[$x]['id'] . ',' . $_GET['id'] . ')" class="pull-right"></button>';
                            }
                            echo '</div>';
                        }
                    }
                    ?>

                </div>
                <div class='comment'>
                    <a class="col-md-12 col-xs-12 fa fa-ellipsis-h" style="color: #000" onclick=<?php echo "'addComment(" . $userID . "," . $photos['id'] . ")'" ?>></a>
                </div>
                
            </div>  
        </div> 

        <!-- jQuery -->


        <!-- Bootstrap Core JavaScript -->
        <script src="js/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


        <script type="text/javascript">
            function deleteComment(id, pic) {
                $(document).ready(function () {
                    $.ajax({
                        url: "include/deleteComment.php",
                        type: "post",
                        data: {
                            id: id,
                            pic: pic
                        },
                        success: function (data) {
                            $(".comments-container").html(data);
                        }
                    });
                });
            }
            
            
            function addComment(id, pic) {
                    $(document).ready(function () {
                        $.ajax({
                            url: "include/chgHTML.php",
                            type: "post",
                            data: {
                                id: id,
                                pic: pic
                            },
                            success: function (data) {
                                $('.comment').replaceWith($('.comment').html(data));
                            }
                        });
                    });
                }
                
        </script>

    </body>
</html>
