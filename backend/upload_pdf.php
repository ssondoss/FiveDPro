<?php
    // Functions

    function generateRandomString() {
        $length = 40;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
<?php 
    include '../dbConfig.php';
    session_start();
    if(!isset($_SESSION["adminID"])){
        header("Location: login.php");
        exit;
      }
    $db=openCon();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST["title"];
        $level = $_POST["level"];
        $pdf = $_FILES["pdf"];
    
        $isValid = true;

        if(isset($pdf) && $_FILES["pdf"]["error"] == 0){
            $allowed = array("pdf" => "application/pdf");
            $filename = $_FILES["pdf"]["name"];
            $filetype = $_FILES["pdf"]["type"];
            $filesize = $_FILES["pdf"]["size"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("");
        
            // Verify file size - 100MB maximum
            $maxsize = 100 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
                if(file_exists("pdf/" . $filename)){
                    echo $filename . " is already exists.";
                    $isValid = false;
                } else{
                    $temp = explode(".", $_FILES["pdf"]["name"]);
                    $newFilename = generateRandomString() . '.' . end($temp);
                    move_uploaded_file($_FILES["pdf"]["tmp_name"], "pdf/" . $newFilename);
                
                }
            } else{
                $isValid = false;
                echo "Error: There was a problem uploading your file. Please try again.";
            }
        } else{
            $isValid = false;
            echo "Error: " . $_FILES["pdf"]["error"];
        }
    }

    if($isValid){
        $insert = "INSERT INTO pdf_products (pdf,title,level) values ('$newFilename','$title',$level)";
        if(mysqli_query($db,  $insert)){
            date_default_timezone_set("Asia/Amman");
            $Insert_User_Event = "INSERT INTO admin_event (admin , event ,  time
                ) VALUES ( ".$_SESSION["adminID"].", 'ADD_PDF_PRODUCT_".$newFilename."' , '".date('Y-m-d h:i:s')."');";
            if (mysqli_query($db,  $Insert_User_Event)){
                header('Content-Type: application/json');
                echo json_encode(array('uploaded' => 1));
                CloseCon($db);
                exit;
            }else{
                header('Content-Type: application/json');
                echo json_encode(array('uploaded' => 0));
                CloseCon($db);
                exit;
            }
        }
    }else{
        header('Content-Type: application/json');
        echo json_encode(array('uploaded' => 0));
        CloseCon($db);
        exit;
    }

    CloseCon($db);
?>

