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
                <form action="index.php?action=forget&act=resetpass" class="login-form" method="post">
                    <input type="hidden" name="email" value="">
                    <div class="form-group">
                        <label for="code">Chúng tôi đã gửi code đến địa chỉ email bạn đã nhập, vui lòng nhập code vào đây</label>
                        <input type="text" class="form-control" name="code" id="code" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit_code">Gửi code</button>
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
