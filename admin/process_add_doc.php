<?php

    include '../reuse/config.php';

    $doc_name = $_POST['txtDocName'];
    $doc_link = $_POST['txtLink'];
    $teach_id = $_POST['teach-learn-id'];
    $subject_id = $_POST['subject-id'];
    $sql1 = "SELECT teach_learn_id FROM db_teach_learn WHERE user_id_inf = '$teach_id' AND sub_id = '$subject_id'";
    $result1 = mysqli_query($conn,$sql1);
    if(!empty($doc_name) && !empty($doc_link)){
        if(mysqli_num_rows($result1) > 0){
            $row = mysqli_fetch_assoc($result1);
            $teach_learn_id = $row['teach_learn_id'];
            $sql3 = "INSERT INTO db_doc(doc_name, doc_link, teach_learn_id) VALUES ('$doc_name','$doc_link','$teach_learn_id')";
            $result3 = mysqli_query($conn,$sql3);
            echo json_encode(array(
                'status' => 1,
                'message' => 'Thêm thành công'
            ));
        }else{
            $sql = "INSERT INTO db_teach_learn(user_id_inf, sub_id) VALUES ('$teach_id','$subject_id')";
            $result = mysqli_query($conn,$sql);
            if($result > 0){
                $sql2 = "SELECT teach_learn_id FROM db_teach_learn WHERE user_id_inf = '$teach_id' AND sub_id = '$subject_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row = mysqli_fetch_assoc($result2);
                $teach_learn_id = $row['teach_learn_id'];
                $sql3 = "INSERT INTO db_doc(doc_name, doc_link, teach_learn_id) VALUES ('$doc_name','$doc_link','$teach_learn_id')";
                $result3 = mysqli_query($conn,$sql3);
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
        }}
    else{
        echo json_encode(array(
            'status' => 0,
            'message' => 'Hãy nhập tên tài liệu và đường link'
        ));
        exit;
    }

?>