<?php
    require_once("tblNV.php");
    //Lấy dữ liệu từ form
    if(isset($_REQUEST["b1"])==false)
        die("<h3>Chưa nhập form</h3>" );
    $id = $_REQUEST["id"];
    $hoten = $_REQUEST["tHoten"];
    $dienthoai = $_REQUEST["tDienthoai"];
    $gioitinh = "";
    if(isset($_REQUEST["rGioitinh"])==true)
        $gioitinh = $_REQUEST["rGioitinh"];
    $hinhanh = $_REQUEST["tHinhanh"];
    //Thực hiện CRUD
    $ketqua = UpdateNV($id,$hoten,$dienthoai,$gioitinh,$hinhanh);
    if($ketqua==true)
        echo"<h3>Thành công</h3>";
    else    
        echo"<h3>Lỗi sửa dữ liệu</h3>";
?>
<a href="DSNV.php">DANH SÁCH NHÂN VIÊN</a>