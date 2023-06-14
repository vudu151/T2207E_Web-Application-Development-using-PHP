<?php
    function ConnectDB()
    {
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t2207e_practice_test_php","root","");
            $conn -> query("SET NAMES UTF8");    //THiết lập chế độ Unicode
        }
        catch (PDOException $ex)
        {
            echo "<p>" .$ex->getMessage() . "</p>";
        }
        return $conn;    //Trả về đối tượng PDO
    }

    //Hàm tìm kiếm và trả về mảng các bản ghi từ tbBooks
    //Default $keyword= "" nếu gọi hàm mà không truyền tham số thì nó hiện tất cả sách
    function getListBooks($keyword="",$year="")
    {
        $conn = ConnectDB();
        if($conn==null)
            return -1;     //Lỗi kết nối CSDL
        $sql = "SELECT * FROM tbBooks WHERE TRUE";
        if($keyword!="")
            $sql .= " AND title LIKE '%$keyword%'";  //Phải có DẤU CÁCH trước AND ko là lỗi đó
        if($year!="")
        {
            $sql .= " AND pub_year=$year";           //Phải có DẤU CÁCH trước AND ko là lỗi đó
        }
    
        $pdo_stm = $conn->prepare($sql);      //Tạo đối tượng PDOStatement
        $ketqua = $pdo_stm->execute();        //Trả về true/false
        if($ketqua==false)
            return -2;    //Lỗi SQL
        else
            $rows = $pdo_stm->fetchAll();
            return $rows;
    }
?>