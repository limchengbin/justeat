<?php


require_once("database.php");

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
$confirmPass = filter_input(INPUT_POST,"confirm-password",FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$pass = false;


$error_message = "";
$p1 = '/[A-Z]/';

$p2 = '/[a-z]/';

$p3 = '/[0-9]/';

$p4 = '/!#$%^&*{}()<.>]/';



$length = strlen($password);

if ($length < 6 || $length > 10) {
    $error_message = "Password can only have 6~10 length";
    include('register_fail.php');
    exit();
}


if (!preg_match($p1, $password) || !preg_match($p2, $password) || !preg_match($p3, $password)) {
    $error_message = "Password must have at least 1 uppercase,lowercase letter and at 1 number";

    include('register_fail.php');
    exit();
} else {
    $pass = true;
    $error_message = "";
}


if (preg_match($p4, $password)) {
    $error_message = "Password cannot contain any of the following symbols : /!#$%^&*{}()<.>]/";
    $pass = false;
    include('register_fail.php');
    exit();
} else {
    $pass = true;
    $error_message = "";
}

$email_val = "/@/";
try {
    if (!preg_match($email_val, $email)) {
        $error_message = "Please input a valid email address";
        $pass = false;
        include('register_fail.php');
        exit();
    } else {
        $pass = true;
        $error_message = "";
    }
} catch (Exception $ex) {
    $error_message = $ex->getMessage();die;
    exit();
}


$query2 = "SELECT * FROM customers where customersName = :username";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":username", $username);
$statement2->execute();
$list = $statement2->fetchAll();
$statement2->closeCursor();


if (!empty($list)) {
    $error_message = "username had been used";
    $pass = false;
    include('register_fail.php');
    exit();
} else {
    $pass = true;
    $error_message = "";
}


if ($pass) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO customers (customersName,email,password) VALUES (:username , :email , :password) ";
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $hashed_password);
    $statement->execute();
    $statement->closeCursor();

    $_SESSION['user'] = $username;
    header("location: ../registerSuccessful.php");
    exit();
}

