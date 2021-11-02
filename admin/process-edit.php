<?php
    $user_id = $_GET['id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_regis_date = $_POST['user_regis_date'];
    $User_Position = $_POST['User_Position'];
    $User_FullName = $_POST['User_FullName'];
    $Phone = $_POST['User_Phone'];
    include '../reuse/config.php';
  
    $sql = "UPDATE `db_user_inf` SET `User_Position`='$User_Position',`User_FullName`='$User_FullName'
     where 'ID'='$user_id' ";
    $sql1 = "UPDATE `db_users` SET`user_name`='$user_name',`user_email`='$user_email',`user_regis_date`='$user_regis_date' 
    WHERE user_id = '$user_id';";
    
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql1);
    // Bước 03:
    if($result > 0){
        header("Location:index.php");
    }else{
        echo "Location:error.php";
    }

    //Bước 04: Đóng kết nối
    mysqli_close($conn);
?>