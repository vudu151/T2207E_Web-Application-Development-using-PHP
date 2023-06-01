<?php
require("tblNhanvien.php");
//Lấy id từ link XoaNV?id=xxx
if(isset($_REQUEST["id"])==false)
	die("<p>chưa có id nhân viên</p>");
$id = $_REQUEST["id"];//lấy id từ Request
if($id=="" || is_numeric($id)==false)
	die("<p>id không được rỗng và phải là số</p>");
//thực hiện xóa nhân viên
$ketqua = DeleteNhanvien($id);
if($ketqua==-1)
	echo "<H3> LỖI KẾT NỐI CSDL </H3>";
else if($ketqua==-2)
	echo "<H3> LỖI SQL </H3>";
else if($ketqua==0)
	echo "<H3> KHÔNG CÓ nhân viên id = $id</H3>";
else	
{
	echo "<H3> THÀNH CÔNG </H3>";
	
}
?>
<a href="DanhSachNV.php"> DANH SÁCH NV </a>