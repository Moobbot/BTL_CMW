<?php
    session_start();
    unset($_SESSION['changepass']);

    header('Location:../index.php');
?>
