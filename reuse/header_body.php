<!-- Header -->
<header class="position-sticky top-0 start-0 end-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class=" container-fluid">
            <a href="http://localhost/BTL_CNW/" class="d-flex align-items-center me-5">
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
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-between" id="navbarSupportedContent">
                <!-- <label> -->
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item px-3">
                        <a class="nav-link text-uppercase px-2 text-white active" aria-current="page" href="#">Trang
                            chủ</a>
                    </li>

                    <li class="nav-item px-3">
                        <a class="nav-link text-uppercase px-2 text-white" href="#note">Thông báo</a>
                    </li>

                    <li class="nav-item px-3">
                        <a class="nav-link text-uppercase px-2 text-white" href="#doc">Tài liệu</a>
                    </li>
                    <?php if ($currentUser['user_level'] == 0) {
                        ?>
                    <li class="nav-item px-3">
                        <a class="nav-link text-uppercase px-2 text-white" href="#user">Tài khoản</a>
                    </li>
                    <?php
                        } else { ?>
                    <li class="nav-item px-3">
                        <a class="nav-link text-uppercase px-2" href="#comment">Bình luận</a>
                    </li>
                    <?php } ?>
                </ul>
                <!-- </label> -->

                <!-- <div> -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <!-- Tên người đăng nhập -->
                        <?php
                            echo $currentUser['User_FullName'];
                            ?>

                        <i class="fa fa-user-circle fa-w-16 fa-2x p-2" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="http://localhost/BTL_CNW/information/information.php">Thông
                                tin tài khoản</a></li>
                        <li><a class="dropdown-item" href="http://localhost/BTL_CNW/change_password/index.php">Đổi
                                mật khẩu</a></li>
                        <li><a class="dropdown-item" href="http://localhost/BTL_CNW/logout/index.php">Đăng
                                xuất</a>
                        </li>
                    </ul>
                </div>
                <!-- </div> -->
                <!-- </div> -->

                <?php
            }
                ?>
            </div>
    </nav>
</header>