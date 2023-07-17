<?php
require_once("Models/clsProduct.php");
require_once("Models/clsCategory.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$keyword = isset($_REQUEST["keyword"])? $_REQUEST["keyword"]:"";
$categoryid = isset($_REQUEST["categoryid"])?$_REQUEST["categoryid"]:0;
$sell = isset($_REQUEST["sell"])?$_REQUEST["sell"]:"";
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();

require("ViewsHome/product_list.php");
?>