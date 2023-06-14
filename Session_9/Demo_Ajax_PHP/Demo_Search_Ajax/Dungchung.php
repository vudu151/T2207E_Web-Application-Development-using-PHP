<?php
    function KetnoiCSDL()
    {
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t2207e_search_ajax_product","root","");
            $conn ->exec("SET NAMES UTF8");
        }
        catch (PDOException $ex)
        {
            echo "<h3>" . $ex->getMessage() . "</h3>";
            die("<h3>Lỗi kết nối CSDL</h3>");
        }
        return $conn;
    }
?>