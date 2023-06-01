<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ví dụ cộng ngày</title>
</head>

<body>
<?php
//tạo đối tượng DateTime, với giá trị là 28/2/2016
$date=date_create("2016-02-28");

//tạo đối tượng DateTime, và lưu thời gian hiện tại
$d=date_create();
//hiển thị ngày hiện tại
$str_ngay_hientai = date_format($d,"d/m/Y");//chuyển thành chuỗi ngày/tháng/năm
echo "<p>Hiện tại: $str_ngay_hientai</p>";

//cộng 31 ngày vào ngày hiện tại
date_modify($d,"+31 days");
$str_ngay_moi = date_format($d,"d/m/Y");
echo "<p>ngày mới:$str_ngay_moi</p>";
?>
</body>
</html>


