<?php
    //Đây là Controllers chỉnh sửa của Module quản lý sản phẩm
    require_once("../Models/clsSanpham.php");
    //Lấy request act(them/sua/xoa/xulythem/xulysua) và id là mã của bản ghi cần sửa/xóa
    $act = isset($_REQUEST["act"]) ? $_REQUEST["act"] : "";
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    $tieude_thongbao = "Quản lý sản phẩm";
    $noidung_thongbao = "";
    $link_thongbao = "ctlSanpham.php";

    //Tạo đối tượng sanpham từ Models
    $sanpham = new clsSanpham();
    //Xử lý $cmd để gọi Controller cấp 3(thêm,sửa,xóa) hoặc các view danh sách, form thêm, form sửa
    if($act=="them") //Hiển thị form thêm sản phẩm
    {
        require("../Views/vThemSanpham.php");
    }
    else if($act=="xulythem") 
    {
        require("Xuly_ThemSanpham.php");
    }
    else if($act=="sua")
    {
        $ketqua = $sanpham->TimSanphamTheoID($id);
        require("../Views/vSuaSanpham.php");
    }
    else if($act=="xulysua")
    {
        require("Xuly_SuaSanpham.php");
    }
    else if($act=="xoa")
    {
        require("Xuly_XoaSanpham.php");
    }
    else
    {
        $ketqua = $sanpham->LayDsSanpham();
        require_once("../Views/vDsSanpham.php");
    }
?>