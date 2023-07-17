<?php
$id = $_REQUEST["id"];
$name = $_REQUEST["categoryname"];
$description = $_REQUEST["categorydescription"];

$ketqua = $Nhomsanpham->FixCategory($id,$name,$description);
if($ketqua==FALSE)
	$thongbao="Lỗi sửa dữ liệu";
else
	$thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>