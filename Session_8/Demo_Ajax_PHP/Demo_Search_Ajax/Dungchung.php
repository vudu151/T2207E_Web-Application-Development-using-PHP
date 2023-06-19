<?php
    function KetnoiCSDL()
    {
        $conn =  null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t22072e_php_s8_search_ajax_product","root","");
            $conn -> exec("SET NAMES UTF8");
        }
        catch (PDOException $e)
        {
            echo "<h3>" . $e->getMessage() . "</h3>";
            die("<h3>Lỗi kết nối CSDL</h3>");
        }
        return $conn;
    }
?>