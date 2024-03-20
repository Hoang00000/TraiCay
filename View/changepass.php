<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Password Reset</title>
</head>
<body>

<section class="login-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 my-4 login-sec">
                <form action="index.php?action=dangnhap&act=doimk_action" class="login-form" method="post">
                    <input type="hidden" name="email" value="">
                    <div class="form-group">
                        <label class="text-center" for="password">Nhập mật khẩu cũ</label>
                        <input type="password" class="form-control" name="passwordold" id="password" required>
                        <label class="text-center" for="password">Nhập mật khẩu mới</label>
                        <input type="password" class="form-control" name="passwordnew" id="password" required>
                        <label class="text-center" for="password">Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" name="repasswordnew" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary text-center" name="submit_password">Xác nhận</button>
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
