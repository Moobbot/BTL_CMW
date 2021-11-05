<?php

    include '../reuse/config.php';

    $doc_id = $_POST['txtDocEditCode'];
    $doc_name = $_POST['txtDocEditName'];

    $sql = "SELECT doc_name FROM db_doc WHERE doc_ID = $doc_id";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $sql1 = "UPDATE db_doc, db_link SET doc_name = '$doc_name' WHERE doc_ID = $doc_id";
        $result1 = mysqli_query($conn,$sql1);
        if($result1 > 0){  
            echo json_encode(array(
                'status' => 1,
                'message' => 'Thay đổi thành công'
            ));
            exit;
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Thay đổi thất bại'
            ));
            exit;
        }
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Thông báo ko tồn tại'
        ));
        exit;
    }