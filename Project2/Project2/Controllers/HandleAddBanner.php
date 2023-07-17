<?php
require_once("Function/Function.php");

$image = UploadFile("f1", "images");

$ketqua = $banner->AddBanner($image);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>