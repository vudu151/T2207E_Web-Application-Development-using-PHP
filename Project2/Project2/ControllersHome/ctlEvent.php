<?php
require_once("Models/clsEvent.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
//tạo đối tượng clsSanpham
$sanpham = new clsEvent();

require("ViewsHome/event.php");
?>