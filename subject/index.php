<!-- Lấy thông tin môn học -->
<?php
include 'reuse/config.php';

$sql = "SELECT * FROM `db_subjects`";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $num = 2;
    if ($num % 2 == 0) {
        $num = $num - 1;
?>
<div class="row justify-content-evenly mb-4">

    <?php
    }
    while ($row  = $result->fetch_assoc()) {
        $id = $row["sub_id"];
        ?>

    <?php

            // Người dùng chưa đăng nhập
            if (empty($_SESSION['current_user'])) {
            ?>
    <div class="card flex-row mb-4" style="max-width: 26rem; border-radius: 15px;">
        <img src="assets/img/logo.jfif" class="card-img-top m-2" style="max-width: 10rem;" alt="...">
        <h4 class="card-title p-4 align-self-center">
            <?= $row["sub_name"] ?>
        </h4>
    </div>

    <?php
            } else {
            ?>
    <div class="card flex-row mb-4" style="max-width: 26rem; border-radius: 15px;">
        <a href="./teacher/detail.php?id= <?= $id ?>">
            <img src="assets/img/logo.jfif" class="card-img-top m-2" style="max-width: 10rem;" alt="...">
        </a>
        <h4 class="card-title p-4 align-self-center">
            <a href="./teacher/detail.php?id= <?= $id; ?>" class="text-decoration-none">
                <?= $row["sub_name"] ?>
            </a>
        </h4>
    </div>
    <?php
            } ?>
    <?php
            if ($num % 2 == 0) {
            ?>
</div>
<?php
            }
        }
    } else {
?>
<h1>Không có môn học nào</h1>
<?php
    }
?>