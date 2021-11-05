<!-- Dữ liệu thay đổi theo CSDL -->
<?php include '../reuse/header.php' ?>
<?php
include '../reuse/config.php';
$id = $_GET['id']; //ID giảng viên
$name = '';
$sqlx = "SELECT User_FullName FROM db_user_inf WHERE id = '$id'";
$resultx = mysqli_query($conn, $sqlx);
if ($resultx->num_rows > 0) {
    $rowx = $resultx->fetch_assoc();
    $name = $rowx['User_FullName'];
} else {
    echo 'lỗi';
}

?>
<div class="container-fluid px-0">
    <?php
    // // Bắt đàu phiên làm việc
    // session_start();
    ?>

    <!-- BEGIN HEADER -->

    <?php include '../reuse/header_body.php' ?>

    <!-- BEGIN CONTAINER -->
    <?php
    if (empty($_SESSION['current_user'])) {
        header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
    ?>
    <?php
    } else {
        $currentUser = $_SESSION['current_user'];
    ?>
    <Section class="container">
        <div class="row mt-4">
            <h2 class="px-0">Những môn đang giảng dạy của <?= $name ?></h2>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên môn</th>
                        <th scope="col">Link chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT sub_id, teach_learn_id FROM db_teach_learn WHERE user_id_inf = '$id'";
                        $result = mysqli_query($conn, $sql);
                        $STT = 0;
                        // Kiểm tra số môn học mà gv có $id dạy
                        if ($result->num_rows > 0) {
                            while ($row  = $result->fetch_assoc()) {
                                $sub_id = $row['sub_id'];
                                $teach_learn_id = $row['teach_learn_id'];
                                $sql1 = "SELECT * FROM db_subjects s WHERE s.sub_id = $sub_id";
                                $result1 = mysqli_query($conn, $sql1);
                                if ($result1->num_rows > 0) {
                                    $STT += 1;
                                    $row1 = $result1->fetch_assoc();
                        ?>
                    <tr>
                        <th scope="row"><?= $STT ?></th>
                        <td><?= $row1['sub_name'] ?></td>
                        <td><a
                                href="http://localhost/BTL_CNW/subject/detail.php?data= <?= $teach_learn_id ?>,<?= $row1['sub_name'] ?>">Link</a>
                        </td>

                        <?php
                                }
                                    ?>
                        <?php
                            }
                        } else {
                                ?>

                        <th scope="row">Giảng viên chưa dạy môn nào</th>

                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </Section>

    <!-- END CONTAINER -->
    <?php
    }
    ?>

    <!-- BEGIN FOOTER -->

    <?php include '../reuse/footer_body.php' ?>

    <!-- END FOOTER -->

</div>
<?php include '../reuse/footer.php' ?>