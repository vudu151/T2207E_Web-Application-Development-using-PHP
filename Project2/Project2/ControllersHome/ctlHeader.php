<?php
require_once("Models/clsCategory.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$thongbao ="";

//tạo đối tượng cls
$sanpham = new clsCategory();


$ketqua = $sanpham->GetCategoryList();
$rows = $sanpham->data;

require("ViewsHome/header.php");
?>