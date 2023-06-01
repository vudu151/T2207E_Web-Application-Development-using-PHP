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
$s2="";
$kq="";
if(isset($_REQUEST["b1"]))//nếu trang php được submit
{
	sleep(1);
	$s1 = $_REQUEST["t1"];
	$s2 = $_REQUEST["t2"];
	$kq = Timchuoi($s1,$s2);
}
?>
<h3>Tìm kiếm chuỗi </h3>
<h3><?=$kq?></h3>
<form id="form1" name="form1" method="post" action="">
  <p>Chuỗi 1:
    <input name="t1" type="text" id="t1" size="30" value="<?=$s1?>" />
  </p>
  <p>Chuỗi 2:
    <input name="t2" type="text" id="t2" size="30" value="<?=$s2?>" />
  </p>
  <p>
    <input type="submit" name="b1" id="b1" value="Tìm chuỗi 2 trong chuỗi1" />
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>