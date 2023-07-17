<?php
require_once("Function/Function.php");
$id = $_REQUEST["id"];
$name = $_REQUEST["t1"];
$quantity =$_REQUEST["t2"];
$price = $_REQUEST["t3"];
$mass = $_REQUEST["t4"];
$numberpage = $_REQUEST["t5"];
$image = UploadFile("f1", "images");
if($image=="")//nếu không chọn ảnh mới thì lấy ảnh hiện taij
	$image = $_REQUEST["anhHientai"];
$description = $_REQUEST["t6"];
$categoryid = $_REQUEST["selectCategory"];
$authorid = $_REQUEST["selectAuthor"];

$ketqua = $sanpham->FixProduct($id,$name,$quantity,$price,$mass,$numberpage,$image,$description,$categoryid,$authorid);
if($ketqua==FALSE)
	$thongbao="Lỗi sửa dữ liệu";
else
	$thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>