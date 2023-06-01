<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tính chu vi diện tích</title>
</head>

<body>
<?php
//khai báo trước các biến để tránh  lỗi khi truy cập lần đầu
$dai="";
$rong="";
$chuvi =0;
$dientich =0;
$loi = "";
$pheptinh="";
//nếu submit form thì mới lấy dài, rộng và tính
if(isset($_REQUEST["dai"])==true 
	&&isset($_REQUEST["rong"])==true)
{
	$dai  = $_REQUEST["dai"];
	$rong = $_REQUEST["rong"];
	//kiểm tra radio
	if(isset($_REQUEST["pheptinh"])==false)//chưa chọn radio
		$loi = "chưa chọn Phép tính";
	else
		$pheptinh = $_REQUEST["pheptinh"];
	//kiểm tra dài, rộng không trống và phải là số
	if($dai=="" || $rong=="")
		$loi ="Chưa nhập dài hoặc rộng";
	else if(is_numeric($dai)==false ||is_numeric($rong)==false)
	{
		$loi ="dài hoặc rộng phải nhập số";
	}	
	if($loi=="")//nếu không có lỗi
	{	
		if($pheptinh=="cv")
			$chuvi = ($dai+$rong)*2;
		else if($pheptinh=="dt")
			$dientich = $dai*$rong;
	}
}
?>
<div style="color:red"><?=$loi?></div>
<!-- để trống action thì 
khi submit form sẽ gửi về chính trang hiện tại-->
<form name="f1" id="f1" method="get" action="">
<p>
Chiều Dài:<input type="text" name="dai" id="dai" value="<?=$dai?>">
</p>
<p>
Chiều Rộng:<input type="text" name="rong" id="rong" value="<?=$rong?>">
</p>
<p>
Lựa chọn phép tính:
	Chu vi:<input type="radio" name="pheptinh" value="cv"
    	<?=($pheptinh=="cv")?"checked":""?>>
    Dien tích:<input type="radio" name="pheptinh" value="dt"
    	<?=($pheptinh=="dt")?"checked":""?>>
</p>
<p>
<input type="submit" name="b1" id="b1" value="Tính CV & DT">
</p>
</form>
<p> Chu vi = <?=$chuvi?></p>
<p> Diện tích = <?=$dientich?></p>
</body>
</html>