<?php
    function KetnoiCSDL()
    {
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t2207e_cart","root","");
            $conn -> query("SET NAMES UTF8");
        }
        catch (PDOException $ex)
        {
            echo "<p>Lỗi kết nối CSDL</p>";
            echo "<p>" .$ex->getMessage() . "</p>";
        }
        return $conn;
    }

    //Hàm trả mảng sản phẩm
    function DanhSach_SP()
    {
        $conn = KetnoiCSDL();
        if($conn==null)
            die("<h3>Lỗi kết nối CSDL</h3>");
        $sql = "SELECT * FROM books";
        $pdo_stm = $conn -> prepare($sql);    //Khởi tạo đối tượng PDOStatement
        $ketqua = $pdo_stm -> execute();
        if($ketqua==false)
            return null;
        else
            return $pdo_stm -> fetchAll();   //Lấy tất cả các dòng dữ liệu
    }

    //Tìm kiếm sản phẩm theo id
    function Tim_Sanpham_Theo_ID($id)
    {
        $conn = KetnoiCSDL();
        if($conn==null)
            die("<h3>Lỗi kết nối CSDL</h3>");
        $sql = "SELECT * FROM books WHERE id = $id";
        $pdo_stm = $conn -> prepare($sql);   //Khởi tạo đối tượng PDOStatement
        $ketqua = $pdo_stm -> execute();     //Thực thi câu lệnh sql và gán vào biến $ketqua
        if($ketqua==false)
            return null;
        else    
            return $pdo_stm -> fetch();      //Lấy dòng dữ liệu của $id cần tìm
    }
?>