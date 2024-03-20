<?php 
    if(isset($_SESSION['makh']))
    {
        $makh = $_SESSION['makh'];
        $hd = new hoadon();
        $sohd=$hd->insertHoadon($makh);
        $_SESSION['mahd'] = $sohd;
        $total=0;
        foreach($_SESSION['cart'] as $key => $item) {
            $hd->insertCTHoaDon($sohd,$item['mahh'],$item['soluong'],$item['thanhtien']);
            $total+=$item['thanhtien'];
            $slcon = $item['slton'] - $item['soluong'];
            $hd->updateSLton($item['mahh'],$slcon);
        }
        $hd->updateHoaDonTongTien($sohd,$makh,$total);
    }
    include_once "./View/order.php";
    unset($_SESSION['cart']);
?>