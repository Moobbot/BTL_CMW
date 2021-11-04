<?php

    $note_id = $_POST['ID'];
    include '../reuse/config.php';

    $sql = "DELETE FROM db_note WHERE note_id = '$note_id'";
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