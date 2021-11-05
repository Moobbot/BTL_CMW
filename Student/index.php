<!-- Giao diện từng môn học
        Giao diện cho sinh viên
-->

<div class="row justify-content-center">
    <div class="col-md-10 col-12">
        <h2>Danh sách Giảng viên</h2>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>
                        STT
                    </th>
                    <th>
                        Tên giảng viên
                    </th>
                    <th>
                        Khoa
                    </th>
                    <th>
                        Link các môn giảng dạy
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Dữ liệu thay đổi theo CSDL -->
                    <?php
                    // Lấy tất cả id GV trong dv_users
                    $sql = "SELECT ID, User_FullName, office_name  FROM db_user_inf, db_users, db_offices  WHERE db_users.user_level = '1' AND db_user_inf.ID = db_users.user_id AND db_offices.office_id = db_user_inf.office_id ;";
                    $result = mysqli_query($conn, $sql);

                    $STT = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $STT += 1;
                            echo '<tr>';
                            echo '<th scope="row">' . $STT . '</th>';
                            echo '<td>' . $row['User_FullName'] . '</td>';
                            echo '<td>' . $row['office_name'] . '</td>';
                            echo '<td>' . '<a href="./subject/index.php?id=' . $row['ID'] . '">link</a>' . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<th>Không có giáo viên nào</th>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>

    </div>
</div>