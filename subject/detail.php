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
            <div class="row" id="note">
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
            <div class="row mt-4 " id="doc">
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
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu thay đổi theo CSDL -->
                            <?php
                                $sql = "SELECT `doc_ID`, `doc_name`, `doc_link`, `date_sub` FROM `db_doc` WHERE teach_learn_id = '$id'";
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
            <div class="container" id="comment">
                <h2 class="my-5">Đánh giá và phản hồi</h2>
                <div class="card my-5">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <h1 class="text-warning mt-4 mb-4">
                                    <b><span id="average_rating">0.0</span> / 5</b>
                                </h1>
                                <div class="mb-3">
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                </div>
                                <h3><span id="total_review">0</span> Đánh giá</h3>
                            </div>
                            <div class="col-sm-4">
                                <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>
                                </p>
                            </div>
                            <div class="col-sm-4 text-center">
                                <h3 class="mt-4 mb-3">Viết đánh giá ở đây</h3>
                                <button type="button" name="add_review" id="add_review" class="btn btn-primary">Gửi đánh
                                    giá</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5" id="review_content"></div>
                <!-- </?php include './comment.php' ?> -->
            </div>
            <!-- Comments của sinh viên-->

            <div class="container">
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