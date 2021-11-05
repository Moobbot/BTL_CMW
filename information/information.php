<?php include '../reuse/header.php' ?>

<div class="container-fluid bg-light h-100 p-0 m-0">

    <?php include '../reuse/header_body.php' ?>
    <?php $ID = $currentUser['user_id']; ?>

    <!-- Body -->
    <!-- Bao gồm bảng tài liệu, thông báo và thông báo  -->
    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->

            <div class="row">
                <div class="col-md-12">
                    <h2>Thông tin người dùng</h2>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editInfo">
                        Sửa thông tin
                    </button>

                    <!-- Bảng thông tin tài liệu -->
                    <main>
                        <!-- Hiển thị BẢNG DỮ LIỆU DANH BẠ CÁ NHÂN -->
                        <!-- Kết nối tới Server, truy vấn dữ liệu (SELECT) từ Bảng db_employees -->
                        <!-- Quy trình 4 bước -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã người dùng</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Thời gian đăng ký</th>
                                    <th scope="col">Tên đầy đủ</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">Số điện thoại</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                                <?php
                                // Quy trình 4 bước
                                // Bước 01: Đã tạo sẵn, gọi lại thôi
                                include '../reuse/config.php';
                                // Bước 02: Thực hiện TRUY VẤN
                                $sql = "SELECT  db_users.user_id, db_users.user_name, db_users.user_email, db_users.user_regis_date ,db_user_inf.User_FullName, db_user_inf.User_Position,db_user_inf.User_Phone
                                 FROM db_users, db_user_inf WHERE db_users.user_id = db_user_inf.ID AND db_users.user_id = '$ID'";
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

                                </tr>
                                <?php
                                    }
                                }
                                ?>

                                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                            </tbody>
                        </table>
                        <a href="../index.php"> <button class="btn btn-primary">Quay lại</button></a>
                    </main>
                    <div class="modal fade" id="editInfo" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Information change</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="editUser">
                                    <div class="modal-body">
                                        <?php
                                        $sql = "SELECT db_users.user_id, db_users.user_name, db_users.user_email, db_users.user_regis_date ,db_user_inf.User_FullName, db_user_inf.User_Position,db_user_inf.User_Phone
                                        FROM db_users, db_user_inf WHERE db_users.user_id = db_user_inf.ID AND db_users.user_id = '$ID'";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label>Tên</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="userID" id="userID" value="<?php echo $ID ?>" />
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="txtEditUserFullName" class="form-control "
                                                    name="txtEditUserFullName"
                                                    value="<?php echo $row['User_FullName'] ?>" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label>Số điện thoại</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="txtEditUserPhone" class="form-control "
                                                    name="txtEditUserPhone" value="<?php echo $row['User_Phone'] ?>" />
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Sửa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Bắt đầu script update -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
                    $("#editUser").submit(function(event) {
                        event.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: 'http://localhost/BTL_CNW/information/process_update.php',
                            data: $(this).serializeArray(),
                            success: function(response) {
                                response = JSON.parse(response);
                                if (response.status == 0) { // bắt hồi âm chỉ thông báo
                                    alert(response.message);
                                }
                                if (response.status ==
                                    1) { // bắt hồi âm thông báo và reload location
                                    alert(response.message);
                                    location.reload();
                                }
                            }
                        })
                    });
                    </script>
                    <!-- Kết thúc script update -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include '../reuse/footer_body.php' ?>
</div>

<?php include '../reuse/footer.php' ?>