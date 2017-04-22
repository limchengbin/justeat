<?php
require_once("../include/photo.php");
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
        for ($x = 0; $x < sizeof($photos); $x++) {
            echo "<a href='comments.php?id=" . $photos[$x]['id'] . "'>" . $photos[$x]['name'];
            echo "<br>";
        }
        ?> 


        <br><br><br><br>
        
    </body>
</html>
