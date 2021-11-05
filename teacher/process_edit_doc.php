<?php
session_start();

include '../reuse/config.php';

// Sửa note
if (isset($_GET['note_id'])) {
    $note_id = $_GET['note_id'];
    $note_mes = $_GET['note_mes'];
    // // $column_name = $_POST['column_name'];

    $sql = "UPDATE `db_note` SET `note_mes`='$note_mes' WHERE `note_id`='$note_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        mysqli_close($conn);
        echo json_encode(array(
            'status' => 1,
            'message' => 'Sửa thành công!'
        ));
        exit;
    } else {
        mysqli_close($conn);
        echo json_encode(array(
            'status' => 0,
            'message' => 'Sửa không thành công!'
        ));
        exit;
    }
} else {
    mysqli_close($conn);
    echo json_encode(array(
        'status' => 0,
        'message' => 'Không có id!'
    ));
    exit;
}