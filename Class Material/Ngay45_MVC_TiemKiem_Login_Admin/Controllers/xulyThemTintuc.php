<?php
$tieude = $_REQUEST["t1"];
$tomtat = $_REQUEST["t2"];
$noidung = $_REQUEST["t3"];
$hinhanh = $_REQUEST["t4"];
$trangthai =0;
if(isset($_REQUEST["c1"]))
	$trangthai = $_REQUEST["c1"];
	
$ketqua = $tintuc->ThemTintuc($tieude,$tomtat, $noidung, $hinhanh,$trangthai);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("Views/vKetqua.php");
?>