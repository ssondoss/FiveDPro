<?php 
    include '../dbConfig.php';
    session_start();
    if(!isset($_SESSION["adminID"])){
        header("Location: login.php");
        exit;
      }
    $db=openCon();
    $id=$_GET['id'];
    $update=" UPDATE user set is_active =0 , level = 1 , isScholarship = 1 where id = $id" ;
    $query= mysqli_query($db , $update);
    if( $query){
        date_default_timezone_set("Asia/Amman");
        $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
            ) VALUES ( ".$_SESSION["adminID"].", 'ACTIVATE_USER_".$id."' , '".date('Y-m-d h:i:s')."');";
        if (mysqli_query($db,  $Insert_User_Event)){
        } 

        $update_users_relation=" UPDATE users_relation set level = 1 where registered = $id" ;
        $query_users_relation= mysqli_query($db , $update_users_relation);
        if( $query_users_relation){
        header('Content-Type: application/json');
            echo json_encode(array('is_active' => 1));
            CloseCon($db);
            exit;
        }else{
            header('Content-Type: application/json');
                echo json_encode(array('is_active' => 0));
                CloseCon($db);
                exit;
        }
    }else{
        header('Content-Type: application/json');
            echo json_encode(array('is_active' => 0));
            CloseCon($db);
            exit;
    }

    CloseCon($db);
?>