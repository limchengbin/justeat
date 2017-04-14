<?php
require_once('database.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET['id'];


$query1 = "SELECT * from photos where";
$statement1 = $db->prepare($query1);
$statement1->execute();
$photos = $statement1->fetchAll();
$statement1->closeCursor();
