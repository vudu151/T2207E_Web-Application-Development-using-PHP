<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tìm kiếm chuỗi</title>
</head>

<body>
<?php
require("Dungchung.php");
$s1="";
$kq="";
if(isset($_REQUEST["b1"]))//nếu trang php được submit
{
  sleep(3);//tạm dừng 3 giây
	$s1 = $_REQUEST["t1"];
	$tong = Tongchuoi($s1);
	$kq = "Tổng là: $tong";
}
?>
<h3>Tổng các số phân biệt bởi dấu phẩy </h3>
<h3><?=$kq?></h3>
<form id="form1" name="form1" method="post" action="">
  <p>Nhập chuỗi phân biệt bởi dấu phẩy:
    <input name="t1" type="text" id="t1" size="30" value="<?=$s1?>" />
  </p>
  <p>
    <input type="submit" name="b1" id="b1" value="Tính tổng" />
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>