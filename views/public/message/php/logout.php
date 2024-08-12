<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE messaging_users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                
                header("Location: ../../Alumni_dash.php");  
                
            }
        }else{
            header("Location: ../../users.php"); 
            
        }
    }else{  
        header("Location: ../../Alumni_dash.php");  
       
    }
?>
