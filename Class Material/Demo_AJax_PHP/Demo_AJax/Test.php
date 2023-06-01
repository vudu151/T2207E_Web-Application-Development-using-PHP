<?php
//Nếu chứa có hoten và solan trong REQUEST thì báo lỗi
if(!isset($_REQUEST["hoten"])|| !isset($_REQUEST["solan"]) )
	echo "LỖI";
else
{
	$hoten = $_REQUEST["hoten"];
	$n = $_REQUEST["solan"];
	if($n== "" || is_numeric($n)==FALSE)
		$n=1;
	for($i=1; $i<=$n; $i++)
		echo "<h3> Hello: $hoten </h3>";
}
?>