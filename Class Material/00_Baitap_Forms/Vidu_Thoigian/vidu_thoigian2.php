<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thời gian</title>
</head>

<body>
<?php
$date=date_create("2015-02-20");
echo date_format($date,"d/m/Y H:i:s");
echo "<br>";
//echo date("d/m/Y",$date) ;

echo "<br>1. hiển thị ngày tháng năm hiện tại:<br>";
echo date("d/m/Y") ;//trả về chuỗi chứa thời gian hiện tại theo định dạng ngày/tháng/năm

echo "<br>2. hiển thị thời gian hiện tại:<br>";
echo date("l jS \of F Y h:i:s A");

echo "<br>3. tạo thời gian cụ thể (20 tháng 2 năm 2015) :<br>";
//mktime(giờ,phút,giây,tháng,ngày,năm);
$n = mktime(0,0,0,2,20,2015);//trả về thời gian tính theo số giây kể từ 01/01/1970 ($n sẽ là số nguyên)
//hiển thị
echo date("d/m/Y", $n);

//kiểm tra dữ liệu ngày tháng năm có hợp lệ không
//checkdate(tháng,ngày,năm) trả lại giá trị true/false
echo "<br> kiểm tra ngày tháng:</br>";
$b1 = checkdate(10,31,2015);
if($b1)
	 echo "ngày 31/10/2015 là hợp lệ";
else
	 echo "ngày 31/10/2015 KHÔNG hợp lệ";	 
	 
echo "<br> kiểm tra ngày tháng:</br>";
$b2 = checkdate(11,31,2015);
if($b2)
	 echo "ngày 31/11/2015 là hợp lệ";
else
	 echo "ngày 31/11/2015 KHÔNG hợp lệ";	 


/*
echo "<br>";
echo date("l");

//echo "<br>";
//print_r(getdate());


var_dump(checkdate(12,31,-400));
echo "<br>";
var_dump(checkdate(2,29,2003));
echo "<br>";
var_dump(checkdate(2,29,2004));
*/
?>
</body>
</html>