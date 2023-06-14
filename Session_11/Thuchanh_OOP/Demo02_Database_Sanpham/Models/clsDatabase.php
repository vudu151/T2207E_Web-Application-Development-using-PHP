<?php
    class clsDatabase
    {
        public $conn = null;    //Lưu đối tượng PDO kết nối CSDL
        public $pdo_stm = null; //Lưu đối tượng PDOStatement
        function __construct()
        {
            try
            {
                $this->conn = new PDO("mysql:host=localhost;dbname=t2207e_product_session_11","root","");
                $this->conn->exec("SET NAMES UTF8");
            }
            catch (PDOException $ex)
            {
                echo "<h3>" . $ex->getMessage() . "</h3>";
                die("<h3>Lỗi kết nối CSDL</h3>");
            }
        }

        //Xây dựng hàm thực thi dùng chung cho mọi lệnh SELECT, INSERT, UPDATE, DELETE
        //Tham số $sql : câu lệnh sql cần thực thi
        //Tham số $data: mảng chứa các dữ liệu tương ứng với tham số ? trong lệnh sql
        function ThucthiSql($sql, $data=null)
        {
            $this->pdo_stm = $this->conn->prepare($sql);
            $ketqua = false;
            if ($data!=null)
            {
                $ketqua = $this -> pdo_stm-> execute($data);
            }
            else
            {
                $ketqua = $this -> pdo_stm-> execute();
            }
            return $ketqua;
        }
    }
?>