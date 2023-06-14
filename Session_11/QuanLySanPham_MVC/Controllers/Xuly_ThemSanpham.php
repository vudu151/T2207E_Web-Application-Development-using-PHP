<?php
    if(isset($_REQUEST["b1"])==false)
    {
        $noidung_thongbao = "Chưa nhập nội dung";
    }
    else
    {
        //Lấy thông tin từ form 
        $tensach = $_REQUEST["tensach"];
        $tacgia = $_REQUEST["tacgia"];
        $gia = $_REQUEST["gia"];
        $ketqua = $sanpham->ThemSanpham($tensach,$tacgia,$gia);
        if($ketqua==false)
        {
            $noidung_thongbao="Lỗi thêm sản phẩm";
        }
        else
        {
            $noidung_thongbao="Thêm sản phẩm thành công";
        }
    }
    include("../Views/vThongbao.php");
?>