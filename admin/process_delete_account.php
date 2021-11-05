<?php
    $user_id = $_POST['acc_user_id'];

    include '../reuse/config.php';

    $sql = "SELECT teach_learn_id FROM db_teach_learn WHERE user_id_inf = '$user_id'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $teach_learn_id = $row['teach_learn_id'];

        $sql3 = "DELETE FROM db_note WHERE teach_learn_id = '$teach_learn_id'";
        $result3 = mysqli_query($conn,$sql3);
                
        $sql5 = "DELETE FROM db_doc WHERE teach_learn_id = '$teach_learn_id'";
        $result5 = mysqli_query($conn,$sql5);
    
        $sql6 = "DELETE FROM db_teach_learn WHERE teach_learn_id = $teach_learn_id";
        $result6 = mysqli_query($conn,$sql6);
    
        $sql7 = "DELETE FROM db_user_inf WHERE ID = '$user_id'";
        $result7 = mysqli_query($conn,$sql7);
    
        $sql8 = "DELETE FROM db_users WHERE user_id ='$user_id'";
        $result8 = mysqli_query($conn,$sql8);

        mysqli_close($conn);
        echo json_encode(array(
        'status' => 1,
        'message' => 'Xóa thành công'  
        ));
        exit;

    }else{
        $sql7 = "DELETE FROM db_user_inf WHERE ID = '$user_id'";
        $result7 = mysqli_query($conn,$sql7);
    
        $sql8 = "DELETE FROM db_users WHERE user_id ='$user_id'";
        $result8 = mysqli_query($conn,$sql8);
    
        mysqli_close($conn);
        echo json_encode(array(
        'status' => 1,
        'message' => 'Xóa thành công'  
        ));
        exit;
    }
?>