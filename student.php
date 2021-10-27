<!-- Giao diện từng môn học
        Giao diện cho sinh viên
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
                                        </tr>
                                        <tr class="table-active">
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
                                                Approved
                                            </td>
                                        </tr>
                                        <tr class="table-success">
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                02/04/2012
                                            </td>
                                            <td>
                                                Declined
                                            </td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                03/04/2012
                                            </td>
                                            <td>
                                                Pending
                                            </td>
                                        </tr>
                                        <tr class="table-danger">
                                            <td>
                                                4
                                            </td>
                                            <td>
                                                TB - Monthly
                                            </td>
                                            <td>
                                                04/04/2012
                                            </td>
                                            <td>
                                                Call in to confirm
                                            </td>
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
            </div>
            <?php include 'footer_body.php' ?>
        </div>
    </div>

</main>

<?php include 'footer.php' ?>