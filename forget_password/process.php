<?php
session_start();
include '../reuse/config.php';

if(empty($_SESSION['changepass'])){
    $email = $_POST['txtEmail'];
    $sql = "SELECT user_name FROM db_users WHERE user_email = '$email';"; //câu lệnh sql kiểm tra người dùng tồn tại hay ko
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) { // Kiểm tra email đi kèm tài khoản có tồn tại hay ko 
        $code = md5(uniqid(rand(), true)); //Tạo luôn code xác thực tài khoản
        $_SESSION['changepass'] = $email;
            
        $sql1 = "UPDATE db_users SET user_code = '$code' WHERE user_email = '$email'"; //Cập nhật code thay đổi mật khẩu

        $result1 = mysqli_query($conn,$sql1);
    
        mysqli_close($conn);

        header("Location:../forget_password/send_activation.php");
        // $_SESSION['changepass'] = $email;
        // mysqli_close($conn);
        // header("Location:./activation.php"); // Chuyển sang trang xác thực tài khoản
    } else {
        echo json_encode(array(
            'status' => 0,
            'message' => 'Email chưa được sử dụng để đăng ký tài khoản'
        ));
        exit;
    }
}else{
    $pass = $_POST['txtPass'];
    $pass1 = $_POST['txtPass1'];
    $user = $_SESSION['changepass'];
    $code = $user['code'];
    $email = $user['email'];
    $sql = "SELECT * FROM db_users WHERE user_code = '$code'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $password_hash = password_hash($pass,PASSWORD_DEFAULT);
        if($pass == $pass1){
            $sql1 = "UPDATE db_users SET user_pass = '$password_hash' WHERE user_email = '$email'";
            $result1 = mysqli_query($conn,$sql1);
            
            $newcode = md5(uniqid(rand(), true));
            $sql2 = "UPDATE db_users SET user_code = '$newcode' WHERE user_email = '$email'";
            $result2 = mysqli_query($conn,$sql2);

            unset($_SESSION['changepass']);
            echo json_encode(array(
                'status' => 2,
                'message' => 'Thay đổi thành công'
            ));
            exit;   
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Mật khẩu nhập lại không chính xác'
            ));
            exit;
        }
    }else{
        unset($_SESSION['changepass']);
        echo json_encode(array(
            'status' => 1,
            'message' => 'Đường link đã hết hạn'
        ));
        exit;
    }
}