<?php
require_once("Models/clsOrder.php");
require_once("Models/clsComment.php");

if($id!="" && is_numeric($id))
{
	$hd = new clsOrder();
	$hd->GetProductOrderByProductId($id);
	if($hd->data==NULL) //nếu chưa có sản phẩm nào trong hóa đơn liên quan thì xóa
	{	
        $pimage = new clsProduct();
        $pimage->GetProductImageByProductId($id);
        $productcmt = new clsComment();
        $productcmt->GetProductCommentListByProductId($id);

		if($pimage->data==NULL)
        {

            if($productcmt->data==NULL)
            {
                $ketqua = $sanpham->DeleteProduct($id);
                if($ketqua==FALSE)
                    $thongbao="Lỗi xóa dữ liệu";
                else
                    $thongbao ="Xóa dữ liệu thành công";
            }
            else
            {
                $ketqua = $productcmt->DeleteProductCommentByProductId($id);
                if($ketqua==FALSE)
                    $thongbao="Lỗi xóa bình luận";
                $ketqua = $sanpham->DeleteProduct($id);
                if($ketqua==FALSE)
                    $thongbao="Lỗi xóa dữ liệu";
                else
                    $thongbao ="Xóa dữ liệu thành công";
            }
        }
        else
        {
            $ketqua = $sanpham->DeleteProductImageByProductId($id);
            if($ketqua==FALSE)
                $thongbao="Lỗi xóa ảnh chi tiết";

            
            if($productcmt->data==NULL)
            {
                $ketqua = $sanpham->DeleteProduct($id);
                if($ketqua==FALSE)
                    $thongbao="Lỗi xóa dữ liệu";
                else
                    $thongbao ="Xóa dữ liệu thành công";
            }
            else
            {
                $ketqua = $productcmt->DeleteProductCommentByProductId($id);
                if($ketqua==FALSE)
                    $thongbao="Lỗi xóa bình luận";
                $ketqua = $sanpham->DeleteProduct($id);
                if($ketqua==FALSE)
                    $thongbao="Lỗi xóa dữ liệu";
                else
                    $thongbao ="Xóa dữ liệu thành công";
            }
        }
	}
	else
	{
		$thongbao ="Không xóa sản phẩm do đã có chi tiết hóa đơn liên quan";
	}
}
else
	$thongbao ="Lỗi id sản phẩm";

require("ViewsHome/vKetqua.php");
?>