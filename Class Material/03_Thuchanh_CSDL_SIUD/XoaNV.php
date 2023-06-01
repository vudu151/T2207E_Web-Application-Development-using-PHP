<?php
require("KetnoiCSDL.php");
//Lấy id từ link XoaNV?id=xxx
if(isset($_REQUEST["id"])==false)
	die("<p>chưa có id nhân viên</p>");
$id = $_REQUEST["id"];//lấy id từ Request
if($id=="" || is_numeric($id)==false)
	die("<p>id không được rỗng và phải là số</p>");
//THỰC HIỆN CÂU LỆNH INSERT,UPDATE, DELETE
$sql ="DELETE FROM tbNhanvien WHERE id=?";
$pdo_stm = $conn->prepare($sql);
$pdo_stm->bindParam(1,$id);//gán id vào dấu ? sau WHERE
$ketqua = $pdo_stm->execute();//thực hiện lệnh sql
if($ketqua==TRUE)
{
	if($pdo_stm->rowCount()>0)
		echo "<H3> THÀNH CÔNG </H3>";
	else
		echo "<H3> KHÔNG CÓ nhân viên id = $id</h3>";
}
else
	echo "<h3> LỖI XÓA DỮ LIỆU</h3>";
?>
<a href="DanhSachNV.php"> DANH SÁCH NV </a>