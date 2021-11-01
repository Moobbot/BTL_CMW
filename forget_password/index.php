<?php include '../reuse/header.php' ?>

<?php
session_start();
if(empty($_SESSION['changepass'])){ // Form nhập email quên mật khẩu
?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Change password</p>
                                <div class="mx-1 mx-md-4">
                                    <form id="change-form">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="txtEmail" class="form-control " name="txtEmail"
                                                    placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}else // Sau khi process đã chạy xong và chạy đến send_activation điều kiện hoàn hảo thì thư được gửi và unset cái session để form này ko bị lộ ra
      // Điều kiện ngoại lệ trường hợp send activation ko hoạt động người dùng có thể đổi mật khẩu ngay tại bước process do vòng lặp đầu đã set session (hiện tại chưa có phương án fix)
{?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Change password</p>
                                <form id="change-form" >
                                    <div class="mx-1 mx-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="txtPass" class="form-control " name="txtPass"
                                                    placeholder="New password" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="txtPass1" class="form-control " name="txtPass1"
                                                    placeholder="Type your password again" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php   
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    // Script này sẽ bắt sự kiện submit gửi các biến của change-form đi qua kiểu post và nhận các biến respon trở về
$("#change-form").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: './process.php',
        data: $(this).serializeArray(),
        success: function(response) {
            response = JSON.parse(response);
            if (response.status == 0) { // Bắt các sự kiện chỉ in ra aleart
                alert(response.message);
            }
            if (response.status == 1) { // Bắt các sự kiện có thay đổi về form giao diện hiện tại và in ra aleart
                alert(response.message);
                location.reload();
            }
            if (response.status == 2){// In ra aleart và điều hướng lại sang một trang khác
                alert(response.message);
                window.location.href="../index.php";
            }
        }
    })
});
</script>

<?php include '../reuse/footer.php' ?>