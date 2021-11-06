<!-- Header -->
<header class="bg-dark text-white position-sticky top-0 start-0 end-0">
    <div class="container-fluid p-0 m-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="http://localhost/BTL_CNW/" class="d-flex align-items-center mb-md-0 text-start">
                <img src="http://localhost/BTL_CNW/assets/img/logo.png" alt="" width="40" height="32"
                    class="d-inline-block align-text-top p-0 m-0 me-2">
            </a>
            <?php
            session_start();
            if (empty($_SESSION['current_user'])) {
            ?>

            <div class="text-end">
                <a href="http://localhost/BTL_CNW/login/index.php" class="btn btn-outline-light me-2">Đăng nhập</a>
                <a href="http://localhost/BTL_CNW/signup/index.php" class="btn btn-warning me-2">Đăng ký</a>
            </div>

            <?php
            } else {
                $currentUser = $_SESSION['current_user'];
            ?>
            <div>
                <!-- <label> -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-inline-block justify-content-evenly">

                    <li class="nav-item d-inline-block px-3">
                        <a class="nav-link text-uppercase px-2 active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item d-inline-block px-3">
                        <a class="nav-link text-uppercase px-2" href="#note">Thông báo</a>
                    </li>

                    <li class="nav-item d-inline-block px-3">
                        <a class="nav-link text-uppercase px-2" href="#doc">Tài liệu</a>
                    </li>
                    <?php if ($currentUser['user_level'] == 0) {
                        ?>
                    <li class="nav-item d-inline-block px-3">
                        <a class="nav-link text-uppercase px-2" href="#user">Tài khoản</a>
                    </li>
                    <?php
                        } else { ?>
                    <li class="nav-item d-inline-block px-3">
                        <a class="nav-link text-uppercase px-2" href="#comment">Bình luận</a>
                    </li>
                    <?php } ?>

                </ul>
                <!-- </label> -->
            </div>
            <div class="text-end">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <!-- Tên người đăng nhập -->
                        <?php
                            echo $currentUser['User_FullName'];

                            // $id = $currentUser['user_id'];
                            // include 'http://localhost/BTL_CNW/reuse/config.php';

                            // $sql = "SELECT User_FullName FROM db_user_inf WHERE ID = '$id'";
                            // $result = mysqli_query($conn, $sql);

                            // if (mysqli_num_rows($result) > 0) {
                            // $row = mysqli_fetch_assoc($result);
                            // echo $row['User_FullName'];
                            // mysqli_close($conn);
                            // } else {
                            // echo $currentUser['user_name'];
                            // mysqli_close($conn);
                            // }
                            ?>

                        <i class="fa fa-user-circle fa-w-16 fa-2x p-2" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="http://localhost/BTL_CNW/information/information.php">Thông
                                tin tài khoản</a></li>
                        <li><a class="dropdown-item" href="http://localhost/BTL_CNW/change_password/index.php">Đổi mật
                                khẩu</a></li>
                        <li><a class="dropdown-item" href="http://localhost/BTL_CNW/logout/index.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>

            <?php
            }
            ?>
        </div>
    </div>
</header>