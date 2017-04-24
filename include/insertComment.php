<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('database.php');
require_once('user.php');
//$url = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$caption = filter_input(INPUT_POST, "about-you", FILTER_SANITIZE_STRING);
$checkIn = $_POST['user_input_autocomplete_address'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];



$insertHashtag = "";
$array = explode(" ", $caption);
$hashtag = array();



for ($x = 0; $x < sizeof($array); $x++) {
    $output = $array[$x];
    $length = strlen($output);
    $gg = array();
    $test = array();



    if (substr($output, 0, 1) != "#") {
        $gg = explode("#", $output);
        if (sizeof($gg) > 1) {
            for ($a = 1; $a < sizeof($gg); $a++) {
                $hashtag[] = $gg[$a];
            }
        }
    } else {

        $test = explode("#", $output);
        $size = sizeof($test);
        for ($y = 1; $y < $size; $y++) {
            $hashtag[] = $test[$y];
        }
    }
    unset($gg);
    unset($test);
}
for ($x = 0; $x < sizeof($hashtag); $x++) {
    $insertHashtag = $insertHashtag . $hashtag[$x] . ",";
}

$insert = substr($insertHashtag, 0, -1);
echo $insert;

//$target_dir = "img/postpic/";
//$target_file =  basename($_FILES["fileToUpload"]["name"]);
//$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
//$picName = $target_dir . $target_file;
//
//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$picName);

$target_dir = "../img/postpic/";
$filename = basename($_FILES['fileToUpload']['name']);
$target_file = $target_dir . $filename;

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$query = "Insert into photos (name,caption,checkIn,lattitude,longtitude,hashtag,userID) values (:name,:caption,:checkIn,:lattitude,:longtitude,:hashtag,:userID);";
$statement = $db->prepare($query);
$statement->bindValue(":name", $filename);
$statement->bindValue(":caption", $caption);
$statement->bindValue(":checkIn", $checkIn);
$statement->bindValue(":lattitude", $lat);
$statement->bindValue(":longtitude", $lng);
$statement->bindValue(":hashtag", $insert);
$statement->bindValue(":userID", $user['id']);
$statement->execute();
$statement->closeCursor();






header('location: ../home.php');


