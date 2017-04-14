<?php
require_once('database.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];

$query1 = "SELECT * from photos where id = :id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id",$id);
$statement1->execute();
$photo = $statement1->fetch();
$statement1->closeCursor();

$query = "SELECT * from comments WHERE photoID = :id ";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$comments = $statement->fetchAll();
$statement->closeCursor();


$array = array();
$x = 0 ;
foreach ($comments as $list) {
    $query2 = "Select username from users where id = :id";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":id",$list['userID']);
    $statement2->execute();
    $array[$x] = $statement2->fetch();
    $statement2->closeCursor();
    $x++;
}
 