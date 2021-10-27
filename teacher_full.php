<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include 'header.php' ?>

<main class="vh-100 bg-light">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-12">
                <!-- Header -->
                <header>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="http://www.tlu.edu.vn/">
                                <img src="assets/img/logo.jfif" alt="" width="48" height="48"
                                    class="d-inline-block align-text-top p-0 m-0">
                            </a>
                        </div>

                        <i class="fa fa-user-circle svg-inline--fa fa-w-16 fa-3x p-2" aria-hidden="true"></i>
                    </nav>

                </header>
                <!-- Body -->
                <!-- Bao gồm bảng tài liệu và phản hồi của sinh viên -->
                <div class="row d-flex justify-content-center mt-sm-5">
                    <div class="col-md-10">
                        <!-- Bảng thông tin tài liệu -->
                        <div class="row mb-4">
                            <div class="col-md-6 flex-md-row">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/img/logo.jfif" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 flex-md-row">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/img/logo.jfif" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 flex-md-row">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/img/logo.jfif" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comments của sinh viên-->
                        <div class="row">
                            <div class="col-md-12 flex-column m-md-5">
                                <input type="text" class="w-75 p-5">
                                <input type="submit" value="Gửi" class="btn btn-success ps-4 pe-4 pt-2 pb-2">
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'footer_body.php' ?>
            </div>
        </div>
    </div>

</main>

<?php include 'footer.php' ?>