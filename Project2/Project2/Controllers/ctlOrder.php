<?php
require_once("Models/clsOrder.php");
$act = "";
$id = "";
$link_tieptuc ="?module=" . $module;
$thongbao = "";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];
//tạo đối tượng clsHoadon
$hoadon = new clsOrder();
//gọi các view và các Controllers cấp dưới dựa trên biến act 
if($act == "delete"){
	require("HandleDeleteOrder.php");
}
else if($act == "detail"){
	$ketqua = $hoadon->GetOrder($id);//lấy bản ghi thông tin hóa đơn theo mahd
	if($ketqua==TRUE)
	{
		$rowHD = $hoadon->data;//lấy dòng hóa đơn (dạng mảng) từ data lưu vào $rowHD
		$totalmoney = $hoadon->GetTotalMoney($id);
		if($rowHD)
		{
			$ketqua = $hoadon->GetDetailOrder($id);
			require("Views/OrderDetail.php");
		}
		else
		{
			$thongbao = "HÓA ĐƠN KHÔNG TỒN TẠI";
			require("ViewsHome/vKetqua.php");
		}
	}
	else
	{
		$thongbao = "LỖI TRUY VẤN HÓA ĐƠN";
		require("ViewsHome/vKetqua.php");
	}
}
else if($act == "handlefix")
{
	require("HandleFixOrder.php");
}
else{ //hiển thị tất cả hóa đơn
	require("Views/order.php");
}	
?>