<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tính chu vi diện tích</title>
</head>

<body>
<?php
//khai báo trước các biến để tránh  lỗi khi truy cập lần đầu
$dai=0;
$rong=0;
$chuvi =0;
$dientich =0;
$loi = "";
//nếu submit form thì mới lấy dài, rộng và tính
if(isset($_REQUEST["dai"])==true 
	&&isset($_REQUEST["rong"])==true)
{
	$dai  = $_REQUEST["dai"];
	$rong = $_REQUEST["rong"];
	//kiểm tra dài, rộng không trống và phải là số
	if($dai=="" || $rong=="")
		$loi ="Chưa nhập dài hoặc rộng";
	else if(is_numeric($dai)==false ||is_numeric($rong)==false)
	{
		$loi ="dài hoặc rộng phải nhập số";
	}	
	if($loi=="")//nếu không có lỗi
	{	
	$chuvi = ($dai+$rong)*2;
	$dientich = $dai*$rong;
	}
}
?>
<div style="color:red"><?=$loi?></div>
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