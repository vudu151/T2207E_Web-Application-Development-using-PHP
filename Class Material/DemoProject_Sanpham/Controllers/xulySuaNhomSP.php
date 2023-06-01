<?php
$id = $_REQUEST["id"];
$tennhomsp = $_REQUEST["t1"];
$thutu = $_REQUEST["t2"];
$trangthai =1;
if(isset($_REQUEST["rTrangthai"]))
	$trangthai = $_REQUEST["rTrangthai"];
$ketqua = $Nhomsanpham->SuaNhomSanpham($id,$tennhomsp,$thutu, $trangthai);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("Views/vKetqua.php");
?>