<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>
<body>
<h1 style="text-align: center; color: #090;">DANH SÁCH NHÂN VIÊN</h1>
<p><a href="ThemNV.php">thêm nhân viên</a></p>
<?php
require_once("fnCSDL.php");
require_once("Thuvien.php");
$maphong = 0; //gán mặc định mã phòng tìm kiếm = 0 (trường hợp mở DanhSachNV lần đầu)
if(isset($_REQUEST["maphong"]))//nếu chọn mã phòng từ danh sách
$maphong = $_REQUEST["maphong"];//lấy mã phòng chọn từ form
?>
<div style="margin: 10px auto; width:500px">
  <form name="f1" id="f1" action="" method="get">
    Phòng ban:
    <select name="maphong" id="maphong" onchange="document.f1.submit();">
      <option value="0">Tất cả phòng ban</option>
      <?php
      TaoSelect("tbPhongban","maphong","tenphong",$maphong);
      ?>
    </select>
  </form>
</div>
<table width="1109" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="87" bgcolor="#FF9900">ID</td>
    <td width="212" bgcolor="#FF9900">HỌ TÊN</td>
    <td width="150" bgcolor="#FF9900">ĐIỆN THOẠI</td>
    <td width="165" bgcolor="#FF9900">GIỚI TÍNH</td>
    <td width="209" bgcolor="#FF9900">HÌNH ẢNH</td>
    <td width="100" bgcolor="#FF9900">PHÒNG BAN</td>
    <td width="172" bgcolor="#FF9900">XỬ LÝ</td>
  </tr>
<?php
require_once("tblNhanvien.php");
$rows = getListNhanvien($maphong);
if($rows==NULL)
    die("<p> LỖI CƠ SỞ DỮ LIỆU </p>");
foreach($rows as $row)//lặp từng dòng
{
  $hinhanh = $row["hinhanh"]==""?"no-image.png":$row["hinhanh"];
?>
  <tr>
    <td><?=$row["id"]?></td>
    <td><?=$row["hoten"]?></td>
    <td><?=$row["dienthoai"]?></td>
    <td><?=$row["gioitinh"]==0?"Nam":"Nữ"?></td>
    <td align="center" valign="middle">
      <img src="Uploads/images/<?=$hinhanh?>" width="80">
    </td>
    <td><?=$row["tenphong"]?></td>
    <td>
    <a href="SuaNV.php?id=<?=$row["id"]?>">Sửa</a>
    -
  <a href="XoaNV.php?id=<?=$row["id"]?>" onclick="return confirm('Chắc chắn xóa?')">Xóa</a>
    </td>
  </tr>
 <?php
    }//đóng foreach
 ?> 
</table>
</body>
</html>