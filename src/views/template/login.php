<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="shortcut icon" href="<?php echo $actual_link ?>\public\images\default\icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/login.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <title>Đăng nhập</title>
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="<?php echo $actual_link ?>\public\images\default\login_themed.jpg" alt="">
      </div>
      <div class="back">
      <img src="<?php echo $actual_link ?>\public\images\default\login_themed.jpg" alt="">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Đăng nhập</div>
          <form id="form-login" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Nhập email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Nhập mật khẩu" required>
              </div>
              <div>
                  <input id="remember-login" type="checkbox" name="remember">
                  <label for="remember-login">Ghi nhớ đăng nhập</label>
              </div>
              <div class="Forgot-password" class="text"><a href="#">Quên mật khẩu?</a></div>
              <div class="button input-box">
                <input type="submit" value="Đăng nhập">
              </div>
              <div class="text sign-up-text">Bạn không có tài khoản? <label for="flip">Đăng kí ngay</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Đăng kí</div>
        <form id="form-register" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Nhập tên" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input id="email-register" type="text" name="email" placeholder="Nhập email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input id="password-register" type="password" name="password" placeholder="Nhập mật khẩu" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Đăng kí ngay">
              </div>
              <div class="text sign-up-text">Bạn đã có tài khoản? <label for="flip">Đăng nhập ngay</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo $actual_link?>/public/javascript/login_register.js"></script>
</html>
