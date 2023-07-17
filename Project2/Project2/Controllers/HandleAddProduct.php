<?php
require_once("Function/Function.php");
$name = $_REQUEST["t1"];
$quantity =$_REQUEST["t2"];
$price = $_REQUEST["t3"];
$mass = $_REQUEST["t4"];
$numberpage = $_REQUEST["t5"];
$image = UploadFile("f1", "images");
$description = $_REQUEST["t6"];
$categoryid = $_REQUEST["selectCategory"];
$authorid = $_REQUEST["selectAuthor"];

$ketqua = $sanpham->AddProduct($name,$quantity,$price,$mass,$numberpage,$image,$description,$categoryid,$authorid);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>