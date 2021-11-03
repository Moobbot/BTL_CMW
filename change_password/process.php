<?php
    session_start();
    include '../reuse/config.php';
    if(empty($_SESSION['current_user'])){
        echo json_encode(array(
            'status' => 1,
            'message' => 'Bạn phải đăng nhập để dùng tính năng này'
        ));
        exit;
    }else{
        $pass = $_POST['txtPass'];
        $pass1 = $_POST['txtPass1'];
        if($pass == $pass1){
            $password_hash = password_hash($pass,PASSWORD_DEFAULT);
            $user = $_SESSION['current_user'];
            $username = $user['user_name'];
            $sql = "UPDATE db_users SET user_pass = '$password_hash' WHERE user_name = '$username'";
            $result = mysqli_query($conn,$sql);
            unset($_SESSION['current_user']);
            echo json_encode(array(
                'status' => 1,
                'message' => 'Thay đổi thành công, hãy đăng nhập bằng tài khoản mới'
            ));
            exit;
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Mật khẩu nhập lại không chính xác'
            ));
            exit;
        }
    }
?>