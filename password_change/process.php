<?php
session_start();
include '../reuse/config.php';
$email = $_POST['txtEmail'];


$sql = "SELECT user_name FROM db_users WHERE user_email = '$email';"; //câu lệnh sql kiểm tra người dùng tồn tại hay ko
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if(empty($_SESSION['current_user'])){
    if (mysqli_num_rows($result) > 0) { // Kiểm tra email đi kèm tài khoản có tồn tại hay ko 
        $_SESSION['changepass'] = $email;
        header("Location:./activation.php"); // Chuyển sang trang xác thực tài khoản
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
    if($pass == $pass1){
        echo json_encode(array(
            'status' => 1,
            'message' => 'Thay đổi thành công'
        ));
        exit;
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Mật khẩu nhập lại không chính xác'
        ));
    }
}

mysqli_close($conn);