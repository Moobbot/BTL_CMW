<!-- Dữ liệu thay đổi theo CSDL -->
<?php
include 'reuse/config.php';
$sql = "SELECT * FROM `db_subjects`";
$result = mysqli_query($conn, $sql);

// Kiểm tra số môn  học trả về
if ($result->num_rows > 0) {
    $num = 2; //Tạo hàng
    if ($num % 2 == 0) {
        $num = $num - 1;
?>

<div class="row justify-content-evenly mb-4">
    <?php
        }
        while ($row  = $result->fetch_assoc()) {
            $id = $row["sub_id"];

            //Nếu người dùng chưa đăng nhập hiện các môn học không có đường link
            if (empty($_SESSION['current_user'])) {
            ?>

    <div class="card flex-row mb-4" style="max-width: 26rem; border-radius: 15px;">
        <img src="http://sinhvien.tlu.edu.vn/assets/images/logo-small.png" class="card-img-top m-2"
            style="max-width: 10rem;" alt="...">
        <h4 class="card-title p-4 align-self-center">
            <?= $row["sub_name"] ?>
        </h4>
    </div>

    <?php
            } else {
                //Nếu người dùng đăng nhập hiện các môn học có đường link tới chi tiết môn học
            ?>

    <div class="card flex-row mb-4" style="max-width: 26rem; border-radius: 15px;">
        <a href="./teacher/detail.php?id= <?= $id ?>_user_id = <?= $currentUser['user_id'] ?>">
            <img src="http://sinhvien.tlu.edu.vn/assets/images/logo-small.png" class="card-img-top m-2"
                style="max-width: 10rem;" alt="...">
        </a>
        <h4 class="card-title p-4 align-self-center">
            <a href="./teacher/detail.php?id= <?= $id ?>_user_id = <?= $currentUser['user_id'] ?>"
                class="text-decoration-none">
                <?= $row["sub_name"] ?>
            </a>
        </h4>
    </div>

    <?php
            }
        }
    } else {
        ?>
    <h1 class="text-center">Không thể kết nối database hoặc không có môn học nào</h1>
    <?php
    }
    ?>