<?php
require_once("DungChung/Tienich.php");
$tensp = $_REQUEST["t1"];
$tacgia = $_REQUEST["t2"];
$gia = $_REQUEST["t3"];

$hinhanh = UploadFile("f1", "Hinhanh/Sanpham");
$tomtat = $_REQUEST["t4"];
$chitiet = $_REQUEST["t5"];
$trangthai =1;
if(isset($_REQUEST["rTrangthai"]))
	$trangthai = $_REQUEST["rTrangthai"];
$nhomsp = $_REQUEST["s1"];

$ketqua = $sanpham->ThemSanpham($tensp,$tacgia, $gia, $hinhanh,$tomtat,$chitiet,$trangthai,$nhomsp);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("Views/vKetqua.php");
?>