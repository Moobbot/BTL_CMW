<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include '../reuse/header.php' ?>

<div class="container-fluid bg-light h-100 p-0 m-0">

    <header class="bg-dark text-white p-2 mb-4">
        <div class="container-fluid p-0 m-0">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="http://www.tlu.edu.vn/" class="d-flex align-items-center mb-md-0 text-start">
                    <img src="assets/img/logo.jfif" alt="" width="40" height="32" class="d-inline-block align-text-top p-0 m-0 me-2">
                </a>

                <?php
                session_start();
                if (empty($_SESSION['current_user'])) {
                ?>

                    <div class="text-end">
                        <a href="login/" class="btn btn-outline-light me-2">Login</a>
                        <a href="signup/" class="btn btn-warning me-2">Sign-up</a>
                    </div>

                <?php
                } else {
                    $currentUser = $_SESSION['current_user'];
                ?>

                    <div class="text-end">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                <!-- Tên người đăng nhập -->
                                <?= $currentUser['User_FullName'] ?>

                                <i class="fa fa-user-circle fa-w-16 fa-2x p-2" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item" href="./login/logout.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </header>

    <!-- Body -->
    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->

            <div class="row">
                <div class="col-md-12">
                    <h2>Tài liệu môn học</h2>

            <!-- Bảng thông tin tài liệu -->
            <main>
                <!-- Hiển thị BẢNG DỮ LIỆU DANH BẠ CÁ NHÂN -->
                <!-- Kết nối tới Server, truy vấn dữ liệu (SELECT) từ Bảng db_employees -->
                <!-- Quy trình 4 bước -->
            
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Register Date</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Sửa thông tin</th>
                            <th scope="col">Xóa thông tin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                        <?php
                        // Quy trình 4 bước
                        // Bước 01: Đã tạo sẵn, gọi lại thôi
                        include '../reuse/config.php';
                        // Bước 02: Thực hiện TRUY VẤN
                        $sql = "SELECT db_users.user_id, db_users.user_name, db_users.user_email, db_users.user_regis_date ,db_user_inf.User_FullName, db_user_inf.User_Position,db_user_inf.User_Phone FROM db_users,db_user_inf WHERE db_users.user_id =db_user_inf.ID" ;
                        $result = mysqli_query($conn, $sql); //Lưu kết quả trả về vào result
                        // Bước 03: Phân tích và xử lý kết quả
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['user_id']; ?> </th>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td><?php echo $row['user_email']; ?></td>
                                    <td><?php echo $row['user_regis_date']; ?></td>
                                    <td><?php echo $row['User_FullName']; ?></td>
                                    <td><?php echo $row['User_Position']; ?></td>
                                    <td><?php echo $row['User_Phone']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $row['user_id']; ?>"><i class="fas fa-user-edit"></i></a></td>
                                    <td><a href="delete.php?id=<?php echo $row['user_id']; ?>"><i class="fas fa-user-times"></i></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                        <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                    </tbody>
                </table>
            </main>
            </div>
    </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include '../reuse/footer_body.php' ?>
</div>

<?php include '../reuse/footer.php' ?>