<?php
    
        include "../dbConfig.php";
        session_start();
        $db = OpenCon();
        date_default_timezone_set("Asia/Amman");
        $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
            ) VALUES (".$_SESSION['adminID']." , 'LOGOUT' , '".date('Y-m-d h:i:s')."');";

        if (mysqli_query($db,  $Insert_User_Event)){
        } 
        unset($_SESSION['adminID']);
        header('Location: ../login.php')
        ?>
