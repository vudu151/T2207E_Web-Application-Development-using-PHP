<?php
function ConnectDB()
{
	try
	{
	$conn = new PDO("mysql:host=localhost;dbname=d13cnpm","root","");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "<h3> KẾT NỐI CSDL thành công</h3>";
	$conn->query("SET NAMES UTF8");//thiết lập chế độ unicode
	}
	catch(PDOException $ex)
	{
		echo "<p>" . $ex->getMessage() . "</p>";//thông báo lỗi hệ thống
		die ("<h3> LỖI KẾT NỐI CSDL </h3>");
	}
	return $conn;
}
	
?>