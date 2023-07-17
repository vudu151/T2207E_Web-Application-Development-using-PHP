<?php
require_once("Models/clsEmailsub.php");

$emailcheck = new clsEmailsub();

$link_tieptuc ="index.php";
$thongbao ="";

$number_check = $_REQUEST["number_check"];

$random_number = $_SESSION["random_number"];
$email = $_SESSION["email"];

if (time() - $_SESSION['last_activity'] > 120)
{
    $thongbao="Mã xác minh hết hạn";
    require("ViewsHome/vKetqua.php");
}
else if($random_number == $number_check)
{
    $ketqua = $emailcheck->AddEmailsub($email);
    unset($_SESSION["random_number"]);
    unset($_SESSION['last_activity']);
    unset($_SESSION["email"]);
    if($ketqua==FALSE)
        $thongbao="Lỗi thêm dữ liệu";
    else
        $thongbao ="Thêm dữ liệu thành công";
    require("ViewsHome/vKetqua.php");
}
else
{
    $thongbao="Sai mã xác minh, vui lòng điền lại";
    $link_tieptuc ="index.php?module=sendemail&act=re_fill";
    require("ViewsHome/vKetqua.php");
}
?>