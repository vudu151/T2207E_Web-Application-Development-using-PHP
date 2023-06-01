<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ví dụ thời gian</title>
</head>

<body>
<?php
$n = mktime();//trả về tg hiện tại dạng số nguyên là số giây tình từ 0:0:0 01/01/1970
echo "Thời gian theo giây:" . number_format($n);
echo "<br>múi giờ hiện tại mặc định:" . date_default_timezone_get();
$str_thoigian =  date("l, d / m / Y H:i:s", $n);
echo "<br> thời gian:" . $str_thoigian;

//đổi thời gian theo múi giờ Asia/Bangkok
date_default_timezone_set("Asia/Bangkok");
echo "<br>múi giờ thay đổi:" . date_default_timezone_get();
$str_thoigian =  date("l, d / m / Y H:i:s", $n);
echo "<br> thời gian:" . $str_thoigian;

$thu_tienganh = date("l",$n);
echo "<br>thứ:" . $thu_tienganh;
$vt_thu = date("w",$n);//lấy thứ của thời gian 0: chủ nhật, 1: thứ hai..
echo "<br> vị trí của thứ trong tuần:" . $vt_thu;
?>
</body>
</html>