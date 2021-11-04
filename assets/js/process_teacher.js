//Thêm Thông báo
$("#process_add_note").on('click', function() {
    var note_mes = $('#note_mes').val();
    var teach_learn_id = $('#t_learn_id').val();
    event.preventDefault(); // Now nothing will happen // Bây giờ sẽ không có gì xảy ra
    // e.stopPropagation(); //Bây giờ sự kiện sẽ không nổi lên
    // e.stopImmediatePropagation(); // Mục bây giờ khi nhấp vào sẽ không kích hoạt
    if (note_mes == "") {
        alert("Chưa điền thông báo");
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: './process_add_note.php',
            data: {
                teach_learn_id: teach_learn_id,
                note_mes: note_mes
            },
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 0) { // Thêm thông báo thất bại
                    alert(response.message);
                } else { // Thêm thành công
                    alert(response.message);
                    location.reload();
                }
            }
        })
    }
});

//Sửa Thông báo

//Xóa Thông báo
$("#process_delete_note").on('click', function() {
    var note_id = $('#note_id').val();
    // var teach_learn_id = $('#t_learn_id').val();
    event.preventDefault(); // Now nothing will happen // Bây giờ sẽ không có gì xảy ra
    // e.stopPropagation(); //Bây giờ sự kiện sẽ không nổi lên
    // e.stopImmediatePropagation(); // Mục bây giờ khi nhấp vào sẽ không kích hoạt
    if (note_id == "") {
        alert("Có lỗi");
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: './process_delete_note.php',
            data: {
                teach_learn_id: teach_learn_id,
                note_id: note_id
            },
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 0) { // Xóa thông báo thất bại
                    alert(response.message);
                } else { // Xóa thành công
                    alert(response.message);
                    location.reload();
                }
            }
        })
    }
});