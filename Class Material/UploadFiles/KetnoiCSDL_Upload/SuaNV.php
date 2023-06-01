<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa nhân viên</title>
</head>
<body>
<h2 style="text-align: center; color: #090;">Sửa nhân viên</h2>
<?php
if(isset($_REQUEST["id"])==false)
	die("<p>chưa có id nhân viên</p>");
$id = $_REQUEST["id"];//lấy id nhân viên
if($id=="" || is_numeric($id)==false)
	die("<p>id không được rỗng và phải là số</p>");
require_once("tblNhanvien.php");
$row = getNhanvien($id);//lấy thông tin nhân viên theo id   
?>    
<form name="form1" method="post" action="XulySuaNV.php" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?=$row["id"]?>">
  <table width="446" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="155">Họ tên</td>
      <td width="271"><input type="text" name="tHoten" id="tHoten" value="<?=$row["hoten"]?>"></td>
    </tr>
    <tr>
      <td>Điện thoại</td>
      <td><input type="text" name="tDienthoai" id="tDienthoai" value="<?=$row["dienthoai"]?>"></td>
    </tr>
    <tr>
      <td>Giới tính</td>
      <td>
      <label for="r1">Nam</label>
<input type="radio" name="rGioitinh" id="r1" value="0" <?=$row["gioitinh"]==0?"checked":""?>>
      <label for="r2">Nữ</label>
<input type="radio" name="rGioitinh" id="r2" value="1" <?=$row["gioitinh"]==1?"checked":""?>>
      </td>
    </tr>
    <tr>
      <td>Hình ảnh hiện tại</td>
    <td>
      <?php $hinhanh = $row["hinhanh"]==""?"no-image.png":$row["hinhanh"]; ?>
    <img src="Uploads/images/<?=$hinhanh?>" width="80"><br>
    <input type="text" name="tAnhhienthai" id="tAnhhienthai" value="<?=$row["hinhanh"]?>" readonly>
    </td>
    </tr>
    <tr>
      <td>Hình ảnh mới</td>
    <td><input type="file" name="fHinhanh" id="fHinhanh"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="b1" id="b1" value="Đồng ý">
      &nbsp;&nbsp;
      <input type="reset" name="b2" id="b2" value="Nhập lại">
      </td>
    </tr>
  </table>
</form>
</body>
</html>