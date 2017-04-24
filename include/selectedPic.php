<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('database.php');

$id = $_GET['id'];

$query1 = "SELECT * from photos where id = :id ";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $id);
$statement1->execute();
$photos = $statement1->fetch();
$statement1->closeCursor();


$array = explode(" ", $photos['caption']);
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


$caption = $photos['caption'];
for ($x = 0; $x < sizeof($hashtag); $x++) {
    $word = "#" . $hashtag[$x];
    $replace = "<a href=hashtag.php?hashtag=" . $hashtag[$x] . ">#" . $hashtag[$x] . "</a>";
    $caption = str_replace($word, $replace, $caption);
}




$query2 = "SELECT * from users where id = :id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $photos['userID']);
$statement2->execute();
$poster = $statement2->fetch();
$statement2->closeCursor();




$query = "SELECT * from comments WHERE photoID = :id ";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$comments = $statement->fetchAll();
$statement->closeCursor();

$array = array();
$a = 0;
foreach ($comments as $list) {
$query3 = "Select name from users where id = :id";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":id", $list['userID']);
$statement3->execute();
$array[$a] = $statement3->fetch();
$statement3->closeCursor();
$a++;
}

$result = array();

for ($b = 0; $b < sizeof($array); $b++) {
$comment = explode(" ", $comments[$b]['comments']);
$hashtag = array();

for ($x = 0; $x < sizeof($comment); $x++) {
$output = $comment[$x];
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


$print = $comments[$b]['comments'];
for ($x = 0; $x < sizeof($hashtag); $x++) {
$word = "#" . $hashtag[$x];
$replace = "<a href=hashtag.php?hashtag=" . $hashtag[$x] . ">#" . $hashtag[$x] . "</a>";
$print = str_replace($word, $replace, $print);
}


$result[$b] = $print;
}

