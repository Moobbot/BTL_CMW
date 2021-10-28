<?php include 'header.php' ?>
<div class="container-fluid ps-0 pe-0">
    <header class="p-2 bg-dark text-white mb-md-4">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="http://www.tlu.edu.vn/" class="d-flex align-items-center mb-lg-0 text-white">
                    <img src="assets/img/logo.jfif" alt="" width="40" height="32"
                        class="d-inline-block align-text-top p-0 m-0 me-2">
                </a>

                <div class="text-end">
                    <a href="login/" class="btn btn-outline-light me-2">Login</a>
                    <a href="signup/" class="btn btn-warning me-2">Sign-up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Body -->
    <div class="row p-0 m-0 mt-4">
        <div class="col">
            <h2>Các khóa học hiện tại</h2>
            <?php include 'subject.php'; ?>
        </div>
    </div>
</div>



<?php include 'footer.php' ?>