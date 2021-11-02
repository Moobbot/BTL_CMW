<?php
    $user_id = $_GET['id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_regis_date = $_POST['user_regis_date'];
    $User_Position = $_POST['User_Position'];
    $User_FullName = $_POST['User_FullName'];
    $Phone = $_POST['User_Phone'];
    include '../reuse/config.php';
    $sql = "UPDATE `db_users`,`db_user_inf` SET`user_name`='$user_name', `user_email`='$user_email',`user_regis_date`=' $user_regis_date',`User_Position`='$User_Position',`User_FullName`='$User_FullName'
     where 'user_id'='$user_id' and db_users.user_id = db_user_inf.ID;";
    
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:index.php");
    }else{
        echo "Location:error.php";
    }

    //Bước 04: Đóng kết nối
    mysqli_close($conn);
?>