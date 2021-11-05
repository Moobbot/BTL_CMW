<?php
session_start();

include '../reuse/config.php';

// Thêm note

// Kiểm tra Có điền thông báo chưa?
// if (isset($_POST['teach_learn_id']) and isset($_POST['doc_n'])) {

$teach_learn_id = $_POST['teach_learn_id'];

$doc_name = $_POST['doc_name'];
$doc_link = $_POST['doc_link'];
$status = $_POST['status'];

//1. Kết nối tới Servers

// //2. Truy vấn cơ sở dữ liệu

$sql = "INSERT INTO db_doc (teach_learn_id, doc_name, doc_link, `status`)
    VALUES ('$teach_learn_id', '$doc_name', '$doc_link', '$status');";
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
// } else {
//     echo json_encode(array(
//         'status' => 0,
//         'message' => 'Chưa điền thông báo!'
//     ));
//     exit;
// }