<!-- Giao diện các môn học
        Giao diện cho Giảng viên
-->
<!-- Body -->
<?php
if (empty($_SESSION['current_user'])) {
    header("Location:../index.php"); // tạm thời head đến trang index cơ bản vì lv người dùng trong db = 0 và chưa phân chia form rõ ràng bên index
?>
<?php
} else {
    $currentUser = $_SESSION['current_user'];
}
?>

<?php include './reuse/config.php' ?>

<div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
    <div class="col-10">
        <!-- Thông báo -->
        <div class="row">
            <div class="col-md-12">
                <h2>THÔNG BÁO</h2>
                <a href="#"><button type="button" class="btn btn-success">Thêm</button></a>
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
                                $sql = "SELECT note_id, note_mes, User_FullName, sub_name, note_date FROM db_note, db_user_inf, db_teach_learn, db_subjects WHERE db_note.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo    "<tr>";
                                        echo    "<td>".$row['note_id']."</td>";
                                        echo    "<td>".$row['User_FullName']."</td>";
                                        echo    "<td>".$row['note_mes']."</td>";
                                        echo    "<td>".$row['note_date']."</td>";
                                        echo    "<td>".$row['sub_name']."</td>";
                                        echo 
                                                '<td>
                                                    <form>
                                                    <a href="#"><button type="button" class="btn btn-success">Chỉnh sửa</button></a>
                                                    <a href="#"><button type="button" class="btn btn-danger">Xóa</button></a>
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

    <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->
            <div class="row">
                <div class="col-md-12">
                    <h2>TÀI LIỆU</h2>
                    <a href="#"><button type="button" class="btn btn-success">Thêm</button></a>
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
                                $sql = "SELECT doc_ID, doc_name, doc_link, date_sub, User_FullName, sub_name FROM db_doc, db_user_inf, db_teach_learn, db_subjects WHERE db_doc.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id;";
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
                                                    <a href="edit.php?id='.$row['doc_ID'].'&name='.$row['User_FullName'].'&doc_name='.$row['doc_name'].'&doc_link='.$row['doc_link'].'&sub_name='.$row['sub_name'].'"><button type="button" class="btn btn-success">Chỉnh sửa</button></a>
                                                    <a href="delete.php?id='.$row['doc_ID'].'"><button type="button" class="btn btn-danger">Xóa</button></a>
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

        <div class="row d-flex justify-content-center mt-sm-5 p-0 m-0">
        <div class="col-10">
            <!-- Thông báo -->
            <div class="row">
                <div class="col-md-12">
                    <h2>TÀI KHOẢN</h2>
                    <a href="#"><button type="button" class="btn btn-success">Thêm</button></a>
                    <table class="table text-center">

                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên đăng nhập
                                </th>
                                <th>
                                    Tên người dùng
                                </th>
                                <th>
                                    Email
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
                                $sql = "SELECT doc_ID, doc_name, doc_link, date_sub, User_FullName, sub_name FROM db_doc, db_user_inf, db_teach_learn, db_subjects WHERE db_doc.teach_learn_id = db_teach_learn.teach_learn_id AND db_user_inf.ID = db_teach_learn.user_id_inf AND db_subjects.sub_id = db_teach_learn.sub_id;";
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
                                        echo    '<td>'.$row['sub_name'].'</td>';
                                        echo 
                                                '<td>
                                                    <form>
                                                    <a href="edit.php?id='.$row['doc_ID'].'&name='.$row['User_FullName'].'&doc_name='.$row['doc_name'].'&doc_link='.$row['doc_link'].'&sub_name='.$row['sub_name'].'"><button type="button" class="btn btn-success">Chỉnh sửa</button></a>
                                                    <a href="delete.php?id='.$row['doc_ID'].'"><button type="button" class="btn btn-danger">Xóa</button></a>
                                                    <a href="delete.php?id='.$row['doc_ID'].'"><button type="button" class="btn btn-warning">Đổi mật khẩu</button></a>
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