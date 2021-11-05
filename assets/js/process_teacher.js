//Thông báo
//#region 
//Thêm thông báo
$("#btn_add_note").on('click', function() {
    var note_mes = $('#note_mes').val();
    var teach_learn_id = $(this).val();
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



//Sửa thông báo
// $('.btn_edit_note').click(function(e) {
$('.txt_note_mes').click(function(e) {

    e.preventDefault();
    $('.txt_note_mes').off('keypress').on('keypress', function(e) {
        var note_id = $(this).data('id');
        if (e.which == 13) {
            var note_mes = $(this).val();
            // alert(note_id + ',' + note_mes);
            $.ajax({
                type: "GET",
                url: "./process_edit_note.php",
                data: { note_id: note_id, note_mes: note_mes },
                // dataType: "dataType",
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 0) { // Sửa thông báo thất bại
                        alert(response.message);
                    } else { // Sửa thành công
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        }
    });
});

//Xóa thông báo

$(".btn_delete_note").on('click', function() {
    var check = confirm('Bạn có muốn xóa thông báo này không?');
    if (check == true) {
        var note_id = $(this).val();
        $.ajax({
            type: "POST",
            url: './process_delete_note.php',
            data: {
                note_id: note_id,
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
    } else {
        return;
    }


});
//#endregion

//Tài liệu
//#region 
//Thêm thông báo
$("#btn_add_doc").on('click', function() {
    var note_mes = $('#note_mes').val();
    var teach_learn_id = $(this).val();
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



//Sửa thông báo
// $('.btn_edit_note').click(function(e) {
$('.txt_note_mes').click(function(e) {

    e.preventDefault();
    $('.txt_note_mes').off('keypress').on('keypress', function(e) {
        var note_id = $(this).data('id');
        if (e.which == 13) {
            var note_mes = $(this).val();
            // alert(note_id + ',' + note_mes);
            $.ajax({
                type: "GET",
                url: "./process_edit_note.php",
                data: { note_id: note_id, note_mes: note_mes },
                // dataType: "dataType",
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 0) { // Sửa thông báo thất bại
                        alert(response.message);
                    } else { // Sửa thành công
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        }
    });
});

//Xóa thông báo

$(".btn_delete_doc").on('click', function() {
    var check = confirm('Bạn có muốn xóa thông báo này không?');
    if (check == true) {
        var note_id = $(this).val();
        $.ajax({
            type: "POST",
            url: './process_delete_note.php',
            data: {
                note_id: note_id,
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
    } else {
        return;
    }


});
//#endregion