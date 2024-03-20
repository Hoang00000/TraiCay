<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8i6c6zuL7s5r7SNKkNekBDf4Y5cJ5/JN9vqH5t9RS4KTZQqA4FjL2x" crossorigin="anonymous">
  <title>Password Recovery</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-block {
      margin-top: 50px;
    }

    .login-sec {
      background: #fff;
      box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
      padding: 30px;
      border-radius: 5px;
    }

    .copy-text {
      text-align: center;
      margin-top: 20px;
      color: #666;
    }
  </style>
</head>
<body>

<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mx-auto mb-4 login-sec">
        <form action="index.php?action=forget&act=forget_action" class="login-form" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Nhập email của tài khoản để gửi code khôi phục</label>
            <input type="text" class="form-control" name="email" placeholder="">
          </div>
          <div class="form-check ps-0">
            <button type="submit" class="btn btn-primary btn-block" name="submit_email">Gửi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
