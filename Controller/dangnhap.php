<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;

    case 'dangnhap_action':
        $user = '';
        $pass = '';
        if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            //mã hóa pass
            $saltF = "G234#!";
            $saltL = "Ta78@#";
            $passnew = md5($saltF . $pass . $saltL);

            //controller yêu cầu model truy vấn xem có user đó hay không

            $kh = new user();
            $logkh = $kh->logKhachHang($user, $passnew); //trả ra array
            if ($logkh) {
                //nếu đăng nhập thành công, thì tạo SESSION để lưu trữ thông tin
                $_SESSION['makh'] = $logkh['makh'];
                $_SESSION['tenkh'] = $logkh['tenkh'];
                echo '<script> alert("Đăng nhập thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
            } else {
                echo '<script> alert("Đăng nhập không thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=dangnhap"/>';
            }
        }
        break;

    case 'dangxuat':
        unset($_SESSION['makh']);
        unset($_SESSION['tenkh']);
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
        break;
    case 'doimk' :
        include_once "./View/changepass.php";
        break;
    case 'doimk_action':
        if (isset($_POST['submit_password'])) {
            $makh = $_SESSION['makh'];
            $passold = $_POST['passwordold'];  
            $passnew = $_POST['passwordnew'];  
            $repassnew = $_POST['repasswordnew'];  
            $saltF = "G234#!";
            $saltL = "Ta78@#";
            $passoldcheck = md5($saltF . $passold . $saltL);
            $kh = new user();
            $check = $kh->checkpass($makh);
            if($check = $passoldcheck && $passnew == $repassnew) {
                $passnewup = md5($saltF . $passnew . $saltL);
                $kh ->updatePass($makh,$passnewup);
                echo '<script> alert("Đổi mật khẩu thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
            } else {
                echo '<script> alert("Sai pass hoặc pass mới không trùng khớp")</script>';
                echo '<meta http-equiv="refresh" content="0;url=index.php?action=home"/>';
            }
        }
    case 'lichsu':
        include_once "./View/lichsu.php";
        break;
}