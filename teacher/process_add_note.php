<?php
// session_start();
include '../reuse/config.php';
$note_mes = $_POST['note_mes'];
echo json_encode(array(
    'status' => 0,
    'message' => $note_mes
));
exit;

mysqli_close($conn);