<?php 
    include '../dbConfig.php';
    session_start();
    if(!isset($_SESSION["adminID"])){
        header("Location: login.php");
        exit;
      }
    $db=openCon();
    $id=$_GET['id'];

    $code =  sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) 
        );

    $insert = "INSERT INTO activation_code (code,generatedFor,isUsed) VALUES ('$code',$id,false)";

    $query= mysqli_query($db , $insert);
    if( $query){
        date_default_timezone_set("Asia/Amman");
        $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
            ) VALUES ( ".$_SESSION["adminID"].", 'GENEREATE_ACTIVATION_CODE_FOR_USER_".$id."' , '".date('Y-m-d h:i:s')."');";
        if (mysqli_query($db,  $Insert_User_Event)){
            header('Content-Type: application/json');
            echo json_encode(array('is_generated' => 1));
            CloseCon($db);
            exit;
        } 
    }else{
        header('Content-Type: application/json');
            echo json_encode(array('is_generated' => 0));
            CloseCon($db);
            exit;
    }

    CloseCon($db);
?>