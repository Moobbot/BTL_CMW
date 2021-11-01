<?php include 'reuse/header.php' ?>
<div class="container-fluid ps-0 pe-0">
    <?php include './reuse/header_body.php' ?>

    <!-- Body -->
    <div class="row p-0 m-0 mt-4">
        <div class="col mb-4">
            <?php

            // Người dùng chưa đăng nhập
            if (empty($_SESSION['current_user'])) {
            ?>

            <h2>Các khóa học hiện tại</h2>
            <?php include 'subject/index.php'; ?>

            <?php
            } else {
                if ($currentUser['user_level'] == 0) {
                    // Hiện thị body admin
                    include 'admin/index.php';
                ?>

            <?php
                }
                if ($currentUser['user_level'] == 1) {
                    // Hiện thị foder teacher
                    include 'teacher/index.php';
                ?>
            <?php
                }
                if ($currentUser['user_level'] == 2) {
                    // Hiện thị foder student
                    include './student/index.php';
                }
            }
            ?>

        </div>
    </div>
    <?php include './reuse/footer_body.php' ?>
</div>


<?php include 'reuse/footer.php' ?>