<?php
require_once('include/hashtagPost.php');
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

        <title>HashTag</title>

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

            .img1{
                max-width: 100%;
                max-height: 100%;
            }
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-8 col-lg-8 col-sm-8 username">
                    <h3 style="font-family: cursive; font-weight: bold;"><?php echo "#" . $_GET['hashtag'] ?></h3>
                </div>
            </div>
            <hr>
            <div class="container profile-post">
                <div class="row">

                    <?php if (!empty($result)) {
                        foreach ($result as $hashtag): ?>
                            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 post">

                                

                                <a href=<?php echo "'post.php?id=" . $hashtag['id'] . "'" ?> ><img class="img-responsive visible-xs" src="<?php echo "'img/" . $hashtag['name'] . "'" ?>" alt="" style="width: 100%; height: 165px;"></a>
                                <a href=<?php echo "'post.php?id=" . $hashtag['id'] . "'" ?> ><img class="img-responsive visible-sm" src="<?php echo "'img/" . $hashtag['name'] . "'" ?>" alt="" style="width: 100%; height: 165px;"></a>
                                <a href=<?php echo "'post.php?id=" . $hashtag['id'] . "'" ?> ><img class="img-responsive visible-md" src="<?php echo "'img/" . $hashtag['name'] . "'" ?>" alt="" style="width: 100%; height: 270px;"></a>
                                <a href=<?php echo "'post.php?id=" . $hashtag['id'] . "'" ?> ><img class="img-responsive visible-lg" src="<?php echo "'img/" . $hashtag['name'] . "'" ?>" alt="" style="width: 100%; height: 270px;"></a>


                            </div>
                        <?php
                        endforeach;
                    }else {
                        echo "no picture with this hashtag";
                    }
                    ?>

                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
