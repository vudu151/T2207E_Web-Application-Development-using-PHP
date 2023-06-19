<?php
    require("Models/clsSanpham.php");
    if(isset($_REQUEST["id"])==false)
    {
        echo "<p>Link chạy bài: SuaSanpham.php?id=masach&name=ten_sach&author=tacgia&price=gia</p>";
        echo "<p>Ví dụ sửa thông tin sách có id =1</p>";
        echo "<a href= 'SuaSanpham.php?id=1&name=sach1&author=tacgia&price=1000'>Test cập nhập</a>";
        die();
    }
    //Lấy dữ liệu từ thanh địa chỉ URL
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $author = $_REQUEST["author"];
    $price = $_REQUEST["price"];
    //Tạo đói tượng của lớp clsSanpham và gọi hàm SuaSanpham
    $sanpham = new clsSanpham();
    $ketqua = $sanpham->SuaSanpham($id,$name,$author,$price);
    if($ketqua==false)
        die("<p>Lỗi sửa dữ liệu</p>");
    else
        echo("<p>Sửa dữ liệu thành công</p>");
?>