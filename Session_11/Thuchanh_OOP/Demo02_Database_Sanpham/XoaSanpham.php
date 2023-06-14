<?php
    require("Models/clsSanpham.php");
    if(isset($_REQUEST["id"])==false)
    {
        echo "<p>Link chạy bài: XoaSanpham.php?id=masach</p>";
        echo "<p>Ví dụ xóa thông tin sách có id =1</p>";
        echo "<a href= 'XoaSanpham.php?id=1'>Test xóa</a>";
        die();
    }
    $id = $_REQUEST["id"];
    $sanpham = new clsSanpham();   //Tạo đối tượng sản phẩm
    //Gọi hàm XoaSanpham
    $ketqua = $sanpham->XoaSanpham($id);
    if($ketqua==false)
        die("<p>Lỗi xóa dữ liệu</p>");
    else
        echo("<p>Xóa dữ liệu id = $id thành công</p>");
?>