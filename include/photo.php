<?php

require_once("database.php");



$query1 = "SELECT * from photos order by id DESC";
$statement1 = $db->prepare($query1);
$statement1->execute();
$photos = $statement1->fetchAll();
$statement1->closeCursor();


$profilePic = array();
$name = array();
$caption = array();
$comments = array();
$realComments = array();
$username = array();
$ID = 0;
$jump = 0;

foreach ($photos as $pic) {
    $query2 = "SELECT * from users where id = :id";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":id", $pic['userID']);
    $statement2->execute();
    $user = $statement2->fetch();
    $statement2->closeCursor();
    $profilePic[$ID] = $user['profilePic'];
    $name[$ID] = $user['name'];


    $array = explode(" ", $pic['caption']);
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


    $print = $pic['caption'];
    for ($x = 0; $x < sizeof($hashtag); $x++) {
        $word = "#" . $hashtag[$x];
        $replace = "<a href=index.php?hashtag=" . $hashtag[$x] . ">#" . $hashtag[$x] . "</a>";
        $print = str_replace($word, $replace, $print);
    }
    $caption[$ID] = $print;


    $query3 = "SELECT * from comments WHERE photoID = :id ";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":id", $pic['id']);
    $statement3->execute();
    $list = $statement3->fetchAll();
    $statement3->closeCursor();

    $add = 0;
    foreach ($list as $temp) {
        $query4 = "Select name from users where id = :id";
        $statement4 = $db->prepare($query2);
        $statement4->bindValue(":id", $temp['userID']);
        $statement4->execute();
        $username[$ID][$add] = $statement4->fetch();
        $comments[$ID][$add] = $temp['comments'];
        $statement4->closeCursor();
        $add++;
    }
    if (!empty($comments[$ID])) {
        $hehe = 0;
        foreach ($comments[$ID] as $process) {
            $comment = explode(" ", $process);
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


            $print = $process;
            for ($x = 0; $x < sizeof($hashtag); $x++) {
                $word = "#" . $hashtag[$x];
                $replace = "<a href=hashtag.php?hashtag=" . $hashtag[$x] . ">#" . $hashtag[$x] . "</a>";
                $print = str_replace($word, $replace, $print);
            }
            $realComments[$ID][$hehe] = $print;
            $hehe++;
        }
    }
    $ID++;
}
  