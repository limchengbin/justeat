<?php

require_once("database.php");

$query1 = "SELECT * from photos";
$statement1 = $db->prepare($query1);
$statement1->execute();
$photos = $statement1->fetchAll();
$statement1->closeCursor();
