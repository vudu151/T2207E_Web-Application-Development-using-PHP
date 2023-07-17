<?php
require_once("Function/Function.php");
$id = $_REQUEST["id"];
$status = $_REQUEST["selectStatus"];

$ketqua = $hoadon->FixStatusOrder($id,$status);
if($ketqua==FALSE)
	$thongbao="Lỗi sửa dữ liệu";
else
	$thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>