<?php
require("tblNhanvien.php");
//lấy dữ liệu từ form
if(isset($_REQUEST["b1"])==FALSE)//nếu chưa submit form
 die("<h3> Chưa nhập form</h3>");
$id = $_REQUEST["id"];//Lấy id từ thẻ <input type ="hidden" name="id"...>
$hoten = $_REQUEST["tHoten"];
$dienthoai = $_REQUEST["tDienthoai"];
$gioitinh="0";
if(isset($_REQUEST["rGioitinh"])==TRUE)//nếu chọn radio
	$gioitinh = $_REQUEST["rGioitinh"];
$hinhanh = $_REQUEST["tHinhanh"];
//THỰC HIỆN sửa dữ liệu
$ketqua = UpdateNhanvien($id,$hoten,$dienthoai,$gioitinh,$hinhanh);
if($ketqua==TRUE)
	echo "<H3> THÀNH CÔNG </H3>";
else
	echo "<h3> LỖI SỬA DỮ LIỆU</h3>";
?>
<a href="DanhSachNV.php"> DANH SÁCH NV </a>