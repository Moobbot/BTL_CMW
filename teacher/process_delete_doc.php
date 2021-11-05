<?php
session_start();

include '../reuse/config.php';

// Xóa note

if (isset($_POST['note_id'])) {
    $note_id = $_POST['note_id'];
    $sql = "DELETE FROM db_note WHERE `note_id`='$note_id'";
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