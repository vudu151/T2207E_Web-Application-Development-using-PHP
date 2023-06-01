<?php
if(isset($_REQUEST["b1"])==false)
	echo "<h3> chưa submit từ form</h3>";
else
{
	$hoten = $_REQUEST["hoten"];
	if(isset($_FILES["hinhanh"])&&$_FILES["hinhanh"]["error"]==0)
	{
		$tenanh = $_FILES["hinhanh"]["name"];//lấy tên của file ảnh gốc
		$temptFile = $_FILES["hinhanh"]["tmp_name"];//lấy đường dẫn file ảnh đã upload trên thư mục tạm
		echo "<p> Tên file: $tenanh </p>";
		echo "<p> Tên file NHÁP: $temptFile </p>";
		move_uploaded_file($temptFile,"hinhanh/$tenanh");
		echo "<br><img src='hinhanh/$tenanh' width='80'>";
	}
	else
		echo "<h3>Chưa có ảnh</h3>";
}
?>