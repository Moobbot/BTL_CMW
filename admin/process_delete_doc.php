<?php

    $doc_id = $_POST['ID'];
    include '../reuse/config.php';

    $sql = "DELETE FROM db_doc WHERE doc_ID = '$doc_id'";
    $result = mysqli_query($conn,$sql);

    if($result > 0){
        echo json_encode(array(
            'status' => 1,
            'message' => 'Xóa thành công',
        ));
        exit;
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Xóa không thành công'
        ));
        exit;
    }
?>