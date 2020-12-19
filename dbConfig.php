<?php
function OpenCon(){
    $dbhost = "160.153.235.28";
    $dbuser = "fivedpro_website";
    $dbpass = "Goingtotheworld-2021";
    $db = "fivedpro_main";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
    }

function CloseCon($conn){
    $conn -> close();
    }

?>