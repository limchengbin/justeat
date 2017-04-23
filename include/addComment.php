<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * 
 * 
 */
require_once('database.php');

$comment = $_POST['comment'];
$userID = $_POST['userID'];
$pic = $_POST['pic'];



$query2 = "INSERT INTO comments (userID,photoID,comments) VALUES (:userID,:photoID,:comments);";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":userID", $userID);
$statement2->bindValue(":photoID", $pic);
$statement2->bindValue(":comments", $comment);
$statement2->execute();
$statement2->closeCursor();

header('location: ../post.php?id='.$pic);
