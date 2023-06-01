<?php
if($id!="" && is_numeric($id))
{
	$ketqua = $tintuc->XoaTintuc($id);
	if($ketqua==FALSE)
		$thongbao="Lỗi xóa dữ liệu";
	else
		$thongbao ="Xóa dữ liệu thành công";
}
else
	$thongbao ="Xóa dữ liệu lỗi id sản phẩm";

require("Views/vKetqua.php");
?>