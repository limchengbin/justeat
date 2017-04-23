<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('database.php');


$tag = $_GET['tag'];



$query1 = "SELECT * from photos";
$statement1 = $db->prepare($query1);
$statement1->execute();
$photo = $statement1->fetchAll();
$statement1->closeCursor();

$result = array();
$x = 0 ;
for($i = 0 ; $i<sizeof($photo) ; $i++){
    if(strpos($photo[$i]['hashtag'], $tag) !== false ){
        $result[$x] = $photo[$i];
        $x++;
    }
}

