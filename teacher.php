<!-- Giao diện từng môn học
        Giao diện cho Giảng viên
-->
<?php include 'header.php' ?>

<div class="container-fluid bg-light h-100 p-0 m-0">

    <?php include 'header_body.php' ?>

    <!-- Body -->
    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->
            <div class="row">
                <table class="table">
                    <thead>
                        <h2>Thông báo</h2>
                    </thead>
                    <tbody>
                        <th class="col">
                            <p class="bg-warning">
                                Quickly design and customize responsive mobile-first sites with
                                Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass
                                variables
                                and
                                mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript
                                plugins.
                            </p>
                        </th>
                        <th class="col">
                            <a href="" class="btn btn-success">Thêm</a>
                        </th>
                        <th class="col">
                            <a href="" class="btn btn-success">Sửa</a>
                        </th>
                        <th class="col">
                            <a href="" class="btn btn-success">Xóa</a>
                        </th>
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
                    <input type="text" class="w-75 p-5">
                    <input type="submit" value="Gửi" class="btn btn-success ps-4 pe-4 pt-2 pb-2">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'footer_body.php' ?>
</div>

<?php include 'footer.php' ?>