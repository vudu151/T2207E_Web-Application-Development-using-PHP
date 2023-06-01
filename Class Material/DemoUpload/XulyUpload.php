<?php
if(isset($_REQUEST["b1"])==false)
    die("Chưa submit form");
$hoten = $_REQUEST["tHoten"];
//nếu tiên input đúng và upload không lỗi
if(isset($_FILES["fAnh"]) && $_FILES["fAnh"]["error"]==0)
{
    $tenanh = $_FILES["fAnh"]["name"];
    $temp_file = $_FILES["fAnh"]["tmp_name"];
    move_uploaded_file($temp_file,"Hinhanh/$tenanh");
    echo "<h3>$hoten</h3>";
    echo "<img src='Hinhanh/$tenanh' width=100>";
    echo "<p>Tên file upload thư mục tạm: $temp_file</p>";
}
?>