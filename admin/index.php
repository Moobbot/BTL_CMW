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
                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#addNote">
                    Thêm
                </button>

                <table class="table table-bordered text-center" id="tb_note">
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
                    <tbody style="text-align: justify;">
                        <!-- Dữ liệu thay đổi theo CSDL -->
                        <?php
                        $sql = "SELECT note_id, note_mes, User_FullName, sub_name, node_date FROM db_note, db_user_inf, db_teach_learn, db_subjects WHERE db_note.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id GROUP BY db_note.note_id;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="col-1"><?php echo $row['note_id'] ?></td>
                            <td class="col-1"><?php echo $row['User_FullName'] ?></td>
                            <td class="col"><?php echo $row['note_mes'] ?></td>
                            <td class="col-2"><?php echo $row['node_date'] ?></td>
                            <td class="col-1"><?php echo $row['sub_name'] ?></td>
                            <td class="col-1">
                                <form>
                                    <button type="button" class="btn btn-success mb-1 passingID-edit-note"
                                        style="width: 100px;" data-bs-toggle="modal" data-bs-target="#editNote"
                                        data-value1='<?php echo $row['note_id'] ?>'
                                        data-value2='<?php echo $row['note_mes'] ?>'>
                                        Chỉnh sửa
                                    </button>
                                    <button type="button" class="btn btn-danger passingID-delete-note"
                                        style="width: 100px;" data-bs-toggle="modal" data-bs-target="#delNote"
                                        data-value1='<?php echo $row['note_id'] ?>'>
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
                                            $result1 = mysqli_query($conn, $sql1);
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                                echo "<option value =" . $row["ID"] . ">" . $row['User_FullName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <label>Môn học</label>
                                        <select name="subject-id">
                                            <?php
                                            $sql2 = "SELECT sub_id, sub_name FROM db_subjects";
                                            $result2 = mysqli_query($conn, $sql2);
                                            while ($row = mysqli_fetch_assoc($result2)) {
                                                echo "<option value =" . $row["sub_id"] . ">" . $row['sub_name'] . "</option>";
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
                                        if (response.status ==
                                            1) { // bắt hồi âm thông báo và reload location
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

                <!-- Bắt đầu script gửi giá trị vào label -->

                <script>
                $(".passingID-edit-note").click(function() {
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
                                            <label>ID</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="txtNoteEditCode" class="form-control "
                                                name="txtNoteEditCode" placeholder="Note mess" readonly />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label>Nội dung</label>
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



                <script>
                $(".passingID-delete-note").click(function() {
                    var id = $(this).attr('data-value1');
                    $("#bttAcceptDel").val(id);
                    $("delNote").val('show');
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
                                        if (response.status ==
                                            1) { // bắt hồi âm thông báo và reload location
                                            alert(response.message);
                                            location.reload();
                                        }
                                    }
                                })
                            });
                            </script>

                        </div>
                    </div>
                    <!-- Kết thúc code xóa note /script -->
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bắt đầu bảng tài liệu -->
<div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
    <div class="col-10">
        <!-- Tài liệu -->
        <div class="row">
            <div class="col-md-12">
                <h2>TÀI LIỆU</h2>
                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#addDoc">
                    Thêm
                </button>
                <table class="table table-bordered text-center">

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
                        $sql = "SELECT doc_ID, doc_name, doc_link, date_sub, User_FullName, sub_name FROM db_doc, db_user_inf, db_teach_learn, db_subjects WHERE db_doc.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id GROUP BY db_doc.doc_ID";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['doc_ID'] ?></td>
                            <td><?php echo $row['User_FullName'] ?></td>
                            <td><?php echo $row['doc_name'] ?></td>
                            <td><?php echo '<a href=' . $row['doc_link'] . '>Tải</a>' ?></td>
                            <td><?php echo $row['date_sub'] ?></td>
                            <td><?php echo $row['sub_name'] ?></td>
                            <td>
                                <button type="button" class="btn btn-success passingID-edit-doc" data-bs-toggle="modal"
                                    data-bs-target="#editDoc" data-value1='<?php echo $row['doc_ID'] ?>'
                                    data-value2='<?php echo $row['doc_name'] ?>'
                                    data-value3='<?php echo $row['doc_link'] ?>'>
                                    Chỉnh sửa
                                </button>
                                <button type="button" class="btn btn-danger passingID-delete-doc" data-bs-toggle="modal"
                                    data-bs-target="#delDoc" data-value1="<?php echo $row['doc_ID'] ?>">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Bắt đầu script truyền giá trị vào nút đồng ý -->


                <script>
                $(".passingID-delete-doc").click(function() {
                    var doc_id = $(this).attr('data-value1');
                    $("#bttAcceptDelDoc").val(doc_id);
                    $("#delDoc").val('show');
                });
                </script>
                <!-- Kết thúc script truyền giá trị vào nút đồng ý -->

                <!-- Bắt đầu modal xóa doc -->
                <div class="modal fade" id="delDoc" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa tài liệu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3 class="text-center">Bạn có muốn xóa ?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                                <button type="button" class="btn btn-success" id="bttAcceptDelDoc"
                                    name="bttAcceptDelDoc" value="">Đồng ý</button>
                            </div>
                            <!-- Bắt đầu code xóa note /script -->


                            <script>
                            $("#bttAcceptDelDoc").click(function(event) {
                                event.preventDefault();
                                var bttDelNote_ID = $(this).attr('value');
                                $.ajax({
                                    type: "POST",
                                    url: 'http://localhost/BTL_CNW/admin/process_delete_doc.php',
                                    data: {
                                        ID: bttDelNote_ID
                                    },
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
                        </div>
                    </div>

                </div>
                <!-- Bắt đầu modal thêm tài liệu -->
                <div class="modal fade" id="addDoc" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm tài liệu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                            $result1 = mysqli_query($conn, $sql1);
                                            while ($row = mysqli_fetch_assoc($result1)) {
                                                echo "<option value =" . $row["ID"] . ">" . $row['User_FullName'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <label>Môn học</label>
                                        <select name="subject-id">
                                            <?php
                                            $sql2 = "SELECT sub_id, sub_name FROM db_subjects";
                                            $result2 = mysqli_query($conn, $sql2);
                                            while ($row = mysqli_fetch_assoc($result2)) {
                                                echo "<option value =" . $row["sub_id"] . ">" . $row['sub_name'] . "</option>";
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
                                        if (response.status ==
                                            1) { // bắt hồi âm thông báo và reload location
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
                <!-- Phần code nút chỉnh sửa note-->

                <!-- Bắt đầu script gửi giá trị vào label -->
                <script>
                $(".passingID-edit-doc").click(function() {
                    var doc_id = $(this).attr('data-value1');
                    var doc_name = $(this).attr('data-value2');
                    var doc_link = $(this).attr('data-value3')
                    $("#txtDocEditCode").val(doc_id);
                    $('#txtDocEditName').val(doc_name);
                    $('#txtDocEditLink').val(doc_link);
                    $("editDoc").val('show');
                });
                </script>
                <!-- Kết thúc script gửi giá trị vào label -->
                <!-- Modal cho chỉnh sửa -->
                <div class="modal fade" id="editDoc" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="edit-doc-form">
                                <div class="modal-body">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label>ID</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="txtDocEditCode" class="form-control "
                                                name="txtDocEditCode" placeholder="Note mess" readonly />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label>Tên tài liệu</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="txtDocEditName" class="form-control "
                                                name="txtDocEditName" placeholder="Note mess" value="" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label>Đường link</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="txtDocEditLink" class="form-control "
                                                name="txtDocEditLink" placeholder="Note mess" value="" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Sửa</button>
                                    </div>
                            </form>
                            <!-- Bắt đầu code thay đổi doc /script -->

                            <script>
                            $("#edit-doc-form").submit(function(event) {
                                event.preventDefault();
                                $.ajax({
                                    type: "POST",
                                    url: 'http://localhost/BTL_CNW/admin/process_edit_doc.php',
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
                            <!-- Kết thúc code thay đổi doc/script -->
                        </div>
                    </div>
                </div>
                <!-- Kết thúc modal chỉnh sửa doc-->
            </div>
        </div>
    </div>
</div>



<!-- Bảng người dùng -->
<div class="row d-flex justify-content-center mt-sm-5 p-0 m-0 vh-100">
    <div class="col-10">
        <!-- Người dùng -->
        <div class="row">
            <div class="col-md-12">
                <h2>TÀI KHOẢN</h2>
                <table class="table table-bordered text-center">

                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Tên người dùng
                            </th>
                            <th>
                                Chức năng
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thay đổi theo CSDL -->
                        <?php
                        $sql = "SELECT user_id, user_name, User_FullName, User_Position, user_email, User_Phone, office_name, sub_id FROM db_user_inf, db_users, db_offices, db_subjects WHERE db_users.user_id = db_user_inf.ID AND db_user_inf.office_id = db_offices.office_id GROUP BY db_users.user_id;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['User_FullName'] ?></td>
                            <td>
                                <form>
                                    <button type="button" class="btn btn-primary passingDataInfo" data-bs-toggle="modal"
                                        data-bs-target="#UserInfoModal" data-value1="<?php echo $row['user_name'] ?>"
                                        data-value2="<?php echo $row['user_email'] ?>"
                                        data-value3="<?php echo $row['User_Phone'] ?>"
                                        data-value4="<?php echo $row['User_Position'] ?>"
                                        data-value5="<?php echo $row['office_name'] ?>">
                                        Xem chi tiết
                                    </button>
                                    <button type="button" class="btn btn-danger passingID-deleteAcc"
                                        data-bs-toggle="modal" data-bs-target="#delAcc"
                                        data-value1="<?php echo $row['user_id'] ?>">
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
                <!-- Bắt đầu code mở bảng xem chi tiết -->
                <!-- Truyền dữ liệu vào modal -->
                <script>
                $(".passingDataInfo").click(function() {
                    var username = $(this).attr('data-value1');
                    var user_email = $(this).attr('data-value2');
                    var user_phone = $(this).attr('data-value3')
                    var user_position = $(this).attr('data-value4');
                    var user_office = $(this).attr('data-value5');
                    $("#txtUserNameInfo").val(username);
                    $('#txtUserEmailInfo').val(user_email);
                    $('#txtUserPhoneInfo').val(user_phone);
                    $('#txtUserPositionInfo').val(user_position);
                    $('#txtOfficeInfo').val(user_office);
                    $("UserInfoModal").val('show');
                });
                </script>
                <!-- Kết thúc script truyền -->
                <div class="modal fade" id="UserInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chi tiết</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label>Tên đăng nhập</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="txtUserNameInfo" class="form-control "
                                            name="txtUserNameInfo" placeholder="Note mess" value="" readonly />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="txtUserEmailInfo" class="form-control "
                                            name="txtUserEmailInfo" placeholder="Note mess" value="" readonly />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label>Chức vụ</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="txtUserPositionInfo" class="form-control "
                                            name="txtUserPositionInfo" placeholder="Note mess" value="" readonly />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label>Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="txtUserPhoneInfo" class="form-control "
                                            name="txtUserPhoneInfo" placeholder="Note mess" value="" readonly />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label>Khoa</label>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="txtOfficeInfo" class="form-control " name="txtOfficeInfo"
                                            placeholder="Note mess" value="" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kết thúc code mở bảng xem chi tiết -->
                <!-- Bắt đầu code mở bảng xóa người dùng-->
                <!-- Truyền dữ liệu vào nút xóa -->
                <script>
                $(".passingID-deleteAcc").click(function() {
                    var user_id = $(this).attr("data-value1");
                    $("#acc_user_id").val(user_id);
                    $("#delAcc").val('show');
                });
                </script>
                <!-- Kết thúc script truyền dữ liệu -->
                <div class="modal fade" id="delAcc" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa tài khoản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="acc_del_id">
                                <div class="modal-body">
                                    <h4 class="text-center">Bạn có muốn xóa? Nếu tài khoản bạn bị xóa tất cả thông báo
                                        và
                                        tài liệu liên quan cũng bị xóa?</h4>
                                    <input type="hidden" name="acc_user_id" id="acc_user_id" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                                    <button type="submit" class="btn btn-success">Đồng ý</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- script xóa người dùng -->
                <script>
                $("#acc_del_id").submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost/BTL_CNW/admin/process_delete_account.php',
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
                <!-- script xóa người dùng kết thúc -->
                <!-- Kết thúc code mở bảng xóa người dùng-->
            </div>
        </div>
    </div>
</div>