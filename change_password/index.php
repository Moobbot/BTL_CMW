<?php include '../reuse/header.php' ?>

<?php
session_start();
if (empty($_SESSION['current_user'])) {
    header("Location:../login/index.php");
} else { ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đổi mật khẩu</p>
                                <form id="change-form">
                                    <div class="mx-1 mx-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="txtPass" class="form-control " name="txtPass"
                                                    placeholder="Mật khẩu mới" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="txtPass1" class="form-control "
                                                    name="txtPass1" placeholder="Nhập lại mật khẩu mới" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Xác nhận</button>
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
            if (response.status == 1) { // In ra aleart và điều hướng lại sang một trang khác
                alert(response.message);
                window.location.href = "../login/index.php";
            }
        }
    })
});
</script>

<?php include '../reuse/footer.php' ?>