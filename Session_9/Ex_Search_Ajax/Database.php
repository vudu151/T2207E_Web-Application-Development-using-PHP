<?php
    function ConnectDB()
    {
        $conn = null;
        try
        {
            $conn = new PDO("mysql:host=localhost;dbname=t2207e_ex_search_ajax_listbooks","root","");
            $conn -> query("SET NAMES UTF8");   //THiết lập chế độ unicode
        }
        catch(PDOException $ex)
        {
            echo "<p>" .$ex->getMessage() . "</p>";   //In ra lỗi
        }
        return $conn;
    }

    //Hàm tìm kiếm và trả về các bản ghi của tbbooks .  //Default keyword="" nếu gọi hàm không truyền tham số
    function getListBooks($keyword="",$year="")
    {
        $conn = ConnectDB();
        if($conn == null)
            return -1;    //Lỗi kết nối CSDL
        $sql = "SELECT * FROM tbbooks WHERE TRUE";
        if($keyword !="")
            $sql .= " AND title LIKE '%$keyword%'";
        if($year !="")
            $sql .= " AND pub_year = $year";
        $pdo_stm = $conn -> prepare($sql);      //Khởi tạo đối tượng PDOStatement
        $ketqua = $pdo_stm ->execute();         //Thực thi câu lệnh sql
        if($ketqua==false)
            return -2;                          //Lỗi câu lệnh sql
        else    
            $rows = $pdo_stm->fetchAll();       //Lấy all dòng dữ liệu 
            return $rows; 
    }
    
?>