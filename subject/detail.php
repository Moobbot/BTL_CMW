<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include '../reuse/header.php' ?>

<?php include '../reuse/config.php' ?>

<div class="container-fluid bg-light h-100 p-0 m-0">
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
        $id = $_GET['id']; //$teach_learn_id;
    ?>
    <!-- BEGIN CONTAINER -->

    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">

            <!-- Thông báo -->
            <div class="row bg-warning">
                <table class="table">
                    <thead>
                        <h2 class="text-center">Thông báo</h2>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thay đổi theo CSDL -->
                        <th class="col">
                            <p class="">
                                <?php
                                    $sql = "SELECT `note_id`, `note_mes` FROM db_note WHERE teach_learn_id = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if ($row = $result->fetch_assoc() > 0) {
                                        $row['note_mes']
                                    ?>
                            </p>
                        </th>
                        <?php
                                    } else {
                        ?>
                        <th>
                            <h3>Không có thông báo nào.</h3>
                        </th>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Bảng thông tin tài liệu -->
            <div class="row">
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
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $STT += 1;
                                        echo '<tr>';
                                        echo '<th scope="row">' . $STT . '</th>';
                                        echo '<td>' . '<a href="' . $row['doc_link'] . '">' . $row['doc_name'] . '</a>' . '</td>';
                                        echo '<td>' . $row['date_sub'] . '</td>';
                                        echo '<td>' . $row['status'] . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Comments của sinh viên-->
            <div class="row">
                <div class="col-md-12 flex-column m-md-5">
                    <h2>Comments</h2>
                    <input type="text" class="w-75 p-5">
                    <input type="submit" value="Gửi" class="btn btn-success ps-4 pe-4 pt-2 pb-2">
                </div>
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