<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Login Form</title>
</head>
<body>

<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mx-auto login-sec my-4">
        <h3 class="text-center"><b>Login Now</b></h3>
        <form action="/index.php?action=dangnhap&act=dangnhap_action" class="login-form" method="post">
        
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Username</label>
            <input type="text" class="form-control" name="txtusername" placeholder="">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
            <input type="password" class="form-control" name="txtpassword" placeholder="">
          </div>

          <div class="form-check">
            <button class="btn btn-primary btn-block" type="submit" name="submit">Đăng Nhập</button> 
          </div>

        </form>
        <div class="mt-2 text-center">
          <a href="index.php?action=forget">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
