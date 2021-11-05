<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include '../reuse/header.php' ?>

<?php include '../reuse/config.php' ?>

<?php
$data = $_GET['data']; //teach_learn_id
$id = explode(',', $data)[0];
$sub_name = explode(',', $data)[1];
// echo $id;
?>

<div class="container-fluid bg-light h-100 p-0 m-0">
    <?php
    // BEGIN HEADER

    include '../reuse/header_body.php';

    // END HEADER
    ?>
    <!-- BEGIN CONTAINER -->

    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
    <?php
    if (empty($_SESSION['current_user'])) {
        header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
    ?>
    <?php
    } else {
        $currentUser = $_SESSION['current_user'];
    ?>
    <div class="row d-flex justify-content-center p-0 m-0">
        <div class="col-12 text-center justify-content-center p-2">
            <h1><?= $sub_name ?></h1>
        </div>
        <div class="col-lg-10 col-12">
            <!-- Thông báo -->
            <div class="row bg-warning">
                <table class="table table-bordered mb-0">
                    <thead>
                        <h2 class="text-center">Thông báo</h2><span id="noti"></span>
                    </thead>
                    <tbody>
                        <form method="POST" id="process_note">
                            <!-- Dữ liệu thay đổi theo CSDL -->

                            <?php
                                $sql = "SELECT `note_id`, `note_mes` FROM db_note WHERE teach_learn_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>

                            <tr>
                                <th class="col-11">
                                    <input type="text" class="txt_note_mes w-100" data-id="<?= $row['note_id'] ?>"
                                        value="<?= $row['note_mes'] ?>">

                                </th>

                                <!-- <input type="hidden" id="note_id" value=""> -->
                                <!-- href="./process_edit_note.php?id=</?= $row['note_id'] ?>" -->
                                <!-- <th scope="col">
                                    <button type="button" class="btn btn-success mb-2 btn_edit_note"
                                        value="</?= $row['note_id'] ?>, </?= $row['note_mes'] ?>"> Sửa
                                    </button>
                                </th> -->

                                <th class="col-1 justify-content-center">
                                    <!-- href=" ./process_delete_note.php?id=</?=$row['note_id'] ?>" -->
                                    <button type="button" class="btn btn-success w-100 btn_delete_note"
                                        value="<?= $row['note_id'] ?>"> Xóa
                                    </button>
                                </th>
                            </tr>
                            <?php
                                    }
                                }
                                ?>

                            <tr>
                                <th scope="col-11">
                                    <input type="text" id="note_mes" class="w-100" placeholder="Thông báo">
                                </th>
                                <th>
                                    <!-- <input type="hidden" id="t_learn_id" value=""> -->
                                    <button type="button" id="btn_add_note" value="<?php echo $id ?>"
                                        class="btn btn-success w-100">Thêm</button>
                                </th>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>

            <!-- Bảng thông tin tài liệu -->
            <?php include './doc.php' ?>
            <!-- Comments của sinh viên-->
            <div class="row">
                <div class="col-md-12 flex-column my-md-5">
                    <h2>Comments</h2>
                    <input type="text" class="w-75 p-5">
                    <input type="submit" value="Gửi" class="btn btn-success px-4 pt-2 pb-2 ms-4">
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTAINER -->

    <!-- Button trigger modal -->

    <!-- BEGIN FOOTER -->

    <?php include '../reuse/footer_body.php' ?>

    <!-- END FOOTER -->

</div>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src='../assets/js/process_teacher.js'> </script>

<?php include '../reuse/footer.php' ?>