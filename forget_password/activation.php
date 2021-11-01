<?php
    session_start();
        if(empty($_SESSION['changepass'])){
            // $code = md5(uniqid(rand(), true));
            // $email = $_SESSION['changepass'];

            // include '../reuse/config.php';
            
            // $sql = "UPDATE db_users SET user_code = '$code' WHERE user_email = $email";

            // $result = mysqli_query($conn,$sql);
            
            // mysqli_close($conn);

            // header("Location:../password_change/send_activation.php");
            $_SESSION['changepass'] = array("email" => $_GET['email'], "code" => $_GET['code']);
            header("Location:index.php");
        }
        // }else{
        //     $_SESSION['changepass'] = array("email" => $_GET['email'], "code" => $_GET['code']);
        //     print_r($_SESSION['changepass']);
        //     // header("Location:index.php");
        // }
?>