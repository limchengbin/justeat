<?php

require_once("database.php");

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$confirmPass = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$pass = false;


if ($password != $confirmPass) {
    $_SESSION['error_message'] = "Both Password Must Match";
    header('location: ../register.php');
    exit();
}


$p1 = '/[A-Z]/';

$p2 = '/[a-z]/';

$p3 = '/[0-9]/';

$p4 = '/!#$%^&*{}()<.>]/';



$length = strlen($password);

if ($length < 8) {
    $_SESSION['error_message'] = "Password must more than 8 characters";
    header('location: ../register.php');
    exit();
}


if (!preg_match($p1, $password) || !preg_match($p2, $password) || !preg_match($p3, $password)) {
    $_SESSION['error_message'] = "Password must have at least 1 uppercase,lowercase letter and at 1 number";

    header('location: ../register.php');
    exit();
} else {
    $pass = true;
    $_SESSION['error_message'] = "";
}


if (preg_match($p4, $password)) {
    $error_message = "Password cannot contain any of the following symbols : /!#$%^&*{}()<.>]/";
    $pass = false;
   header('location: ../register.php');
    exit();
} else {
    $pass = true;
    $_SESSION['error_message'] = "";
}

$email_val = "/@/";
try {
    if (!preg_match($email_val, $email)) {
        $_SESSION['error_message'] = "Please input a valid email address";
        $pass = false;
        header('location: ../register.php');
        exit();
    } else {
        $pass = true;
        $_SESSION['error_message'] = "";
    }
} catch (Exception $ex) {
    $_SESSION['error_message'] = $ex->getMessage();
    die;
    exit();
}


$query2 = "SELECT * FROM users where username = :username";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":username", $username);
$statement2->execute();
$list = $statement2->fetchAll();
$statement2->closeCursor();

$query3 = "SELECT * FROM users where email = :email";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":email", $email);
$statement3->execute();
$list2 = $statement3->fetchAll();
$statement3->closeCursor();


if (!empty($list2)) {
    $_SESSION['error_message'] = "email had been used";
    $pass = false;
    header('location: ../register.php');
    exit();
} else {
    $pass = true;
   $_SESSION['error_message'] = "";
}

if (!empty($list)) {
    $_SESSION['error_message'] = "username had been used";
    $pass = false;
    header('location: ../register.php');
    exit();
} else {
    $pass = true;
   $_SESSION['error_message'] = "";
}


if ($pass) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO users (username,email,password,name) VALUES (:username , :email , :password ,:name) ";
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $hashed_password);
    $statement->bindValue(":name", $name);
    $statement->execute();
    $statement->closeCursor();

    $_SESSION['user'] = $username;
    $_SESSION['name'] = $name ;
    $_SESSION['email'] = $email;
    $_SESSION['error_message']="";  
    header("location: ../home.php");
    exit();
}

