<?php
    $user_id = $_GET['id'];
   
    $User_Position = $_POST['User_Position'];
    $User_FullName = $_POST['User_FullName'];
    $Phone = $_POST['User_Phone'];
    include '../reuse/config.php';
  
    $sql = "UPDATE `db_user_inf` SET `User_FullName`='$User_FullName',`User_Position`='$User_Position',`User_Phone`='$Phone' WHERE `ID` = '$user_id';";
    
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