<?php
// Bước 1: Kết nối tới CSDL:
define('HOST', 'localhost');
define('USER', 'root');
const PASS = '';
const DB = 'db_blog';
$conn = mysqli_connect(HOST, USER, PASS, DB);
if (!$conn) {
    die('Không thể kết nối');
}