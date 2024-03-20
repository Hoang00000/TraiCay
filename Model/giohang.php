<?php
// session_start();
// include 'hanghoa.php'; // Thay 'hanghoa.php' bằng tên file chứa lớp hanghoa

class giohang
{
    function addCart($mahh, $soluong)
    {
        $sanpham = new hanghoa();
        $sp = $sanpham->getHangHoaId($mahh);
        $tenhh = $sp['tenhh'];
        $gia = $sp['gia'];
        $giamgia = $sp['giamgia'];
        $hinh = $sp['hinh'];
        $slton = $sp['slton'];
        $total = $soluong * ($giamgia != 0 ? $giamgia : $gia);
        $flag = false;

        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh) {
                $flag = true;
                $soluong += $item['soluong'];
                if($_SESSION['cart'][$key]['slton'] < $soluong) {
                    $soluong = $_SESSION['cart'][$key]['slton'];
                }
                $this->updateHH($key, $soluong);
            }
        }
        if ($flag == false) {
            $item = array(
                'mahh' => $mahh,
                'hinh' => $hinh,
                'tenhh' => $tenhh,
                'soluong' => $soluong,
                'slton' => $slton,
                'gia' => $gia,
                'giamgia' => $giamgia,
                'thanhtien' => $total
            );
            $_SESSION['cart'][] = $item;
        }
    }

    function getSubTotal(){
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal += $item['thanhtien'];
        }
        $subtotal=number_format($subtotal);
        return $subtotal;
    }

    function updateHH($index, $soluong)
    {
        if ($soluong <= 0) {
            unset($_SESSION['cart'][$index]);
        } else {
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tiennew = $_SESSION['cart'][$index]['soluong'] * ($_SESSION['cart'][$index]['giamgia'] != 0 ? $_SESSION['cart'][$index]['giamgia'] : $_SESSION['cart'][$index]['gia']);
            $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
        }
    }
}
?>
