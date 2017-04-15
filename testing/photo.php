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
        <iframe src="https://www.facebook.com/plugins/registration?
                client_id=***************&
                redirect_uri=http://localhost/index.php/register/do_register/&
                fields=[
                {'name':'name'},
                {'name':'email'},
                {'name':'location'},
                {'name':'gender'},
                {'name':'birthday'},
                {'name':'password'},
                {'name':'occupation','description':'General Occupation','type':'select','options':{'Artist':'Artist','Dancer':'Dancer','Manager':'Manager','Musician':'Musician','Photographer':'Photographer','Venue':'Venue'}},
                {'name':'akID[9][value]','description':'Receive private messages','type':'checkbox','default':'checked'},
                {'name':'akID[10][value]','description':'Send me email notifications when I receive a private message','type':'checkbox','default':'checked'},
                {'name':'captcha'}]"
                scrolling="auto"
                frameborder="no"
                style="border:none"
                allowTransparency="true"
                width="100%"
                height="100%">
        </iframe>
    </body>
</html>
