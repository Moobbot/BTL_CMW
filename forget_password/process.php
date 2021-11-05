<?php
session_start();
include '../reuse/config.php';

if (empty($_SESSION['changepass'])) { // Kiểm tra nếu session mang tên có trống hay ko 
    $email = $_POST['txtEmail'];
    $sql = "SELECT user_name FROM db_users WHERE user_email = '$email';"; // Câu lệnh tìm username ứng với email đã nhận qua post
    $result = mysqli_query($conn, $sql); // Kết quả trả ra số hàng của câu lệnh sql
    // $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) { // Kiểm tra email đi kèm tài khoản có tồn tại hay ko 
        $code = md5(uniqid(rand(), true)); //Tạo luôn code xác thực đổi mật khẩu
        //$_SESSION['changepass'] = $email; // Đặt session với biến email 

        $sql1 = "UPDATE db_users SET user_code = '$code' WHERE user_email = '$email'"; //Cập nhật code lần 1 để tạo ra một code mới xác thực thay đổi mật khẩu

        $result1 = mysqli_query($conn, $sql1); // Kết quả câu lệnh trả về số hàng của câu lệnh sql1

        mysqli_close($conn); // đóng kết nối

        header("Location:../forget_password/send_activation.php?email=$email"); // điều hướng đến trang email
        // $_SESSION['changepass'] = $email;
        // mysqli_close($conn);
        // header("Location:./activation.php"); // Chuyển sang trang xác thực tài khoản
    } else { // Nếu tài khoản không tồn tại trong database trả vễ array 
        echo json_encode(array(
            'status' => 0,
            'message' => 'Email chưa được sử dụng để đăng ký tài khoản'
        ));
        exit;
    }
} else {
    // vì đây là trường hợp hoàn hảo nên mọi thứ sẽ diễn ra đúng như vòng lập đã tính là biến session đã được gán sau khi ấn link activation gửi qua thư
    $pass = $_POST['txtPass'];
    $pass1 = $_POST['txtPass1'];
    $user = $_SESSION['changepass']; // vì do session đã được set dưới dạng array như bên activation nên chúng ta có thể truy xuất các giá trị theo key tương ứng
    $code = $user['code'];
    $email = $user['email'];
    $sql = "SELECT * FROM db_users WHERE user_code = '$code'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // Kiểm tra code kích hoạt có tồn tại trong bảng db_users ko 
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        if ($pass == $pass1) {
            $sql1 = "UPDATE db_users SET user_pass = '$password_hash' WHERE user_email = '$email'"; // Thay đổi mật khẩu
            $result1 = mysqli_query($conn, $sql1);

            $newcode = md5(uniqid(rand(), true)); //tạo ra một code mới coi như chấm dứt việc vòng lặp sử dụng link cũ mà vẫn đổi mật khẩu ms 
            $sql2 = "UPDATE db_users SET user_code = '$newcode' WHERE user_email = '$email'";
            $result2 = mysqli_query($conn, $sql2);

            unset($_SESSION['changepass']);
            echo json_encode(array(
                'status' => 2,
                'message' => 'Thay đổi thành công'
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Mật khẩu nhập lại không chính xác'
            ));
            exit;
        }
    } else { // Nếu code ko tồn tại thì mặc định đã được sử dụng vì sau khi thay đổi mật khẩu code sẽ lại được thay đổi lần nữa để tránh việc sử dụng lại các link đã gửi
        unset($_SESSION['changepass']);
        echo json_encode(array(
            'status' => 1,
            'message' => 'Đường link đã hết hạn, vui lòng nhập lại email để nhận lại tin nhắn kích hoạt'
        ));
        exit;
    }
}