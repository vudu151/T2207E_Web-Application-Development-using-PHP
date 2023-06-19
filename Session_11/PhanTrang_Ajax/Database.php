<?php
    function KetnoiCSDL()
    {
        $servername = "localhost:3306";
        $user = "root";
        $pass = "";
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=t22072e_php_s11_phantrang",$user,$pass);
            $conn->query("SET NAMES UTF8;");
        }
        catch (PDOException $e)
        {
            echo"<p>Lỗi kết nối CSDL</p>";
            echo"<p>" .$e->getMessage() . "</p>";
        }
        return $conn;
    }

    //Đếm tổng số sản phẩm 
    function DemTongSoSanPham()
    {
        $conn = KetnoiCSDL();
        if($conn==null)
            die("<h3>Lỗi kết nối CSDL</h3>" );
        $sql = "SELECT COUNT(*) as Tong FROM books";
        $pdo_stm = $conn->prepare($sql);
        $ketqua = $pdo_stm->execute();
        if($ketqua==false)
            return null;
        else
        {
            $row = $pdo_stm->fetch();
            return $row["Tong"];
        }
    }

    //Hàm trả về số lượng $limit sản phẩm bắt đầu từ vị trí $start
    function DanhSach_SP_Theo_Vitri($start,$limit)
    {
        $conn = KetnoiCSDL();
        if($conn==null)
             die("<h3>Lỗi kết nối CSDL</h3>" );
        $sql = "SELECT * FROM books LIMIT $start, $limit";
        $pdo_stm = $conn->prepare($sql);
        $ketqua = $pdo_stm->execute();
        if($ketqua==false)
            return null;
        else
        {
            return $pdo_stm->fetchAll();
        }
    }
?>