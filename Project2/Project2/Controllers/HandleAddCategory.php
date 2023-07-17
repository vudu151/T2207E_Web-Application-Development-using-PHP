<?php
$name = $_REQUEST["categoryname"];
$description = $_REQUEST["categorydescription"];

$ketqua = $Nhomsanpham->AddCategory($name,$description);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>