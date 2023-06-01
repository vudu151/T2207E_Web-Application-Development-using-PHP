<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đếm số ngày</title>
</head>

<body>
<?php

$date1=date_create("2019-05-08");
$date2=date_create();
//hàm date_diff: đầu vào 2 đối tượng dạng DateTime 
//trả về đối tượng DateInterval: lưu khoảng thời gian chênh lệch giữa date1 và date2
$diff=date_diff($date1,$date2);
echo $diff->format("%a ngày");//chuyển khoảng thời gian về dạng số ngày chênh lệch
?>
</body>
</html>
