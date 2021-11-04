<?php

    include '../reuse/config.php';

    $note = $_POST['txtNote'];
    $teach_id = $_POST['teach-learn-id'];
    $subject_id = $_POST['subject-id'];

    if(!empty($note)){
        $sql = "INSERT INTO db_teach_learn('user_id_inf', 'sub_id') VALUES ('$teach_id','$subject_id')";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            echo json_encode(array(
                'status' => 1,
                'message' => 'Thêm thành công'
            ));
            exit;   
        }else{
            echo json_encode(array(
                'status' => 0,
                'message' => 'Thêm không thành công'
            ));
            exit; 
        }
    }else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Hãy nhập note'
        ));
        exit;
    }
?>