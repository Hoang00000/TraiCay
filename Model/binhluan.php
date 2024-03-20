<?php 
    class binhluan{

        function insertBinhLuan($idkh,$idhanghoa,$content)
        {
            $db = new connect();
            $query = "insert into comment(idbl,idkh,idhh,content,luotthich) values (NULL,$idkh,$idhanghoa,'$content',0)";
            $db->exec($query);
        }

        function selectBinhLuan($idhanghoa)
        {
            $db = new connect();
            $select="select a.user,b.content from khachhang a, comment b WHERE a.makh = b.idkh and b.idhh=$idhanghoa";
            $result = $db->getList($select);
            return $result;
        }
    }

?>