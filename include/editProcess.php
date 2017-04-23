<?php

require_once 'database.php';

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$confirmPass = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_STRING);
$personalText = filter_input(INPUT_POST, "about-you", FILTER_SANITIZE_STRING);
$pass = false;

echo $personalText;

if ($password != $confirmPass) {
    $_SESSION['error_message'] = "Both Password Must Match";
    header('location: ../edit.php');
    exit();
}


$p1 = '/[A-Z]/';

$p2 = '/[a-z]/';

$p3 = '/[0-9]/';

$p4 = '/!#$%^&*{}()<.>]/';



$length = strlen($password);

if ($length < 8) {
    $_SESSION['error_message'] = "Password must more than 8 characters";
    header('location: ../edit.php');
    exit();
}


if (!preg_match($p1, $password) || !preg_match($p2, $password) || !preg_match($p3, $password)) {
    $_SESSION['error_message'] = "Password must have at least 1 uppercase,lowercase letter and at 1 number";

    header('location: ../edit.php');
    exit();
} else {
    $pass = true;
    $_SESSION['error_message'] = "";
}


if (preg_match($p4, $password)) {
    $error_message = "Password cannot contain any of the following symbols : /!#$%^&*{}()<.>]/";
    $pass = false;
   header('location: ../edit.php');
    exit();
} else {
    $pass = true;
    $_SESSION['error_message'] = "";
}


if ($pass) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    $queryEdit = "UPDATE users SET password= :password, username= :username, name= :name, personalText = :personalText  WHERE email = :email";
    $statementEdit = $db->prepare($queryEdit);
    $statementEdit->bindValue(":email", $_SESSION['email']);
    $statementEdit->bindValue(":password", $hashed_password);
    $statementEdit->bindValue(":username", $username);
    $statementEdit->bindValue(":name", $name);
    $statementEdit->bindValue(":personalText", $personalText);
    $statementEdit->execute();
    $statementEdit->closeCursor();
    
    $_SESSION['error_message']="";  
    header("location: ../profile.php");
    exit();
}