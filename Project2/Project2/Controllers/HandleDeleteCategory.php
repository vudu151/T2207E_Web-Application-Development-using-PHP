<?php
require_once("Models/clsProduct.php");
if($id!="" && is_numeric($id)){
	$sp = new clsProduct();
	$sp->GetProductByCategoryId($id);//tìm các sản phẩm của nhóm có id này
	if($sp->data==NULL){ //nếu chưa có sản phẩm nào liên quan thì xóa
		$ketqua = $Nhomsanpham->DeleteCategory($id);
		if($ketqua==FALSE)
		$thongbao="Lỗi xóa dữ liệu";
		else
		$thongbao ="Xóa dữ liệu thành công";
	}
	else{//có sản phẩm thuộc nhóm
		$thongbao ="Nhóm SP có sản phẩm liên quan";
	}
}
else
	$thongbao ="Xóa dữ liệu lỗi id sản phẩm";
require("ViewsHome/vKetqua.php");
?>