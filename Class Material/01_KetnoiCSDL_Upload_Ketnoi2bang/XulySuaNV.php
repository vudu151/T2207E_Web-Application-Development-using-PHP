<?php
require_once("tblNhanvien.php");
require_once("Thuvien.php");
//lấy dữ liệu từ form
if(isset($_REQUEST["b1"])==FALSE)//nếu chưa submit form
 die("<h3> Chưa nhập form</h3>");
$id = $_REQUEST["id"];
$hoten = $_REQUEST["tHoten"];
$dienthoai = $_REQUEST["tDienthoai"];
$gioitinh="";
if(isset($_REQUEST["rGioitinh"])==TRUE)//nếu chọn radio
	$gioitinh = $_REQUEST["rGioitinh"];
//$hinhanh = $_REQUEST["tHinhanh"];
$hinhanh = UploadFile("fHinhanh","Uploads/images");//lấy tên ảnh upload
//nếu không có ảnh Upload mới thì lấy tên ảnh cũ
if($hinhanh=="")
	$hinhanh = $_REQUEST["tAnhhienthai"];
$maphong = $_REQUEST["maphong"];
//THỰC HIỆN CÂU LỆNH INSERT,UPDATE, DELETE
$ketqua = UpdateNhanvien($id,$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong);
if($ketqua==TRUE)
	echo "<H3> THÀNH CÔNG </H3>";
else
	echo "<h3> LỖI Sửa DỮ LIỆU</h3>";
?>
<a href="DanhSachNV.php"> DANH SÁCH NV </a>