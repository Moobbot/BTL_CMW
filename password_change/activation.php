<?php
    session_start();
        if(isset($_SESSION['changepass'])){
            $code = md5(uniqid(rand(), true));
            $email = $_SESSION['changepass'];

            include '../reuse/config.php';
            
            $sql = "UPDATE db_users SET user_code = '$code' WHERE user_email = $email";

            $result = mysqli_query($conn,$sql);
            
            mysqli_close($conn);

            header("Location:../password_change/send_activation.php");
                
        }else{
            include '../reuse/config.php';
            $email = $_GET['email'];
            $sql = "UPDATE passchange_status SET passchange_status = 1 FROM db_users WHERE user_email = '$email'";
            $result = mysqli_query($conn,$sql);

            header("Location:index.php");
        }
?>