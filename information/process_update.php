<?php
    include '../reuse/config.php';
    $fullname = $_POST['txtEditUserFullName'];
    $phone = $_POST['txtEditUserPhone'];
    $id = $_POST['userID'];
    $sql = "UPDATE db_user_inf SET User_FullName = '$fullname', User_Phone = '$phone' WHERE ID = '$id'";
    $result = mysqli_query($conn,$sql);

    if($result > 0){
        echo json_encode(array(
            'status' => 1,
            'message' => 'Thay đổi thành công'
       ));
        exit;
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Thay không đổi thành công'
        ));
        exit;
    }
?>