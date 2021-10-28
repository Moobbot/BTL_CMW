<?php include 'header.php' ?>
<div class="container-fluid ps-0 pe-0">
    <header class="p-2 bg-dark text-white mb-md-4">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="http://www.tlu.edu.vn/" class="d-flex align-items-center mb-lg-0 text-white">
                    <img src="assets/img/logo.jfif" alt="" width="40" height="32"
                        class="d-inline-block align-text-top p-0 m-0 me-2">
                </a>
                <?php
                session_start();
                if(empty($_SESSION['current_user'])){    
                ?>
                <div class="text-end">
                    <a href="login/" class="btn btn-outline-light me-2">Login</a>
                    <a href="signup/" class="btn btn-warning me-2">Sign-up</a>
                </div>
                <?php
                }else{ 
                    $currentUser = $_SESSION['current_user'];   
                ?>
                <div class="text-end">
                    Xin chào <?= $currentUser['User_FullName'] ?>
                    <a href="./login/logout.php" class="ms-3 text-decoration-none">Logout</a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </header>

    <!-- Body -->
    <?php 
        if(empty($_SESSION['current_user'])){
    ?>
        <div class="row p-0 m-0 mt-4">
            <div class="col">
                <h2>Các khóa học hiện tại</h2>
                <?php include 'subject.php'; ?>
            </div>
        </div>
    <?php
        }else{
        if($currentUser['user_level'] == 0){
    ?>
            <h1>Đây là giao diện cho người dùng admin</h1>
    <?php
        }if($currentUser['user_level'] == 1){
    ?>
        <h1>Đây là giao diện cho giáo viên</h1>
    <?php
        }
    }
    ?>
</div>



<?php include 'footer.php' ?>