<?php
require("KetnoiCSDL.php");
//lấy dữ liệu từ form
if(isset($_REQUEST["b1"])==FALSE)//nếu chưa submit form
 die("<h3> Chưa nhập form</h3>");
$hoten = $_REQUEST["tHoten"];
$dienthoai = $_REQUEST["tDienthoai"];
$gioitinh="0";
if(isset($_REQUEST["rGioitinh"])==TRUE)//nếu chọn radio
	$gioitinh = $_REQUEST["rGioitinh"];
$hinhanh = $_REQUEST["tHinhanh"];
//THỰC HIỆN CÂU LỆNH INSERT,UPDATE, DELETE
$sql ="INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?)";
$pdo_stm = $conn->prepare($sql);
$pdo_stm->bindParam(1,$hoten);//gán hoten vào ? thứ 1
$pdo_stm->bindParam(2,$dienthoai);//gán dienthoai vào ? thứ 2
$pdo_stm->bindParam(3,$gioitinh);
$pdo_stm->bindParam(4,$hinhanh);
$ketqua = $pdo_stm->execute();//thực hiện lệnh sql
if($ketqua==TRUE)
	echo "<H3> THÀNH CÔNG </H3>";
else
	echo "<h3> LỖI THÊM DỮ LIỆU</h3>";
?>
<a href="DanhSachNV.php"> DANH SÁCH NV </a>