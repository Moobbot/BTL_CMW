<?php
<<<<<<< HEAD
    session_start();
    include '../reuse/config.php';
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];

    $sql = "SELECT * FROM db_users WHERE user_name = '$username' ;";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $password_hashed = $row['user_pass'];
    if(password_verify($password,$password_hashed)){
        $sql1 = "SELECT * FROM db_user_inf, db_users WHERE user_name = '$username' AND db_user_inf.ID = db_users.user_id;";
        //$sql = "SELECT * FROM  db_users where user_name = '$username' AND user_pass ='$password';";
        $result1 = mysqli_query($conn,$sql1);
        $user = mysqli_fetch_assoc($result1);
        $_SESSION['current_user'] = $user;
            if(mysqli_num_rows($result1) == 0){
                echo json_encode(array(
                    'status' => 0,
                    'message' => 'Thông tin đăng nhập không đúng'
                ));
                exit;
            }else{
                echo json_encode(array(
                    'status' => 1,
                    'message' => 'Đăng nhập thành công' 
                ));
                exit;
            }
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Thông tin đăng nhập không đúng'
        ));
        exit;
    }


    

    mysqli_close($conn);
    // if(mysqli_num_rows($result) >0){
    //     header("Location:test.php");
    // }else{
    //     header("Location:index.php");
    // }
=======
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];

    include '../config.php';

    $sql = "SELECT * FROM db_users WHERE user_name = '$username' AND user_pass = '$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) >0){
        header("Location:test.php");
    }else{
        header("Location:index.php");
    }
?>
>>>>>>> cc70452450e2d51fe74ed6553d6146c644cae5be
