<?php
require_once("Models/clsSanpham.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//tạo đối tượng clsSanpham
$sanpham = new clsSanpham();
$ketqua = $sanpham->LaySanphamMoiNhat(3);//lấy 3 sản phẩm mới nhất
require_once("ViewsHome/v_Home.php");
?>