<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tính chu vi diện tích</title>
</head>

<body>
<?php
//khai báo trước các biến để tránh  lỗi khi truy cập lần đầu

//nếu submit form thì mới lấy dài, rộng và tính
if(isset($_REQUEST["dai"])==true 
	&&isset($_REQUEST["rong"])==true)
{
	$dai  = $_REQUEST["dai"];
	$rong = $_REQUEST["rong"];
	$chuvi = ($dai+$rong)*2;
	$dientich = $dai*$rong;
}
?>
<!-- để trống action thì 
khi submit form sẽ gửi về chính trang hiện tại-->
<form name="f1" id="f1" method="get" action="">
<p>
Chiều Dài:<input type="text" name="dai" id="dai" 
				value="<?=$dai?>">
</p>
<p>
Chiều Rộng:<input type="text" name="rong" id="rong"
				value="<?=$rong?>"></p>
<p>
<input type="submit" name="b1" id="b1" value="Tính CV & DT">
</p>
</form>
<p> Chu vi = <?=$chuvi?></p>
<p> Diện tích = <?=$dientich?></p>
</body>
</html>