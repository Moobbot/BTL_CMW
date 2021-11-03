<!-- Giao diện các môn học
        Giao diện cho Giảng viên
-->
<!-- Body -->
<?php
if (empty($_SESSION['current_user'])) {
    header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
?>
<?php
} else {
    $currentUser = $_SESSION['current_user'];
?>

<?php include './reuse/config.php' ?>

<div class="row justify-content-center p-0 m-0">
    <div class="col-10">
        <h2>Các khóa học bạn đang dạy</h2>
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
                    $user_id_inf = $currentUser['user_id'];
                    $sql = "SELECT sub_id, teach_learn_id FROM db_teach_learn WHERE user_id_inf = '$user_id_inf'";
                    $result = mysqli_query($conn, $sql);
                    $STT = 0;

                    // Kiểm tra số môn học mà gv có $id dạy
                    if ($result->num_rows > 0) {
                        while ($row  = $result->fetch_assoc()) {
                            $sub_id = $row['sub_id'];
                            $teach_learn_id = $row['teach_learn_id'];

                            $sql1 = "SELECT sub_name FROM db_subjects s, db_teach_learn WHERE s.sub_id = $sub_id AND teach_learn_id = $teach_learn_id"; //Lấy thông tin môn học
                            $result1 = mysqli_query($conn, $sql1);
                            if ($result1->num_rows > 0) {
                                $STT += 1;

                                $row1 = $result1->fetch_assoc();
                    ?>
                <tr>
                    <th scope="row"><?= $STT ?></th>
                    <td><?= $row1['sub_name'] ?></td>
                    <td><a href="http://localhost/BTL_CNW/teacher/detail.php?id= <?= $teach_learn_id ?>">Link</a></td>

                    <?php
                            }
                        }
                    } else { ?>
                    <th scope="row">Bạn chưa dạy môn nào</th>
                    <?php
                    } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
}
mysqli_close($conn);
?>