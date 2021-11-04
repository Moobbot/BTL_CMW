<!-- Giao diện các môn học
        Giao diện cho Giảng viên
-->
<!-- Body -->

<?php include './reuse/config.php' ?>

<div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
    <h1 class="text-center">Quản trị viên</h1>
</div>

<!-- Bắt đầu bảng thông báo -->
<div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
    <div class="col-10">
        <!-- Thông báo -->
        <div class="row">
            <div class="col-md-12">
                <h2>THÔNG BÁO</h2>
                <!-- Button trigger modal thêm note-->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNote">
                    Thêm
                </button>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Người đăng
                            </th>
                            <th>
                                Nội dung
                            </th>
                            <th>
                                Ngày đăng
                            </th>
                            <th>
                                Môn học
                            </th>
                            <th>
                                Chức năng
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thay đổi theo CSDL -->
                        <?php
                                $sql = "SELECT note_id, note_mes, User_FullName, sub_name, note_date FROM db_note, db_user_inf, db_teach_learn, db_subjects WHERE db_note.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id GROUP BY db_note.note_id;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $row['note_id'] ?></td>
                            <td><?php echo $row['User_FullName']?></td>
                            <td><?php echo $row['note_mes']?></td>
                            <td><?php echo $row['note_date']?></td>
                            <td><?php echo $row['sub_name']?></td>
                            <td>
                                <form>
                                    <button type="button" class="btn btn-success passingID-edit" data-bs-toggle="modal"
                                        data-bs-target="#editNote" data-value1='<?php echo $row['note_id']?>'
                                        data-value2='<?php echo $row['note_mes']?>'>
                                        Chỉnh sửa
                                    </button>
                                    <button type="button" class="btn btn-danger passingID-delete" data-bs-toggle="modal"
                                        data-bs-target="#delNote" data-value1='<?php echo $row['note_id']?>'>
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                                        }
                                    }
                            ?>
                    </tbody>
                </table>
                <!-- Phần code nút thêm note -->
                <!-- Modal thêm note -->
                <div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="note-form">
                                <div class="modal-body">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="txtNote" class="form-control " name="txtNote"
                                                placeholder="Note mess" />
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <label>Tên giáo viên</label>
                                        <select name="teach-learn-id">
                                            <?php
                                            $sql1 = "SELECT ID, User_FullName FROM db_user_inf";
                                            $result1 = mysqli_query($conn,$sql1);
                                            while($row = mysqli_fetch_assoc($result1)){
                                                echo "<option value =".$row["ID"].">".$row['User_FullName']."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <label>Môn học</label>
                                        <select name="subject-id">
                                            <?php
                                            $sql2 = "SELECT sub_id, sub_name FROM db_subjects";
                                            $result2 = mysqli_query($conn,$sql2);
                                            while($row = mysqli_fetch_assoc($result2)){
                                                echo "<option value =".$row["sub_id"].">".$row['sub_name']."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                            <!-- Bắt đầu script thêm -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                            <script>
                            $("#note-form").submit(function(event) {
                                event.preventDefault();
                                $.ajax({
                                    type: "POST",
                                    url: 'http://localhost/BTL_CNW/admin/process_add_note.php',
                                    data: $(this).serializeArray(),
                                    success: function(response) {
                                        response = JSON.parse(response);
                                        if (response.status == 0) { // bắt hồi âm chỉ thông báo
                                            alert(response.message);
                                        }
                                        if (response.status == 1) { // bắt hồi âm thông báo và reload location
                                            alert(response.message);
                                            location.reload();
                                        }
                                    }
                                })
                            });
                            </script>
                            <!-- Kết thúc script thêm -->
                        </div>
                    </div>
                </div>
                <!-- Kết thúc modal thêm note -->

                <!-- Phần code nút chỉnh sửa note-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <!-- Bắt đầu script gửi giá trị vào label -->
                <script>
                $(".passingID-edit").click(function() {
                    var id = $(this).attr('data-value1');
                    var note = $(this).attr('data-value2')
                    $("#txtNoteEditCode").val(id);
                    $('#txtNoteEdit').val(note);
                    $("editNote").val('show');
                });
                </script>
                <!-- Kết thúc script gửi giá trị vào label -->
                <!-- Modal cho chỉnh sửa -->
                <div class="modal fade" id="editNote" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="edit-note-form">
                                <div class="modal-body">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="txtNoteEditCode" class="form-control "
                                                name="txtNoteEditCode" placeholder="Note mess" readonly />
                                        </div>
                                    </div>

                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="txtNoteEdit" class="form-control " name="txtNoteEdit"
                                            placeholder="Note mess" value="" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </form>
                            <!-- Bắt đầu code thay đổi note /script -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                            <script>
                            $("#edit-note-form").submit(function(event) {
                                event.preventDefault();
                                $.ajax({
                                    type: "POST",
                                    url: 'http://localhost/BTL_CNW/admin/process_edit_note.php',
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
                            <!-- Kết thúc code thay đổi note/script -->
                        </div>
                    </div>
                </div>
                <!-- Kết thúc modal chỉnh sửa note-->



                <!-- Bắt đầu modal xóa note -->

                <!-- Bắt đầu code gửi giá trị vào button đồng ý -->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                $(".passingID-delete").click(function() {
                    var id = $(this).attr('data-value1');
                    $("#bttAcceptDel").val(id);
                    $("editNote").val('show');
                });
                </script>
                <!-- Kết thúc code gửi giá trị vào button đồng ý -->

                <div class="modal fade" id="delNote" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa ghi chú</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="delete-note-form">
                                <div class="modal-body">
                                    <h3 class="text-center">Bạn có muốn xóa ?</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                                    <button type="submit" class="btn btn-success" id="bttAcceptDel" name="bttAcceptDel"
                                        value="">Đồng ý</button>
                                </div>
                            </form>

                            <!-- Bắt đầu code xóa note /script -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                            <script>
                            $("#bttAcceptDel").click(function(event) {
                                event.preventDefault();
                                var btt_ID = $(this).attr('value');
                                $.ajax({
                                    type: "POST",
                                    url: 'http://localhost/BTL_CNW/admin/process_delete_note.php',
                                    data: {
                                        ID: btt_ID
                                    },
                                    success: function(response) {
                                        response = JSON.parse(response);
                                        if (response.status == 0) { // bắt hồi âm chỉ thông báo
                                            alert(response.message);
                                        }
                                        if (response.status == 1) { // bắt hồi âm thông báo và reload location
                                            alert(response.message);
                                            location.reload();
                                        }
                                    }
                                })
                            });
                            </script>
                            <!-- Kết thúc code xóa note /script -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Bắt đầu bảng tài liệu -->
    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->
            <div class="row">
                <div class="col-md-12">
                    <h2>TÀI LIỆU</h2>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDoc">
                        Thêm
                    </button>
                    <table class="table text-center">

                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Người đăng
                                </th>
                                <th>
                                    Tên tài liệu
                                </th>
                                <th>
                                    Link tải
                                </th>
                                <th>
                                    Ngày đăng
                                </th>
                                <th>
                                    Môn học
                                </th>
                                <th>
                                    Chức năng
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu thay đổi theo CSDL -->
                            <?php
                                $sql = "SELECT doc_ID, doc_name, doc_link, date_sub, User_FullName, sub_name FROM db_doc, db_user_inf, db_teach_learn, db_subjects WHERE db_doc.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id GROUP BY db_teach_learn.teach_learn_id;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo    '<tr>';
                                        echo    '<td>'.$row['doc_ID'].'</td>';
                                        echo    '<td>'.$row['User_FullName'].'</td>';
                                        echo    '<td>'.$row['doc_name'].'</td>';
                                        echo    '<td><a href='.$row['doc_link'].'>Tải</a></td>';
                                        echo    '<td>'.$row['date_sub'].'</td>';
                                        echo    '<td>'.$row['sub_name'].'</td>';
                                        echo 
                                                '<td>
                                                    <form>
                                                    <a href="./admin/edit_doc.php?id='.$row['doc_ID'].'&name='.$row['User_FullName'].'&doc_name='.$row['doc_name'].'&doc_link='.$row['doc_link'].'&sub_name='.$row['sub_name'].'"><button type="button" class="btn btn-success">Chỉnh sửa</button></a>
                                                    <a href="./admin/delete_doc.php?id='.$row['doc_ID'].'"><button type="button" class="btn btn-danger">Xóa</button></a>
                                                    </form>
                                                </td>';
                                        echo    "</tr>";
                                    }
                                }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Bắt đầu modal thêm tài liệu -->
    <div class="modal fade" id="addDoc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="doc-form">
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="txtDocName" class="form-control " name="txtDocName"
                                    placeholder="Doc name" />
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="txtLink" class="form-control " name="txtLink"
                                    placeholder="Doc link" />
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <label>Tên giáo viên</label>
                            <select name="teach-learn-id">
                                <?php
                                            $sql1 = "SELECT ID, User_FullName FROM db_user_inf";
                                            $result1 = mysqli_query($conn,$sql1);
                                            while($row = mysqli_fetch_assoc($result1)){
                                                echo "<option value =".$row["ID"].">".$row['User_FullName']."</option>";
                                            }
                                        ?>
                            </select>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <label>Môn học</label>
                            <select name="subject-id">
                                <?php
                                            $sql2 = "SELECT sub_id, sub_name FROM db_subjects";
                                            $result2 = mysqli_query($conn,$sql2);
                                            while($row = mysqli_fetch_assoc($result2)){
                                                echo "<option value =".$row["sub_id"].">".$row['sub_name']."</option>";
                                            }
                                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
                <!-- Bắt đầu script thêm -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                $("#doc-form").submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost/BTL_CNW/admin/process_add_doc.php',
                        data: $(this).serializeArray(),
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.status == 0) { // bắt hồi âm chỉ thông báo
                                alert(response.message);
                            }
                            if (response.status == 1) { // bắt hồi âm thông báo và reload location
                                alert(response.message);
                                location.reload();
                            }
                        }
                    })
                });
                </script>
                <!-- Kết thúc script thêm -->
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->
            <div class="row">
                <div class="col-md-12">
                    <h2>TÀI KHOẢN</h2>
                    <table class="table text-center">

                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên người dùng
                                </th>
                                <th>
                                    Chức vụ
                                </th>
                                <th>
                                    Số điện thoại
                                </th>
                                <th>
                                    Khoa
                                </th>
                                <th>
                                    Chức năng
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu thay đổi theo CSDL -->
                            <?php
                                $sql = "SELECT user_id, user_name, User_FullName, User_Position, user_email, User_Phone, office_name FROM db_user_inf, db_users, db_offices, db_subjects WHERE db_users.user_id = db_user_inf.ID AND db_user_inf.office_id = db_offices.office_id GROUP BY db_users.user_id;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <tr>
                                        <td><?php echo $row['user_id']?></td>
                                        <td><?php echo $row['User_FullName']?></td>
                                        <td><?php echo $row['User_Position']?></td>
                                        <td><?php echo $row['User_Phone']?></td>
                                        <td><?php echo $row['office_name']?></td>
                                        <td>
                                            <form>
                                            <a href="./admin/edit_account.php"><button type="button" class="btn btn-success">Xem chi tiết</button></a>
                                            <a href="./admin/delete_account.php"><button type="button" class="btn btn-danger">Xóa</button></a>
                                            </form>
                                        </td>
                                        </tr>  
                                <?php
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>