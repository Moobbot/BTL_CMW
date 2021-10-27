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
                    <div class="row text-white">
                        <div class="col-md-6">
                            <div class="page-header text-center">
                                <h1>
                                    <small>Tên môn học 1</small>
                                </h1>
                            </div>
                        </div>

                        <div class="col-md-6 text-center align-self-md-center">
                            <input type="search" name="search" id="search"><i class="fas fa-search p-2"
                                aria-hidden="true"></i>
                        </div>
                    </div>
                </header>
                <!-- Body -->
                <!-- Bao gồm bảng tài liệu và phản hồi của sinh viên -->
                <div class="row d-flex justify-content-center mt-sm-5">
                    <div class="col-md-10">
                        <!-- Bảng thông tin tài liệu -->
                        <div class="row">
                            <div class="col-md-12">
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
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                01/04/2012
                                            </td>
                                            <td>
                                                Default
                                            </td>
                                            <th>
                                                <a href="" class="btn btn-success">
                                                    Sửa
                                                </a>

                                                <a href="" class="btn btn-success">
                                                    Xóa
                                                </a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                Ex: Giáo trình mạng máy tính
                                            </td>
                                            <td>
                                                date_timestamp_get
                                            </td>
                                            <td>
                                                Default
                                            </td>
                                            <th>
                                                <a href="" class="btn btn-success">
                                                    Thêm
                                                </a>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
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