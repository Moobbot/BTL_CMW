<?php
// Bước 1: Kết nối tới CSDL:
define('HOST', 'localhost');
define('USER', 'root');
const PASS = '';
const DB = 'db_blog';
$conn = mysqli_connect(HOST, USER, PASS, DB); //Tạo kết nối

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}