<?php
    if($id=="")
    {
        $noidung_thongbao = "Chưa có ID xóa";
    }
    else if(is_numeric($id)==false)
    {
        $noidung_thongbao = "ID phải là số";
    }
    else
    {
        $ketqua = $sanpham->XoaSanpham($id);
        if($ketqua==false)
            $noidung_thongbao = "Lỗi xóa sản phẩm";
        else
            $noidung_thongbao = "Xóa thành công";
    }
    include ("../Views/vThongbao.php");
?>