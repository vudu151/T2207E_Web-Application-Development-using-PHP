<?php
    class clsDatabase
    {
        public $conn = null;   //Khởi tạo đối tượng PDO kết nối CSDl
        public $pdo_stm = null;   //Tạo đối tượng PDOStatement
        //Constructor
        function __construct()
        {
            try
            {
                $this->conn = new PDO("mysql:host=localhost;dbname=t22072e_php_s10_product","root","");
                $this->conn->exec("SET NAMES UTF8");  //Thiết lập chế độ Unicode
            }
            catch (PDOException $ex)
            {
                echo "<h3>" .$ex->getMessage() . "</h3>";
                die("<h3>Lỗi kết nối CSDL</h3>");
            }
        }

        //Xây dựng hàm thực thi dùng chung cho mọi lệnh CRUD
        //Tham số $sql : câu lệnh sql cần phải thực thi
        //Tham số $data: mảng chứa các dữ liệu ứng với tham sô ? trong lệnh sql
        function ThucthiSql($sql, $data=null)
        {
            $this->pdo_stm = $this->conn->prepare($sql);
            $ketqua = false;
            if($data!=null)
            {
                $ketqua = $this->pdo_stm->execute($data);
            }
            else
            {
                $ketqua = $this->pdo_stm->execute();
            }
            return $ketqua;
        }
    }
?>