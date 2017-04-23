<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('database.php');


$id = $_GET['id'];

$query1 = "SELECT checkIn,lattitude,longtitude from photos where id = :id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $id);
$statement1->execute();
$location = $statement1->fetch();
$statement1->closeCursor();
