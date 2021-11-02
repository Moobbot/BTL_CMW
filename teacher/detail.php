<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include '../reuse/header.php' ?>

<?php
session_start(); // bắt đầu session cho người đăng nhập
if (empty($_SESSION['current_user'])) {
    header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
?>
<?php
} else {
    $currentUser = $_SESSION['current_user'];
?>
<?php include '../reuse/config.php' ?>

<div class="container-fluid bg-light h-100 p-0 m-0">
    <!-- Header -->
    <header class="bg-dark text-white p-2 mb-4">
        <div class="container-fluid p-0 m-0">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="http://www.tlu.edu.vn/" class="d-flex align-items-center mb-md-0 text-start">
                    <img src="http://sinhvien.tlu.edu.vn/assets/images/logo-small.png" alt="" width="40" height="32"
                        class="d-inline-block align-text-top p-0 m-0 me-2">
                </a>

                <div class="text-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            <!-- Tên người đăng nhập -->
                            <?= $currentUser['User_FullName'] ?>

                            <i class="fa fa-user-circle fa-w-16 fa-2x p-2" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                            <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                            <li><a class="dropdown-item" href="../login/logout.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Body -->
    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
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
                                    $id = $_GET['id'];
                                    $sql = "SELECT `note_id`, `note_mes` FROM db_note WHERE teach_learn_id = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row > 0) {
                                        $row['note_mes']
                                    ?>
                            </p>
                        </th>
                        <th class="col-1">
                            <a href="" class="btn btn-success">Sửa</a>
                            <a href="" class="btn btn-success">Xóa</a>
                        </th>
                        <?php
                                    } else {
                                        echo "Không có thông báo";
                        ?>
                        </p>
                        </th>
                        <tr>
                            <th class="col">
                                <input type="text" placertrolder="Thông báo">
                            </th>
                            <th>
                                <a href="" class="btn btn-success">Thêm</a>
                            </th>
                        </tr>
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
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu thay đổi theo CSDL -->
                            <?php
                                $id = $_GET['id'];
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
                                        echo '<td>' . '<a href="' . '" class="btn btn-success">Sửa</a>' . '</td>';
                                        echo '<td>' . '<a href="' . '" class="btn btn-success">Xóa</a>' . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            <tr>
                                <th>
                                    <?= $STT += 1 ?>
                                </th>
                                <td>
                                    <input type="text" id="" placeholder="Tên tài liệu" class="text-center">
                                    <input type="text" id="" placeholder="Link tài liệu" class="text-center">
                                </td>
                                <td>
                                    <input type="text" id="" placeholder="Là ngày thêm" disabled class="text-center">
                                </td>
                                <td>
                                    <input type="text" id="" placeholder="Ghi chú" class="text-center">

                                </td>
                                <th>
                                    <a href="" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
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
    <!-- Footer -->
    <footer class="row w-100 position-absolute bottom-0 p-0 m-0">

        <div class="container-fluid text-center">
            <h1>Thông tin liên hệ</h1>
        </div>
    </footer>
</div>

<?php }
include '../reuse/footer.php' ?>

<!-- </?php $sql = "SELECT `teach_learn_id` FROM `db_teach_learn` WHERE `user_id_inf` =1 AND `sub_id` =1";?> -->