<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];

$query1 = "SELECT * from photos where id = :id ";
$statement1 = $db->prepare($query1);
$statement1->execute();
$photos = $statement1->fetch();
$statement1->closeCursor(); 
 

$query2 = "SELECT * from users where id = :id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $photos['userID']);
$statement2->execute();
$user = $statement2->fetch();
$statement2->closeCursor();
