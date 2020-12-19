<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "../dbConfig.php";
        session_start();
        $db = OpenCon();

        $username = $_POST["username"];
        $password = $_POST["password"];
        date_default_timezone_set("Asia/Amman");

        $select = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";
        
        $query = mysqli_query($db,  $select);

         $rows = mysqli_num_rows($query);
 
         if($rows != 1){
            date_default_timezone_set("Asia/Amman");
            $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
                ) VALUES ( 0 , 'LOGIN_FAILD_No_ONE' , '".date('Y-m-d h:i:s')."');";
            if (mysqli_query($db,  $Insert_User_Event)){
            } 
             header('Content-Type: application/json');
            echo json_encode(array('isLoggedIn' => 'false'));
            CloseCon($db);
            exit;}
        $Array_data=$query->fetch_assoc ();

        if($Array_data["password"]==$password){

            date_default_timezone_set("Asia/Amman");
            $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
                ) VALUES (".$Array_data['id']." , 'LOGIN_SUCCESS' , '".date('Y-m-d h:i:s')."');";

            if (mysqli_query($db,  $Insert_User_Event)){
            }

            $_SESSION["adminID"]=$Array_data["id"];
           
            
            header('Content-Type: application/json');
            echo json_encode(array('isLoggedIn' => 'true'));
            CloseCon($db);
            exit;
            
        }else{

            date_default_timezone_set("Asia/Amman");
            $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
                ) VALUES (".$Array_data['id']." , 'LOGIN_FAILD' , '".date('Y-m-d h:i:s')."');";

            if (mysqli_query($db,  $Insert_User_Event)){
            } 
            header('Content-Type: application/json');
            echo json_encode(array('isLoggedIn' => 'false'));
            CloseCon($db);
            exit;
        }

        CloseCon($db);}
?>