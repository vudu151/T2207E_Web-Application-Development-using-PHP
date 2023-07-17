<?php
require_once("Models/clsProduct.php");
if($id!="" && is_numeric($id))
{
	$sp = new clsProduct();
	$sp->GetProductByAuthorId($id);
	if($sp->data==NULL)
	{	
        $ketqua = $sanpham->DeleteAuthor($id);
        if($ketqua==FALSE)
            $thongbao="Lỗi xóa ảnh chi tiết";
        else
            $thongbao ="Xóa dữ liệu thành công";
	}
	else
	{
		$thongbao ="Không xóa tác giả do đã có sản phẩm liên quan";
	}
}
else
	$thongbao ="Lỗi id tác giả";

require("ViewsHome/vKetqua.php");
?>