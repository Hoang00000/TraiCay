<?php
class user
{
    function checkKhachHang($user, $email)
    {
        $db = new connect();
        $select = "SELECT user, email FROM khachhang WHERE user='$user' or email='$email'";
        $result = $db->getList($select);
        return $result;
    }

    function insertKhachHang($tenkh, $user, $passnew, $email, $diachi, $sodt)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang (makh, tenkh, user, pass, email, diachi, sdt) 
        VALUES (NULL, '$tenkh', '$user', '$passnew', '$email', '$diachi', '$sodt');";
        $result = $db->exec($query);
        return $result;
    }


    function logKhachHang($user, $passnew)
    {
        $db = new connect();
        $select = "SELECT user, pass, makh, tenkh FROM khachhang WHERE user='$user' AND pass='$passnew'";
        $result = $db->getInstance($select);
        return $result;
    }
    function checkEmail($email)
            {
                $db=new connect();
                $select="select * from khachhang a
                 WHERE a.email='$email'";
                $result=$db->getList($select);
                return $result;
            }

    function updatePassEmail($email,$pass){
        $db= new connect();
        $query="update khachhang set pass='$pass' where email='$email'";
        $db->exec($query);
    }

    function checkpass($makh)
    {
        $db = new connect();
        $select = "SELECT pass FROM khachhang WHERE makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }       
    function updatePass($makh,$pass){
        $db= new connect();
        $query="update khachhang set pass='$pass' where makh=$makh";
        $db->exec($query);
    }
}

?>