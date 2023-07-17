<?php
require_once("Models/clsComment.php");
if($id!="" && is_numeric($id)){
	$eventcmt = new clsComment();
	$eventcmt->GetEventCommentListByEventId($id);
	if($eventcmt->data==NULL){
		$ketqua = $sanpham->DeleteEvent($id);
		if($ketqua==FALSE)
		$thongbao="Lỗi xóa dữ liệu";
		else
		$thongbao ="Xóa dữ liệu thành công";
	}
	else{
		$ketqua = $eventcmt->DeleteEventCommentByEventId($id);
		if($ketqua==FALSE)
		$thongbao="Lỗi xóa bình luận";
		$ketqua = $sanpham->DeleteEvent($id);
		if($ketqua==FALSE)
		$thongbao="Lỗi xóa dữ liệu";
		else
		$thongbao ="Xóa dữ liệu thành công";
	}
}
else
	$thongbao ="Xóa dữ liệu lỗi id sản phẩm";
require("ViewsHome/vKetqua.php");
?>
