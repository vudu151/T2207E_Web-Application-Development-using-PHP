<?php

$firstname = isset($_REQUEST["firstname"])?$_REQUEST["firstname"]:"";
$lastname = isset($_REQUEST["lastname"])?$_REQUEST["lastname"]:"";
$address = isset($_REQUEST["address"])?$_REQUEST["address"]:"";
$phone = isset($_REQUEST["phone"])?$_REQUEST["phone"]:"";

$ketqua = $account->FixUserByUsername($_SESSION["user"],$firstname,$lastname,$address,$phone);
if($ketqua==FALSE)
    $thongbao="Lỗi sửa dữ liệu";
else
    $thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");

?>