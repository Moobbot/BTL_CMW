<?php
    session_start();
        if(isset($_SESSION['changepass'])){
            $code = md5(uniqid(rand(), true));
            $email = $_SESSION['changepass'];

            include '../reuse/config.php';
            
            $sql = "UPDATE db_users SET user_code = '$code' WHERE user_email = $email";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                header("Location:../password_change/send_activation.php");
                mysqli_close($conn);
            }
        }else{
            $_SESSION['current_user'] = $_GET['email'];
            header("Location:index.php");
        }
?>