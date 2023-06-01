<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách nhân viên</title>
</head>
<body>
<h1 style="text-align: center; color: #090;">DANH SÁCH NHÂN VIÊN</h1>
<p><a href="ThemNV.php">Thêm nhân viên</a></p>
<div style="width:1000px; margin:10px auto">
  <?php
  $maphong  = isset($_REQUEST["maphong"])?$_REQUEST["maphong"]:0;
  ?>
    <form name="fTimkiem" id="fTimkiem" action="">
      Phòng ban:
      <select name="maphong" id="maphong" onchange="document.fTimkiem.submit();">
            <option value="0">Tất cả phòng ban</option>
            <?php
            require_once("Thuvien.php");
            TaoSelect("tbPhongban","maphong","tenphong",$maphong);
            ?>
          </select>
    </form>
</div>
<?php
require("tblNhanvien.php");
$rows = getListNhanvien($maphong);
if($rows===NULL)
	die("<h3>LỖI KẾT NỐI CSDL</H3>");
if($rows===FALSE)
	die("<h3>LỖI CÂU LỆNH SQL</H3>");
if(count($rows)==0)
	die("<h3>CHƯA CÓ DỮ LIỆU</h3>");
//print_r($rows);
?>
<table width="1074" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr bgcolor="#FFCC33">
    <td width="80">ID</td>
    <td width="210">Họ tên</td>
    <td width="166">Điện thoại</td>
    <td width="139">Giới tính</td>
    <td width="132">Hình ảnh</td>
    <td width="100">Tên phòng</td>
    <td width="173">Xử lý</td>
  </tr>
  <?PHP
  foreach($rows as $row)
  {
    $hinhanh = $row["hinhanh"]!=""?$row["hinhanh"]:"no-image.png";  
  ?>
  <tr>
    <td><?=$row["id"]?></td>
    <td><?=$row["hoten"]?></td>
    <td><?=$row["dienthoai"]?></td>
    <td><?=($row["gioitinh"]==0)?"Nam":"Nữ"?></td>
    <td><img src="Hinhanh/Nhanvien/<?=$hinhanh?>" width="100"></td>
    <td><?=$row["tenphong"]?></td>
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