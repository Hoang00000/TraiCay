<?php
    $act="forget";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'forget':
            include_once "./View/forgetpassword.php";
            break;
        
        case 'forget_action':
            // nhận email về
            if(isset($_POST['submit_email']))
            {
                $email=$_POST['email'];//huynhhoang2024@gmail.com
                $_SESSION['email']=array();
                // kiểm tra xem email này có tồn tại hay không
                $kh=new user();
                $checkemail=$kh->checkEmail($email)->rowCount();
                if($checkemail>0)
                {
                    // tạo code cấp cho email
                    $code=random_int(10000,100000);
                    // tạo đối tượng
                    $item=array(
                        'id'=>$code,
                        'email'=>$email,
                    );
                    // add vào session
                    $_SESSION['email'][]=$item;
                    $_SESSION['code']=$code;
                    // tiến hàng gửi mail
                    $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;                  
                    // GMAIL username to:
                    // $mail->Username = "php22023@gmail.com";//
                    $mail->Username = "lychau2387@gmail.com";//
                    // GMAIL password
                    // $mail->Password = "php22023ngoc";
                    $mail->Password = "kxws tlbl pjob ipjx";//Phplytest20@php
                    $mail->SMTPSecure = "tls";  // ssl
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "587";// 465
                    $mail->From='lychau2387@gmail.com';
                    $mail->FromName='Ly';
                    // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                    $mail->AddAddress($email, 'reciever_name');
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body    = 'Cấp lại mã code '.$code.'';
                    if($mail->Send())
                    {
                        echo '<script> alert("Check Your Email and Click on the 
                        link sent to your email");</script>';
                        include "./View/resetcode.php";
                    }
                    else
                    {
                        echo "Mail Error - >".$mail->ErrorInfo;
                        include "./View/forgetpassword.php";
                    }
                    // include "./View/resetpw.php";
                }
                else
                {
                    echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                    include "./View/forgetpassword.php";
                }
                
            }
            break;
        case 'resetpass':
                if($_POST['code'] == $_SESSION['code']) {
                    include "./View/resetpw.php";
                } else {
                    echo '<script> alert("Sai code, vui lòng nhập lại");</script>';
                    include "./View/resetcode.php";
                }
            break;

            case 'resetpass_action':
                // Nhận mật khẩu mới từ người dùng
                if (isset($_POST['submit_password'])) {
                    $newPassword = $_POST['password'];
            
                    // Lấy thông tin từ session
                    $email = $_SESSION['email'][0]['email'];
            
                    // Tiến hành cập nhật mật khẩu
                    $saltF = "G234#!";
                    $saltL = "Ta78@#";
                    $passnew = md5($saltF . $newPassword . $saltL);
            
                    // Cập nhật mật khẩu trong cơ sở dữ liệu
                    $kh = new user();
                    $kh->updatePassEmail($email, $passnew);
            
                    // Xóa thông tin mật khẩu khỏi session
                    unset($_SESSION['email']);
            
                    // Chuyển hướng về trang đăng nhập
                    echo '<meta http-equiv="refresh" content="0;url=index.php?action=dangnhap"/>';
                }
                break;
        }
?>