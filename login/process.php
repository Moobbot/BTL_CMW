<?php
    session_start();
    include '../reuse/config.php';
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];

    $sql = "SELECT * FROM db_users WHERE user_name = '$username';"; //câu lệnh sql kiểm tra người dùng tồn tại hay ko
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){ // vòng if kiểm tra câu lệnh truy vấn
        $password_hashed = $row['user_pass']; // lấy password hash ở trên db
        if(password_verify($password,$password_hashed)){ // kiểm tra password nhập vào từ form so với mật khẩu đã lấy trên db
            $sql1 = "SELECT * FROM db_user_inf, db_users WHERE user_name = '$username' AND db_user_inf.ID = db_users.user_id;";
            //$sql = "SELECT * FROM  db_users where user_name = '$username' AND user_pass ='$password';";
            $result1 = mysqli_query($conn,$sql1); // truy vấn 2 bảng dữ liệu để lấy ra tất cả thông tin người dùng ứng vs user đã nhập vào 
            $user = mysqli_fetch_assoc($result1);
                // if(mysqli_num_rows($result1) == 0){
                //     echo json_encode(array(
                //         'status' => 0,
                //         'message' => 'Thông tin đăng nhập không đúng'
                //     ));
                //     exit;
                // }
                if($user['user_status'] > 0){ // Kiểm tra tài khoản xác thực
                    $_SESSION['current_user'] = $user;
                    echo json_encode(array(
                        'status' => 1,
                        'message' => 'Đăng nhập thành công' 
                    ));
                    exit;
                }else{
                    echo json_encode(array(
                        'status' => 0,
                        'message' => 'Tài khoản chưa xác thực'
                    ));
                }
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Sai mật khẩu'
            ));
            exit;
        }
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Người dùng không tồn tại'
        ));
        exit;
    }
    
    mysqli_close($conn);
    // if(mysqli_num_rows($result) >0){
    //     header("Location:test.php");
    // }else{
    //     header("Location:index.php");
    // }
?>
