<?php
    session_start();
    require("Database.php");
    if(isset($_REQUEST["dathang"])==false)
        die("<h3>Chưa đặt hàng từ form</h3>");
    $hoten = $_REQUEST["hoten"];
    $diachi = $_REQUEST["diachi"];
    $dienthoai = $_REQUEST["dienthoai"];
    $ngaynhan = $_REQUEST["ngaynhan"];
    
    //Thêm hóa đơn mới 
    $mahd = ThemHoaDon($hoten,$diachi,$dienthoai,$ngaynhan);
    if($mahd==0)
        die("<h3>Lỗi thêm hóa đơn</h3>"); 
    echo "<h3>Mã hóa đơn vừa thêm là: $mahd</h3>";

    //Thêm các sản phẩm từ giỏ hàng vào chi tiết hóa đơn(mahd,masp,soluong,giamua)
    if(isset($_SESSION["Cart"])==false)
        die("<h3>Giỏ hàng trống</h3>");
    foreach($_SESSION["Cart"] as $id => $soluong)
    {
        //Lấy giá trị sản phẩm từ bảng sản phẩm
        $row = Tim_Sanpham_Theo_ID($id);
        $giasp = $row["price"];
        $macthd = ThemChitietHoaDon($mahd,$id,$soluong,$giasp);
        if($macthd==0)
            die("<h3>Lỗi thêm chi tiết hóa đơn của sản phẩm</h3>");
    }
    unset($_SESSION["Cart"]);  //Hủy giỏ hàng
    echo "<h3>Cảm ơn bạn đã mua hàng.</h3>";
    echo "<a href=\"Cart.php\">Quay về giỏ hàng </a>";
?>