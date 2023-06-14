<?php
    function ConnectDB()
    {
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t22072e_php_s5_csdl_crud","root","");
            $conn->query("SET NAMES UTF8;");
        }
        catch (PDOException $ex)
        {
            echo "<p>" . $ex->getMessage() . "</p>";
            die("<h3>Lỗi kết nối CSDL</h3>");
        }
        return $conn;   //Trả về đối tượng PDO
    }
?>