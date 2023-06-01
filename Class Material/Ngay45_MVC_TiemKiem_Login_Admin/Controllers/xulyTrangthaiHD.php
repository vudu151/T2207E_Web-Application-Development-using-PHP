<?php
$ttht = $_REQUEST["ttht"];
$ttmoi = $_REQUEST["ttmoi"];
$chophep = "";
if($ttht==0||
	($ttht==1&&($ttmoi==2||$ttmoi==3)) ||
	($ttht==3&&($ttmoi==1||$ttmoi==2)))
	{
		$chophep="OK";
	}
if($chophep=="OK")
{
	$ketqua = $hoadon->DoiTrangThaiHoadon($id,$ttmoi);
	if($ketqua==TRUE)
		$thongbao = "CẬP NHẬT TRẠNG THÁI THÀNH CÔNG!";
	else
		$thongbao = "CẬP NHẬT TRẠNG THÁI LỖI!";
}
else
{
	$thongbao = "Trạng thái cần chuyển không hợp lệ!";
}
require("Views/vKetqua.php");
?>