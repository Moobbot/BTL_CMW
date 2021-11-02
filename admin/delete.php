<?php
    $id = $_GET['id'];
    
    include '../reuse/config.php';

    $sql1 =  " DELETE FROM `db_user_inf` WHERE  `ID` = '$id'";
    $sql = " DELETE FROM `db_users` WHERE  `user_id` = '$id'";
  
    
    echo $sql;
    $result1 = mysqli_query($conn,$sql1);
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