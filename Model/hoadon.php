<?php 
    class hoadon {
        function insertHoadon($makh) {
            $date = new DateTime('now');
            $ngay = $date->format('Y-m-d');
            $db = new connect();
            $query = "insert into hoadon(mahd,makh,ngaydat,tongtien) values(Null,$makh,'$ngay',0)";
            $db->exec($query);
            $select = "select mahd from hoadon order by mahd desc limit 1";
            $mahd = $db->getInstance($select);
            return $mahd[0];
        }

        function insertCTHoaDon($mahd, $mahh, $soluongmua, $thanhtien) {
            $db = new connect();
            $query = "insert into cthoadon(mahd,mahh,slmua,thanhtien) values($mahd,$mahh,$soluongmua,$thanhtien)";
            $db->exec($query);
        }

        function updateHoaDonTongTien($mahd,$makh,$tongtien){
                $db = new connect();
                $query = "update hoadon set tongtien=$tongtien where mahd=$mahd and makh=$makh";
                $db->exec($query);
        }

        function selectThongTinKHHD($mahd){
            $db= new connect();
            $select="select b.mahd, b.ngaydat, a.tenkh, a.diachi, a.sdt from khachhang a INNER JOIN hoadon b on a.makh=b.makh WHERE mahd=$mahd";
            $result=$db->getInstance($select);
            return $result;
        }

        function selectThongTinHHID($mahd){
            $db = new connect();
            $select="select DISTINCT a.tenhh, b.gia, c.slmua from hanghoa a, cthanghoa b, cthoadon c WHERE a.mahh = b.idhanghoa and a.mahh=c.mahh and c.mahd = $mahd;";
            $result=$db->getList($select);
            return $result;
            }

            function selectTongTienHD($mahd){
                $db = new connect();
                $select="SELECT tongtien FROM hoadon WHERE mahd=$mahd;";
                $result=$db->getInstance($select);
                return $result;
                }

            function selectThongTinKH($makh){
                $db= new connect();
                $select="select b.mahd, b.ngaydat, a.tenkh, a.diachi, a.sdt, b.tongtien, b.tinhtrang from khachhang a INNER JOIN hoadon b on a.makh=b.makh WHERE a.makh = $makh ORDER BY mahd DESC";
                $result=$db->getList($select);
                return $result;
            }

            function countLS($makh){
                $db= new connect();
                $select="SELECT mahd FROM `hoadon` WHERE makh = $makh";
                $result=$db->getInstance($select);
                return $result;
            }
            
            function updateSLton($mahh,$soluong){
                $db = new connect();
                $query = "update cthanghoa set slton=$soluong where idhanghoa=$mahh";
                $db->exec($query);
        }   
        

        function getTinhTrang($tinhtrang)
    {
        $db = new connect();
        $select = "select tentt from tinhtrang WHERE matt = $tinhtrang LIMIT 1";
        $result = $db->getInstance($select);
        return $result['tentt'];
    }
    }

?>