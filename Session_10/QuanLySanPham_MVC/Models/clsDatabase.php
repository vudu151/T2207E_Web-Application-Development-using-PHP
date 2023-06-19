<?php
    //Lớp clsDatabase chứa 2 thuộc tính: $conn là đối tượng PDO, $pdo_stm là thực thi các câu lệnh sql và quản lý kết quả
    class clsDatabase
    {
        public $conn;
        public $pdo_stm;
        //Constructor
        function __construct()
        {
            $this->conn = null;
            $this->pdo_stm = null;
            $servername = "localhost: 3306";
            $user = "root";
            $pass = "";
            try
            {
                $this->conn = new PDO("mysql:host=$servername;dbname=t22072e_php_s10_product",$user,$pass);
                $this->conn->query("SET NAMES UTF8");
            }
            catch (PDOException $ex)
            {
                echo "<p>" .$ex->getMessage() . "</p>";
                die("<h3>Lỗi kết nối CSDL</h3>");
            }
        }

        //Hàm ThucthiSql($sql,$param) để thực thi mọi câu lệnh sql
        //Với $param là mảng chứa các giá trị gán cho dấu ? trong sql
        //$param có thể là null nếu lệnh $sql không có tham số
        function ThucthiSql($sql,$param=null)
        {
            $ketqua = false;
            if($this->conn==null)
                return false;
            $this->pdo_stm = $this->conn->prepare($sql);
            if($param==null)  //Thực thi câu lệnh không tham số
                $ketqua = $this->pdo_stm->execute();
            else
                $ketqua = $this->pdo_stm->execute($param);
            return $ketqua;
        }
    }
?>