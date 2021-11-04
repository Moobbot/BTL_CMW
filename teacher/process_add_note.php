<?php
session_start();
// Kiểm tra Có điền thông báo chưa?
if (isset($_POST['teach_learn_id'])) {

    $teach_learn_id = $_POST['teach_learn_id'];
    $note_mes = $_POST['note_mes'];

    //1. Kết nối tới Servers
    include '../reuse/config.php';

    // //2. Truy vấn cơ sở dữ liệu

    $sql = "INSERT INTO db_note (teach_learn_id, note_mes) VALUES ('$teach_learn_id', '$note_mes');";
    $result = mysqli_query($conn, $sql);
    //3. Xử lý kết quả

    if ($result) {
        echo json_encode(array(
            'status' => 1,
            'message' => 'Thêm thành công!'
        ));
        exit;
    } else {
        echo json_encode(array(
            'status' => 0,
            'message' => 'Thêm thất bại!'
        ));
        exit;
    }
    // mysqli_close($conn);
} else {
    echo json_encode(array(
        'status' => 0,
        'message' => 'Chưa điền thông báo!'
    ));
    exit;
}