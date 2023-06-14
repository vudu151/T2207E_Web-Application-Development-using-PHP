<?php
    require("Models/clsSanpham.php"); 
    $sanpham = new clsSanpham();   //Tạo đối tượng sản phẩm
    $ketqua = $sanpham->ThemSanpham("Sách 3", "Tác giả 3", 3000);
    if($ketqua==false)
        die("<p>Lỗi thêm dữ liệu</p>");
    else
        echo ("<p>Thêm dữ liệu thành côngu</p>");
        $id = $sanpham->conn->lastInsertId();
        echo ("<p>Mã sách vừa thêm là: $id</p>");
?>