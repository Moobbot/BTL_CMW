<?php
session_start();
// include 'send.php';
if (isset($_POST['signup'])) {
    $level;
    $user  = $_POST['username'];
    $position = $_POST['position'];
    if ($position == "Giảng Viên") {
        $level = 1; // trả về là 1 
    } else {
        $level = 2; // trả về là 0
    }
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $phone = $_POST['phone'];
    $fullname =$_POST['fullname'];
    $office_id =$_POST['office_id'];

    // Kiểm tra Email hoặc Username đã tồn tại chưa?
    //1. Kết nối tới Server
    include '../reuse/config.php';

    // 2. Truy vấn dữ liệu
    $sql = "SELECT * FROM db_users WHERE user_email='$email' OR user_name='$user' ";
    $result = mysqli_query($conn, $sql);
    

    // 3. XỬ lý kết quả
    if (mysqli_num_rows($result) > 0) {
        echo 'Wrong';
    } else {
        // Băm mật khẩu
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT); // thao tác trên giao diện
        $code = md5(uniqid(rand(), true));
        //Nếu chưa tồn tại, thì chúng ta mới LƯU vào CSDL và GỬI email xác nhận

        $sql_2 = "INSERT INTO db_users  (user_name,user_email, user_pass,user_level,user_code) VALUES ('$user','$email','$pass_hash','$level','$code');";
        $result_2 = mysqli_query($conn, $sql_2);
       

        $sql_4 = "SELECT user_id FROM db_users WHERE  user_name='$user' ";
        $result_4= mysqli_query($conn, $sql_4);
        $row = mysqli_fetch_assoc($result_4);
         $id =$row['user_id'];
        $sql_5 = "INSERT INTO `db_user_inf`(`ID` ,`User_FullName`, `User_Position`, `User_Phone`, `office_id`) 
        VALUES ('$id','$fullname','$position','$phone','$office_id')";
         $result_5 = mysqli_query($conn, $sql_5);

 
         $sql_3 = "SELECT * FROM db_users WHERE user_email='$email' OR user_name='$user' ";
         $result_3 = mysqli_query($conn, $sql_3);
         $user = mysqli_fetch_assoc($result_3);
        $_SESSION['signup_user'] = $user;
        if ($result_2 > 0) {
            echo 'Gửi thành công!';
        } else {
            include '../login/index.php';
        }
    }
}