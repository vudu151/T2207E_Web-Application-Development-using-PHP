<?php
    function ConnectDB()
    {
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t22072e_php_s7_csdl_crud_connect_2bang","root","");
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