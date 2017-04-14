<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $input = "chi ni #chini jin yi #jinyi jia yi #jiayi desmond #desmond bin #bin chi yen #chiyen dfghj#fgbh";
        $array = explode(" ", $input);
        $hashtag = array();
        
        echo $input ;

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


        $print = $input;
        for ($x = 0; $x < sizeof($hashtag); $x++) {
            $word = "#" . $hashtag[$x];
            $replace = "<a href=index.php?hashtag=" . $hashtag[$x] . ">#" . $hashtag[$x] . "<a>";
            $print = str_replace($word, $replace, $print);
        }

        echo '<br><br>' . $print;
        ?>


    </body>
</html>
