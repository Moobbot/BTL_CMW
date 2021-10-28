<?php
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];

    include '../config.php';

    $sql = "SELECT * FROM db_users WHERE user_name = '$username' AND user_pass = '$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) >0){
        header("Location:test.php");
    }else{
        header("Location:index.php");
    }
?>