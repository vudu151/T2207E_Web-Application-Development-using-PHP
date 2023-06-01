<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tìm thứ</title>
<script language="javascript" src="datepicker_jquery/jquery.js"></script>
<script language="javascript" src="datepicker_jquery/jquery.datetimepicker.full.min.js"></script>
<link rel="stylesheet" type="text/css" href="datepicker_jquery/jquery.datetimepicker.css">
<script language="javascript">
$(document).ready(function(e) {
    $("#tNgaysinh").datetimepicker();
});
</script>
<style type="text/css">
input { border-radius: 10px; }
input[type=text] { width:100px;background:#FF9}
input[name=b1] { background:#093}
#divKetqua {border:red 1px dashed; margin-top:10px}
</style>

</head>
<body>
<?php
require("Dungchung.php");
$ngaysinh = "";
$ketqua = "";
$loi = "";
if(isset($_REQUEST["b1"]))//nếu nhấn nút Tìm thứ mấy
{
	$ngaysinh = $_REQUEST["tNgaysinh"];
	if($ngaysinh=="")
		$loi = "chưa nhập ngày sinh"; 
	//thực hiện tìm thứ trong tuần
	if($loi =="")//nếu không có lỗi
	{
		$ketqua = XemTuoi2($ngaysinh);
	}	
}
?>
<h3 style="color:red; font-size:24px"><?=$loi?></h3>
<h2>Nhập ngày sinh để xem tuổi</h2>
<form name="form1" method="post" action="">
Ngày sinh (năm/tháng/ngày):
  <input type="text" name="tNgaysinh" id="tNgaysinh" value="<?=$ngaysinh?>"
  readonly> 
  <input type="submit" name="b1" id="b1" value="Xem tuổi?">
</form>

<div id="divKetqua">Kết quả:<?=$ketqua?></div>

</body>
</html>