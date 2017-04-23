<?php
require_once('include/photo.php');
if (!isset($_SESSION['name'])) {
    header('location: index.php');
}

$query10 = "SELECT * from users where email = :email";
$statement10 = $db->prepare($query10);
$statement10->bindValue(":email", $_SESSION['email']);
$statement10->execute();
$user = $statement10->fetch();
$statement10->closeCursor();

$userID = $user['id'];
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

        <title>Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
        <link href="css/home.css" rel="stylesheet" type="text/css"/>

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
    <body>
        <?php include 'navbar.php' ?>
        <div class="container big-container">
            <div class="col-md-6 col-md-offset-3 col-xs-12 add-post">
                <a href="addNewPost.php" style="color: black;"><h5 class="glyphicon glyphicon-plus" style="font-family: cursive; font-weight: bold; padding: 12px 36px;">&nbsp;Add New Post</h5></a>
            </div>
            <?php
            $a = 0;
            foreach ($photos as $pic):
                ?>
                <div class="col-md-6 col-md-offset-3 col-xs-12 post-container" id=<?php $pic['id'] ?>>
                    <div class="row user">
                        <div class="col-md-2 col-xs-3 user-pic" style="background-size:cover;">
                            <img class="img-circle user-pic" style="width: 50px; height: 60px;" src=<?php echo "'img/" . $profilePic[$a] . "'" ?>>
                        </div>
                        <div class="col-md-6 col-xs-4 username">
                            <h4 style="font-family: cursive; font-weight: bold;"><?php echo $name[$a] ?></h4>
                        </div>
                        <div class="col-md-4 col-xs-5 location">
                            <h5 class="pull-right" style="font-weight: bold;"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;<a href=<?php echo "'googlemap.php?id=" . $pic['id'] . "'" ?>><?php echo $pic['checkIn'] ?></a></h5>
                        </div>
                    </div>
                    <div class="img-container"> 
                        <a href= <?php echo "'post.php?id=" . $pic['id'] . "'" ?>><img src=<?php echo '"img/' . $pic['name'] . '"' ?> alt="" class="img-responsive"/></a>
                    </div>
                    <br>
                    <div class="col-md-12 col-xs-12 caption-container">
                        <p class="caption"><?php echo $caption[$a] ?></p>
                    </div>
                    <div class="col-md-12 col-xs-12 comments-container">
                        <h5 class="title">Comments:</h5>
                        <?php
                        for ($kk = 0; $kk < 2; $kk++) {
                            if (!empty($username[$a][$kk]['name'])) {
                                echo "<div class='col-md-12 col-xs-12 comments'><label>";
                                echo $username[$a][$kk]['name'] . " : " . $realComments[$a][$kk];
                                echo '</label></div>';
                            }
                        }
                        ?>
                    </div>
                </div> 
                <?php
                $a++;
            endforeach;
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <
        </div>
    </body>
</html>
