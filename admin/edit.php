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

            <main class="container">
        <h2>Sửa thông tin người dùng</h2>
        
        
        <form action="process-edit.php?id=<?php echo $_GET['id']; ?>"method="post">
        
            <div class="form-group row">
                <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="user_name" name="user_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="user_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="user_email" name="user_email">
                </div>
            </div>
            <div class="form-group row">
                <label for="user_regis_date" class="col-sm-2 col-form-label">Register Date</label>
                <div class="col-sm-10">
                <input type="Date" class="form-control" id="user_regis_date" name="user_regis_date">
                </div>
            </div>
            <div class="form-group row">
                <label for="User_FullName" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="User_FullName" name="User_FullName">
                </div>
            </div>
            <div class="form-group row">
                <label for="User_Position" class="col-sm-2 col-form-label"> Position </label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="User_Position" name="User_Position">
                </div>
            </div>
        
            <div class="form-group row">
                <label for="User_Phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                <input type="tel" class="form-control" id="User_Phone" name="User_Phone">
                </div>
            </div>

            

            <div class="form-group row">
               
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
            </div>
        </form>
    </main>
        </div>
    </div>
    <!-- Footer -->
    <?php include '../reuse/footer_body.php' ?>
</div>

<?php include '../reuse/footer.php' ?>