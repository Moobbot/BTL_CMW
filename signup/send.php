<?php
session_start();
$sigup_user =  $_SESSION['signup_user'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Chỉnh đường dẫn phù hợp với phần Tổ chức thư mục của BẠN
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
// Đóng gói đoạn xử lý gửi Email vào Function
// function sendEmail($recipient,$code){
// 1. Cài đặt môi trường sử dụng phpmailer
// 2. Tạo ra đối tượng PHPMailer
$mail = new PHPMailer(true); //Biến $mail đang là 1 object

// 3. Xử lý gửi Email thông qua đối tượng $mail
// Quá trình này có thể có lỗi phát sinh, dừng thực thi chương trình.
try {
    // Cấu hình tài khoản (Server) để gửi Email
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
    $mail->isSMTP(); // gửi mail SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'nguyenthuyduong542001@gmail.com'; // SMTP username
    // Thay bằng tài khoản của các bạn
    $mail->Password = 'phamquangduong123'; // SMTP password bqicengzsrdwtrdf
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    // Cấu hình thuộc tính hiển thị của người gửi - người nhận
    $mail->setFrom('ngotamCv01@gmail.com', 'Xác nhận đăng kí tài khoản');
    // Tên hiển thị: TÊN CÁC BẠN, ví dụ: Nguyễn Sơn Lâm

    $mail->addReplyTo('ngotamCv01@gmail.com', 'Xác nhận đăng kí tài khoản');

    $mail->addAddress($sigup_user['user_email']); // Đây là địa chỉ Email người nhận > sau này sẽ là BIẾN

    // Tiêu đề Email là gì?
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = '[localhost] Kích hoạt tài khoản';
    // Nội dung Email
    $mail->Body = 'Sau khi ấn vào link kích hoạt tài khoản của bạn';
    $mail->Body = 'Nhấp vào đây để kích hoạt: <a href="http://localhost/BTL_CNW/signup/activation.php?email=' . $sigup_user['user_email'] . '&code=' . $sigup_user['user_code'] . '">Nhấp vào đây</a>';
    // Tệp tên đính kèm Email gửi đi
    // $mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Nếu bạn muốn đính kèm tệp tin gửi đi

    // Gửi thư
    if ($mail->send()) {
        unset($_SESSION['signup_user']);
        // echo 'Thư đã gửi đi thành công!';
?>
<?php include '../reuse/header.php' ?>
<div class="vh-100"
    style="background: url('http://localhost/BTL_CNW/assets/img/sign_up.jpg') top center / cover repeat">
    <div class="position-absolute top-50 start-50">
        <h1>Đã gửi thư kích hoạt tài khoản</h1>
        <a href="https://mail.google.com/">
            <h2>Vui lòng vào email để kích hoạt tài khoản</h2>
        </a>
    </div>
</div>
<?php include './reuse/footer.php' ?>

<?php
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    // }