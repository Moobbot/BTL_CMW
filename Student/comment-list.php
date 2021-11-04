<?php
require_once ("../reuse/config.php");

$sql = "SELECT * FROM tbl_comment ORDER BY parent_comment_id asc, comment_id asc";

$result = mysqli_query($conn, $sql);
$record_set = array();  // tạo mảng
while ($row = mysqli_fetch_assoc($result)) { //Nhận một hàng kết quả dưới dạng một mảng được liệt kê
    array_push($record_set, $row);
}
mysqli_free_result($result);  //sẽ giải phóng bộ nhớ của biến đã lưu kết quả truy vấn trước đó.

mysqli_close($conn);  //đóng một kết nối cơ sở dữ liệu đã mở trước đó.
echo json_encode($record_set); // để convert giá trị string chỉ định thành định dạng JSON.
?>