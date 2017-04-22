<?php 
 require_once('../include/getComment.php');
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
        <?php
            echo $photo['name']."<br>";
            echo $photo['likeAmount'] ."<br>";
            for($x = 0 ; $x<sizeof($comments);$x++){
                echo $array[$x]['name'] . ":  " . $result[$x] ."<br>";
            }
            
        ?>
    </body>
</html>
