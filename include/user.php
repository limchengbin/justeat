<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("database.php");

$query1 = "SELECT * from users";
$statement1 = $db->prepare($query1);
$statement1->execute();
$photos = $statement1->fetchAll();
$statement1->closeCursor();

