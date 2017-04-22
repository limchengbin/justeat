<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('database.php');

//$url = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$caption = filter_input(INPUT_POST, "about-you", FILTER_SANITIZE_STRING);
$checkIn = filter_input(INPUT_POST, "checkin" . FILTER_SANITIZE_STRING);

echo $caption;
echo $checkIn;

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

$insert = substr($insertHashtag,0,-1);
echo $insert;

$query = "Insert into photos (name,caption,checkIn,hashtag,userID) values (:name,:caption,:checkIn,:hashtag,:userID);" ;
$statement = $db->prepare($query);
$statement->bindValue(":name" , "image");
$statement->bindValue(":caption",$caption);
$statement->bindValue(":checkIn","zzz");
$statement->bindValue(":hashtag" , $insert);
$statement->bindValue(":userID" , 1);
$statement->execute();
$statement->closeCursor();

header('location: ../home.php');


