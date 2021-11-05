<div class="row px-0 mx-0 mt-4">
    <div class="col-12">
        <h2 class=" text-center">Tài liệu môn học</h2>
        <table class="table table-bordered table-responsive text-center">
            <thead>
                <tr>
                    <th class="col">
                        STT
                    </th>
                    <th class="col">
                        Tên tài liệu
                    </th>
                    <th class="col">
                        Ngày đăng
                    </th>
                    <th class="col">
                        Status
                    </th>
                    <th class="col"></th>
                    <th class="col"></th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu thay đổi theo CSDL -->
                <?php
                $sql = "SELECT `doc_ID`, `doc_name`, `doc_link`, `date_sub`, `status` FROM `db_doc` WHERE teach_learn_id = '$id'";
                $result = mysqli_query($conn, $sql);
                $STT = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $STT += 1;
                ?>
                <tr>
                    <th cope="row"> <?= $STT ?></th>
                    <td>
                        <a href="<?= $row['doc_link'] ?>"><?= $row['doc_name'] ?></a>
                    </td>
                    <td><?= $row['date_sub'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <button type="button" class="btn btn-success w-100 btn_delete_note"
                            value="<?= $row['note_id'] ?>"> Xóa
                        </button>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
                <tr>
                    <th>
                        <?= $STT += 1 ?>
                    </th>
                    <td>
                        <input type="text" id="" placeholder="Tên tài liệu" class="text-center mb-2">
                        <input type="text" id="" placeholder="Link tài liệu" class="text-center">
                    </td>
                    <td>
                        <input type="text" id="" placeholder="Là ngày thêm" disabled class="text-center">
                    </td>
                    <td>
                        <input type="text" id="" placeholder="Ghi chú" class="text-center">

                    </td>
                    <th>
                        <button type="button" id="btn_add_doc" value="<?php echo $id ?>"
                            class="btn btn-success">Thêm</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>