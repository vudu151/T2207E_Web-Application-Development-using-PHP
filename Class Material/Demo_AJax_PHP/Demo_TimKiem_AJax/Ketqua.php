<?php
require("DungChung.php");
$conn = KetnoiCSDL();
$tukhoa="";
if(isset($_REQUEST["tukhoa"]))
	 $tukhoa = $_REQUEST["tukhoa"];
	 
$sql = "SELECT * FROM tbnhomsp";
if($tukhoa!="")
	$sql .= "  WHERE tennhom LIKE '%$tukhoa%'";
$pdo_stm = $conn->query($sql);//thực hiện lệnh sql trả về PDOStatement
if($pdo_stm==NULL)
	die("<H3>LỖI SQL</H3>");
$n =$pdo_stm->rowCount();//lấy số bản ghi kết quả
echo "<h3> số kết quả nhóm sản phẩm là $n </h3>";
//lấy mảng chứa các dòng và cột từ kết quả SELECT
$rows  = $pdo_stm->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)//lặp từng dòng trong mảng $rows lưu vào mảng 1 chiều $row	
{
	$manhom = $row["manhom"];
	$tennhom = $row["tennhom"];
	echo "<p> Mã: $manhom, Tên: $tennhom </p>";
}
?>