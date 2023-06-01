<?php
require("Thuvien.php");
if(isset($_REQUEST["b1"])==false)
	echo "<h3> chưa submit từ form</h3>";
else
{
	$anh1 = UploadFile("hinhanh1","hinhanh/anh1");
	if($anh1=="")
		echo "<p>lỗi upload ảnh 1</p>";
	else
		echo "<br><img src='hinhanh/anh1/$anh1' width='80'><br>";
	$anh2 = UploadFile("hinhanh2","hinhanh/anh2");
	if($anh2=="")
		echo "<p>lỗi upload ảnh 2</p>";
	else
		echo "<br><img src='hinhanh/anh2/$anh2' width='80'>";	
}
?>