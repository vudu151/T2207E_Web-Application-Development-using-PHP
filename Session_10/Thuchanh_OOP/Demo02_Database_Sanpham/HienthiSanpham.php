<?php
    require("Models/clsSanpham.php");
    //Tạo đối tượng của lớp clsSanpham
    $sanpham = new clsSanpham();
    echo "<p>Danh mục sản phẩm: </p>";
    $ketqua = $sanpham -> LayDanhsachSanpham();
    if($ketqua)
    {
        $rows = $sanpham -> data;
        foreach($rows as $row)
        {
            echo"<p>Tên: " .$row["title"] . " - Tác giả: " .$row["author"] . " - Giá: " .$row["price"] . "</p>";
        }
    }
?>