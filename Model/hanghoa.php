<?php
class hanghoa
{
    function getHangHoaNew()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b WHERE a.mahh=b.idhanghoa AND a.hienthi = 0 ORDER by a.mahh DESC LIMIT 8;";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaSale()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b WHERE a.mahh=b.idhanghoa AND a.hienthi = 0 AND b.giamgia != 0 ORDER by b.giamgia DESC LIMIT 6;";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAll()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, a.hienthi FROM hanghoa a, cthanghoa b WHERE a.mahh = b.idhanghoa AND a.hienthi = 0 AND b.giamgia = 0 ORDER BY a.mahh DESC;";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAllPage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, a.hienthi 
        FROM hanghoa a, cthanghoa b 
        WHERE a.mahh = b.idhanghoa AND a.hienthi = 0 AND b.giamgia = 0 ORDER BY a.mahh DESC LIMIT " . $start . ',' . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAllSale()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b WHERE a.mahh = b.idhanghoa AND a.hienthi = 0 AND b.giamgia != 0 ORDER BY a.mahh DESC;";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAllSalePage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi
            FROM hanghoa a, cthanghoa b 
            WHERE a.mahh = b.idhanghoa AND a.hienthi = 0 AND b.giamgia != 0 
            ORDER BY a.mahh DESC 
            LIMIT " . $start . ',' . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAllXuan()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b, loai c WHERE a.mahh = b.idhanghoa AND c.maloai = a.maloai AND a.hienthi = 0 AND c.maloai = 1 ORDER BY a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAllHa()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b, loai c WHERE a.mahh = b.idhanghoa AND c.maloai = a.maloai AND a.hienthi = 0 AND c.maloai = 2 ORDER BY a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }


    function getHangHoaAllThu()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b, loai c WHERE a.mahh = b.idhanghoa AND c.maloai = a.maloai AND a.hienthi = 0 AND c.maloai = 3 ORDER BY a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }


    function getHangHoaAllDong()
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.hinh, b.giamgia, a.hienthi FROM hanghoa a, cthanghoa b, loai c WHERE a.mahh = b.idhanghoa AND c.maloai = a.maloai AND a.hienthi = 0 AND c.maloai = 4 ORDER BY a.mahh DESC";
        $result = $db->getList($select);
        return $result;
    }
    
    
    function getMenu()
    {
        $db = new connect();
        $select = "SELECT maloai, tenloai FROM loai";
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.mahh, a.tenhh, a.mota, a.luotxem, b.gia, b.slton, b.giamgia, b.hinh, c.maloai, c.tenloai 
        FROM hanghoa a, cthanghoa b, loai c WHERE a.mahh = b.idhanghoa AND a.maloai = c.maloai AND a.mahh =".$id;
        $result = $db->getInstance($select);
        return $result;
    }

    function selectTimKiem($tenhh, $start, $limit)
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh,a.luotxem, a.mota, b.hinh, b.gia, b.giamgia, a.hienthi from hanghoa a, cthanghoa b where a.mahh = b.idhanghoa and a.hienthi = 0 and a.tenhh like '%$tenhh%' order by a.mahh desc limit ".$start.",".$limit;
        $result = $db->getList($select);
        return $result;
    }

    function updateLuotXem($upluotxem, $id){
        $db = new connect();
        $query = "update hanghoa set luotxem=$upluotxem where mahh= $id";
        $db->exec($query);
    }
}
