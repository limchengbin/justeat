<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('database.php');


$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);


$query3 = "SELECT * FROM users where email = :email";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":email", $email);
$statement3->execute();
$list2 = $statement3->fetchAll();
$statement3->closeCursor();


if (!empty($list2)) {
    if (password_verify($password, $list2[0][2])) {
        $_SESSION['user'] = $list2[0][1];
        $_SESSION['name'] = $list2[0][3];
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $list2[0][0];
        $_SESSION['error_message'] = "";
        header('location: ../home.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Username or Password is incorrect";
        header('location: ../index.php');
    }
} else {
    $_SESSION['error_message'] = "Nothing Found";
    header('location: ../index.php');
}