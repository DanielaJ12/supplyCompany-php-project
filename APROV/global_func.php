<?php
    function ifnull($x, $y){

        if($x != $y && $x != '') {
            echo "<br>- For update :: <u>$y</u> -> <b>$x</b><br>";
        }

        if($x == ''){
            return $y;
        } else {
            return $x;
        }
    }
?>