<?php 
    include '../dbConfig.php';
    session_start();
    if(!isset($_SESSION["adminID"])){
        header("Location: login.php");
        exit;
      }
    $db=openCon();
    $id=$_GET['id'];
    $update=" UPDATE user set is_active =1 where id = $id" ;
    $query= mysqli_query($db , $update);
    if( $query){
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

    CloseCon($db);
?>