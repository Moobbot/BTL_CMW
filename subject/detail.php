<?php include '../reuse/header.php' ?>

<?php include '../reuse/config.php' ?>

<div class="container-fluid bg-light p-0 m-0">
    <?php
    // BEGIN HEADER

    include '../reuse/header_body.php';

    // END HEADER
    ?>

    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
    <?php
    if (empty($_SESSION['current_user'])) {
        header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
    ?>
    <?php
    } else {
        $currentUser = $_SESSION['current_user'];

        $data = $_GET['data']; //teach_learn_id
        $id = explode(',', $data)[0];
        $sub_name = explode(',', $data)[1];
    ?>
    <!-- BEGIN CONTAINER -->

    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">

            <div class="col-12 text-center justify-content-center p-2">
                <h1><?= $sub_name ?></h1>
            </div>

            <!-- Thông báo -->
            <div class="row">
                <h2 class="text-center">Thông báo</h2><span id="noti"></span>
                <!-- <div style="height: 10em; overflow-y:auto"> -->

                <table class="table table-bordered border-dark mt-2" id="tb_note">
                    <thead>
                        <tr class="text-center">
                            <th>
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT `note_mes` FROM db_note WHERE teach_learn_id = '$id'";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td> <?= $row['note_mes'] ?> </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>
                    </tbody>
                </table>

                <!-- Tìm kiếm thông báo -->
                <!-- <script>
                $(document).ready(function() {
                    $('#tb_note').DataTable();
                });
                </script> -->

                <!-- </div> -->
            </div>

            <!-- Bảng thông tin tài liệu -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h2>Tài liệu môn học</h2>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>
                                    STT
                                </th>
                                <th>
                                    Tên tài liệu
                                </th>
                                <th>
                                    Ngày đăng
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu thay đổi theo CSDL -->
                            <?php
                                $sql = "SELECT `doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status` FROM `db_doc` WHERE teach_learn_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $STT = 0;
                                ?>
                            <tr>
                                <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $STT += 1;
                                    ?>

                                <th scope="row"> <?= $STT ?></th>
                                <td><a href="<?= $row['doc_link'] ?>"><?= $row['doc_name'] ?> </a></td>
                                <td><?= $row['date_sub'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <?php
                                        }
                                    } else {
                                        echo '<td>Không có tài liệu nào!</td>';
                                    }
                                    ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Comments của sinh viên-->
            <div class="container-fluid">
                <?php include './comment.php' ?>
            </div>
        </div>
    </div>
    <!-- END CONTAINER -->


    <!-- BEGIN FOOTER -->

    <?php include '../reuse/footer_body.php' ?>

    <!-- END FOOTER -->

</div>

<?php } ?>

<?php include '../reuse/footer.php' ?>