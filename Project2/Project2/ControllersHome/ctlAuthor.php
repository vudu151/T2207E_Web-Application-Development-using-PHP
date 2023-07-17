<?php
require_once("Models/clsAuthor.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";

//tạo đối tượng clsSanpham
$sanpham = new clsAuthor();

require("ViewsHome/author.php");
?>