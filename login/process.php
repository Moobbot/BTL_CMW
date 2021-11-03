<?php
session_start();
include '../reuse/config.php';
$username = $_POST['txtUser'];
$password = $_POST['txtPass'];

$sql = "SELECT * FROM db_users WHERE user_name = '$username';"; //câu lệnh sql kiểm tra người dùng tồn tại hay ko
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) { // vòng if kiểm tra câu lệnh truy vấn
    $password_hashed = $row['user_pass']; // lấy password hash ở trên db
    if (password_verify($password, $password_hashed)) { // kiểm tra password nhập vào từ form so với mật khẩu đã lấy trên db
        $sql1 = "SELECT user_id, user_name, user_status, user_level FROM db_users WHERE user_name = '$username' ";
        // $sql1 = "SELECT * FROM  db_users where user_name = '$username' AND user_pass ='$password';";
        $result1 = mysqli_query($conn, $sql1); // truy vấn 2 bảng dữ liệu để lấy ra tất cả thông tin người dùng ứng vs user đã nhập vào 
       
        $sql2 = "SELECT * FROM db_users,db_user_inf WHERE user_name = '$username' AND db_user_inf.ID = db_users.user_id;";
        $result2 = mysqli_query($conn,$sql2);
        
        $user = mysqli_fetch_assoc($result1);
        if ($row['user_status'] > 0) { // Kiểm tra tài khoản xác thực
            if(mysqli_num_rows($result2) > 0){ // Kiểm tra đã nhập đủ thông tin chưa (vẫn cho phép đăng nhập)
                $_SESSION['current_user'] = $user;
                mysqli_close($conn);
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Đăng nhập thành công'
                ));
                exit;
            }else{
                if($row['user_level'] > 0){ // Ngoại lệ thông báo cho người dùng admin
                    $_SESSION['current_user'] = $user;
                    mysqli_close($conn);
                    echo json_encode(array(
                        'status' => 1,
                        'message' => 'Tài khoản chưa điền đầy đủ thông tin'
                ));
                }else{
                    $_SESSION['current_user'] = $user;
                    mysqli_close($conn);
                    echo json_encode(array(
                        'status' => 1,
                        'message' => 'Đăng nhập thành công'
                ));
                exit;
                }
            }
        } else {
            mysqli_close($conn);
            echo json_encode(array(
                'status' => 0,
                'message' => 'Tài khoản chưa xác thực'
            ));
            exit;
        }
    }else {
        mysqli_close($conn);
        echo json_encode(array(
            'status' => 0,
            'message' => 'Sai mật khẩu'
        ));
        exit;
    }
} else {
    mysqli_close($conn);
    echo json_encode(array(
        'status' => 0,
        'message' => 'Người dùng không tồn tại'
    ));
    exit;
}