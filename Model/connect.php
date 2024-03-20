<?php 
    class connect{
        var $db = null;

        function __construct() {
            $dsn = 'mysql:host=localhost;dbname=traicay';
            $user= 'root';
            $pass= '';

            try {
                $this->db = new PDO($dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
                // echo "Kết nối thành công";
            } catch (\Throwable $th) {
                echo "Kết nối không thành công";
                echo $th;
            }
    }

    //phương thức trả ra nhiều row
    function getList($select) {
        $result = $this->db->query($select); //$this->db->query(select * from hanghoa);
        return $result; //trả về 1 table
    }

    //phương thức truy vấn cần trả về 1 row
    function getInstance($select) {
        $results = $this->db->query($select); //$this->db->query(select * from hanghoa);
        $result=$results->fetch(); //$result là array chỉ chứa 1 dòng, [mamh:1,tenmh:giày...]
        return $result;
    }

    //câu lệnh insert,update,delete -> exec làm
    function exec($query) {
        $results = $this->db->exec($query);
        return $results;
    }

    //dùng prepare
    function execp($query) {
        $statement=$this->db->prepare($query);
        return $statement;
    }
}
?>