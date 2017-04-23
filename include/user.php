<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("database.php");

if(isset($_SESSION['email'])) {
    $query1 = "SELECT * from users where email = :email";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(":email", $_SESSION['email']);
    $statement1->execute();
    $user = $statement1->fetch();
    $statement1->closeCursor();
    
}
