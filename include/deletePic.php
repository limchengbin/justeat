<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('database.php');

$id = $_GET['id'];


$query2 = "DELETE FROM comments where photoID = :id";
$statement2 = $db->prepare($query2);
$statement2-> bindValue(":id" ,$id);
$statement2->execute();
$statement2->closeCursor();


$query3 = "DELETE FROM photos where id= :id";
$statement3 = $db->prepare($query3);
$statement3-> bindValue(":id" ,$id);
$statement3->execute();
$statement3->closeCursor();

header("location: ../home.php");