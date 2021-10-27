<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include 'header.php' ?>

<div class="container-fluid bg-light h-100 p-0 m-0">
    <!-- Đầu -->
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://www.tlu.edu.vn/">
                    <img src="assets/img/logo.jfif" alt="" width="48" height="48"
                        class="d-inline-block align-text-top p-0 m-0">
                </a>
            </div>

            <!-- Dropdow -->
            <i class="fa fa-user-circle svg-inline--fa fa-w-16 fa-3x p-2" aria-hidden="true"></i>
        </nav>

    </header>

    <!-- Thân -->
    <div class="row p-0 m-0">
        <div class="col">
            <div class="row justify-content-evenly mb-4">

                <div class="card flex-md-row" style="width: 28rem;">
                    <img src="assets/img/logo.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card flex-md-row" style="width: 28rem;">
                    <img src="assets/img/logo.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuối -->
    <div class="row w-100 position-absolute bottom-0 p-0 m-0">
        <?php include 'footer_body.php' ?>
    </div>
</div>

<?php include 'footer.php' ?>