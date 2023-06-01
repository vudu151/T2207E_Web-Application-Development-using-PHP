<?php
require_once("tblNhanvien.php");
//lấy dữ liệu từ request
if(isset($_REQUEST["id"])==false)
	die("<p>chưa có id nhân viên</p>");
$id = $_REQUEST["id"];//lấy id nhân viên
if($id=="" || is_numeric($id)==false)
	die("<p>id không được rỗng và phải là số</p>");
    
$ketqua = DeleteNhanvien($id);
if($ketqua==TRUE)
	echo "<H3> THÀNH CÔNG </H3>";
else
	echo "<h3> LỖI Xóa DỮ LIỆU</h3>";
?>
<a href="DanhSachNV.php"> DANH SÁCH NV </a>