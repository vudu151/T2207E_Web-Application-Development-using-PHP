<?php
require_once("Models/clsProduct.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$thongbao ="";

//tạo đối tượng cls
$sanpham = new clsProduct();


$ketqua = $sanpham->GetTheLatestProducts(10);
$rowsNew = $sanpham->data;

require("ViewsHome/home.php");
?>