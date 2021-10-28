<?php include '../header.php' ?>
<?php
session_start();
if(empty($_SESSION['current_user'])){
 ?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4 signup-form" action="process-register.php" method="POST" >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="txtUser" class="form-control " name="txtUser" placeholder="User Name"/>
               
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user-cog fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">

                      <select class="form-select" aria-label="Default select example" name="txtPosition" id="txtPosition">
                      <label class="form-label" for="form3Example4c">Chức Vụ</label>
                        <option value="Giảng Viên" >Giảng Viên</option>
                        <option value="Sinh Viên" >Sinh Viên</option>
                      </select>
                    
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="txtEmail" class="form-control" name="txtEmail" placeholder="example@gmail.com"/>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="txtPass1" class="form-control" name="txtPass1" placeholder="Your Password"/>
                    
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="txtPass2" class="form-control" name="txtPass2" placeholder="Repeat Your Password" />
                  
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" class="btn btn-primary btn-lg submit" name="sbmRegister">Register</button>
                  </div>



                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="app.js"></script>
<?php
}else{
    $currentUser = $_SESSION['current_user'];
?>
<div id="login-notify" class="box-content">
    Xin Chào <?= $currentUser['User_FullName']?><br>
    <a href="#">Đổi mật khẩu</a>
    <a href="./logout.php">Đăng xuất</a>
</div>
<?php
}
?>
 <?php include '../footer.php' ?>