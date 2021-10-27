<?php
    
    if(isset($_POST['sbmRegister'])){
        $level ;
        $user  = $_POST['txtUser'];
        $position = $_POST['txtPosition'];
        if($position == "Giảng Viên")
        {
            $level = true;
        }
        else{
            $level = false;

        }
        $email = $_POST['txtEmail'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
    }
        echo $position;

    // Kiểm tra Email hoặc Username đã tồn tại chưa?
    //1. Kết nối tới Server
     include '../config.php';

    // 2. Truy vấn dữ liệu
    $sql = "SELECT * FROM db_users WHERE user_email='$email' OR user_name='$user' ";
    $result = mysqli_query($conn,$sql);
    

    // 3. XỬ lý kết quả
    if(mysqli_num_rows($result) > 0){
        echo 'Email hoặc Username đã tồn tại';
    }else{
        // Băm mật khẩu
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $code = md5(uniqid(rand(), true));
            //Nếu chưa tồn tại, thì chúng ta mới LƯU vào CSDL và GỬI email xác nhận
            
        $sql_2 = "INSERT INTO db_users  (user_name,user_email, user_pass,user_level,user_code) VALUES ('$user','$email','$pass_hash','$level','$code');";
    
        $result_2 = mysqli_query($conn,$sql_2);
        if($result_2>0)
        {
            echo'Gửi thành công!';
        }
        else{
            echo'Something Wrong!';
        }

        
    }


?>