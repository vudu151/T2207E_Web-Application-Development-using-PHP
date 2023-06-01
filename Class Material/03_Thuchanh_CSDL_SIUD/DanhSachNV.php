<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách nhân viên</title>
</head>
<body>
<h1 style="text-align: center; color: #090;">DANH SÁCH NHÂN VIÊN</h1>
<p><a href="ThemNV.php">Thêm nhân viên</a></p>
<?php
require("KetnoiCSDL.php");
$sql = "SELECT * FROM tbNhanvien";
$pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
$ketqua = $pdo_stm->execute();//thực thi câu sql
if($ketqua==FALSE)
	die("<h3>LỖI CÂU LỆNH SQL</H3>");
if($pdo_stm->rowCount()<=0)
	die("<h3>CHƯA CÓ DỮ LIỆU</h3>");
//lấy các dòng từ csdl dạng mảng 2 chiều
$rows = $pdo_stm->fetchAll(PDO::FETCH_BOTH);
//print_r($rows);
?>
<table width="974" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr bgcolor="#FFCC33">
    <td width="80">ID</td>
    <td width="210">Họ tên</td>
    <td width="166">Điện thoại</td>
    <td width="139">Giới tính</td>
    <td width="132">Hình ảnh</td>
    <td width="173">Xử lý</td>
  </tr>
  <?PHP
  foreach($rows as $row)
  {
  ?>
  <tr>
    <td><?=$row["id"]?></td>
    <td><?=$row["hoten"]?></td>
    <td><?=$row["dienthoai"]?></td>
    <td><?=($row["gioitinh"]==0)?"Nam":"Nữ"?></td>
    <td><?=$row["hinhanh"]?></td>
    <td>
    	<a href="SuaNV.php?id=<?=$row["id"]?>">Sửa</a> 
        - 
        <a href="XoaNV.php?id=<?=$row["id"]?>" 
        	onClick="return confirm('chắc chắn xóa?');">Xóa</a>
    </td>
  </tr>
  <?php
  }//đóng foreach
  ?>
</table>
</body>
</html>