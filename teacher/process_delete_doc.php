<?php
session_start();

include '../reuse/config.php';

// Xóa doc

if (isset($_POST['doc_id'])) {
    $doc_id = $_POST['doc_id'];
    $sql = "DELETE FROM db_doc WHERE `doc_id`='$doc_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        mysqli_close($conn);
        echo json_encode(array(
            'status' => 1,
            'message' => 'Xóa thành công!'
        ));
        exit;
    } else {
        mysqli_close($conn);
        echo json_encode(array(
            'status' => 1,
            'message' => 'Xóa không thành công!'
        ));
        exit;
    }
} else {
    mysqli_close($conn);
    echo json_encode(array(
        'status' => 1,
        'message' => 'Không bắt được id!'
    ));
    exit;
}