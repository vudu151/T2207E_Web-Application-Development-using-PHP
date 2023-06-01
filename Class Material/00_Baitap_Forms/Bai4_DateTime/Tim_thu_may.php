<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tìm thứ</title>
<style type="text/css">
input { border-radius: 10px; }
input[type=text] { width:50px;background:#FF9}
input[name=b1] { background:#093}
#divKetqua {border:red 1px dashed; margin-top:10px}
</style>

</head>

<body>
<?php
//kiểm tra và trả lại thông báo lỗi dạng chuỗi
function KiemtraSo($n)
{
	if($n=="")
		return "Chưa nhập";
	if(!is_numeric($n))
		return "Không phải là số";
	return "";//không có lỗi
}
//hàm tìm và trả về thứ trong tuần tiếng việt
function TimThu($ngay,$thang,$nam)
{
	$arr = array("Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm"
	, "Thứ sáu", "Thứ bảy");
	//tạo thời gian gian bằng hàm mktime
	$tg = mktime(0,0,0,$thang,$ngay,$nam);
	//lấy về thứ mấy tính tính theo 0 (chủ nhật), 1 (thứ hai)...
	$thu = date("w",$tg);
	//trả về phần tử tương tứng trong mảng arr
	return $arr[$thu];
}
?>
<?php
$ngay = "";
$thang = "";
$nam = "";
$ketqua = "";
$loi = "";
if(isset($_REQUEST["b1"]))//nếu nhấn nút Tìm thứ mấy
{
	$ngay = $_REQUEST["tNgay"];
	$thang = $_REQUEST["tThang"];
	$nam = $_REQUEST["tNam"];
	//kiểm tra số 
	if(($loi = KiemtraSo($ngay))!="")
		$loi = " Ngày " . $loi;
	else if(($loi = KiemtraSo($thang))!="")
		$loi = " Tháng " . $loi;
	else if(($loi = KiemtraSo($nam))!="")
		$loi = " Năm " . $loi;	
	else if(!checkdate($thang,$ngay,$nam))//kiểm tra thời gian hợp lệ không?
		$loi = "Thời gian nhập không đúng";
	//thực hiện tìm thứ trong tuần
	if($loi =="")//nếu không có lỗi
	{
		$ketqua = TimThu($ngay,$thang,$nam);
	}	
}
?>
<h3 style="color:red; font-size:24px"><?=$loi?></h3>
<h2>Nhập ngày/tháng/năm để tìm xem là thứ mấy</h2>
<form name="form1" method="post" action="">
  <input type="text" name="tNgay" id="tNgay" value="<?=$ngay?>" placeholder="Ngày"> /
  <input type="text" name="tThang" id="tThang" value="<?=$thang?>" placeholder="Tháng"> /
  <input type="text" name="tNam" id="tNam" value="<?=$nam?>" placeholder="Năm">
  <input type="submit" name="b1" id="b1" value="Tìm thứ mấy?">
</form>
<div id="divKetqua">Kết quả:<?=$ketqua?></div>

</body>
</html>