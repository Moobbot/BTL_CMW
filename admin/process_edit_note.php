<?php

    include '../reuse/config.php';

    $id = $_POST['txtNoteEditCode'];
    $note_mes = $_POST['txtNoteEdit'];

    $sql = "SELECT note_mes FROM db_note WHERE note_id = $id";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $sql1 = "UPDATE db_note SET note_mes = '$note_mes' WHERE note_id = $id";
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
?>