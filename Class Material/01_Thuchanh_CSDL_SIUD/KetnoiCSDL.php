<?php
	try
	{
	$conn = new PDO("mysql:host=localhost;dbname=d13cnpm","root","");
	//echo "<h3> KẾT NỐI CSDL thành công</h3>";
	$conn->query("SET NAMES UTF8");//thiết lập chế độ unicode
	}
	catch(PDOException $ex)
	{
		echo "<p>" . $ex->getMessage() . "</p>";//thông báo lỗi hệ thống
		die ("<h3> LỖI KẾT NỐI CSDL </h3>");
	}
?>