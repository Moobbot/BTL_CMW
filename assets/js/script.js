$(document).ready(function() {
    $(".submit").click(function() {
        $userName = $("#txtUser").val();
        $pass1 = $("#txtPass1").val();
        $pass2 = $("#txtPass2").val();
        $position = $("#txtPosition").val();
        $email = $("#txtEmail").val();
        $phone =$("#phone").val();
        $office_id = $("#office_id").val();
        $fullname = $("#fullname").val();
        if ($userName == "" || $pass1 == "" || $pass2 == "" || $position == "" || $email == ""||$fullname =="" || $office_id == ""|| $phone=="") {
            alert("Vui lòng nhập đầy đủ thông tin đăng kí của bạn");
            return false;
        } else {

            $.ajax({
                type: "POST",
                url: '../signup/process-register.php',
                data: {
                    signup: 'signup',
                    email: $email,
                    pass1: $pass1,
                    pass2: $pass2,
                    username: $userName,
                    position: $position,
                    phone : $phone,
                    fullname:$fullname,
                    office_id:$office_id

                },
                success: function(response) {
                    if (response == "Wrong") {
                        alert("Đã trùng tài khoản hoặc gmail");
                        window.location.href = "index.php";
                    } else if (response == "Gửi thành công!") {
                        alert("Đăng kí thành công");
                        window.location.href = "send.php";
                    }
                }
            })

        }
    });
});