<?php
    require("Models/clsSanpham.php");
    $sanpham = new clsSanpham();   //Tạo đối tượng sản phẩm
    $ketqua = $sanpham->ThemSanpham("Sách 3","Tác giả 3", 3000);
    if($ketqua==false)
        die("<p>Lỗi thêm dữ liệu</p>");
    else
        echo ("<p>Thêm dữ liệu thành công</p>");
        $id = $sanpham->conn->lastInsertId();    //Lấy ID bản mới nhất vừa thêm vào
        echo("<p>Mã sách vừa thêm vào là: $id</p>");
?>