<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$userID = $_POST['id'];
$pic = $_POST['pic'];   


$_SESSION['userID'] = $userID;
$_SESSION['pic'] = $pic;



echo "<form method='post' action='include/addComment.php'>
<input type='text' name='comment' id='comment'>
<input type='hidden' name='userID' id='userID' value='". $_SESSION['userID']."'>
<input type='hidden' name='pic' id='pic' value='".$_SESSION['pic']."'>
</form>";