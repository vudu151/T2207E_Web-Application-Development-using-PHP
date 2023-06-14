<?php
    require_once("tblNV.php");
    require_once("Thuvien.php");
    //Lấy dữ liệu từ form
    if(isset($_REQUEST["b1"])==false)
        die("<h3>Chưa nhập form</h3>" );
    $hoten = $_REQUEST["tHoten"];
    $dienthoai = $_REQUEST["tDienthoai"];
    $gioitinh="";
    if(isset($_REQUEST["rGioitinh"])==true)
        $gioitinh = $_REQUEST["rGioitinh"];
    //$hinhanh = $_REQUEST["tHinhanh"];
    $hinhanh = UploadFile("fHinhanh","Images");
    
    //Thực hiện câu lệnh CRUD
    $ketqua = AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh);
    if($ketqua==true)
        echo "<h3>Thành công</h3>";
    else
        echo "<h3>Lỗi thêm dữ liệu</h3>";
?>
<a href="DSNV.php">DANH SÁCH NHÂN VIÊN</a>