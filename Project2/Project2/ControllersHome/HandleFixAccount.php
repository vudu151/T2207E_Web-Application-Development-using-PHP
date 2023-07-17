<?php

$ketqua = $account->GetUserByUsername($_SESSION["user"]);
$ss = $account->data;

$email_fix = $_REQUEST["email_fix"];
if($email_fix == "")
    $email_fix = $ss["Email"];

$pass_fix_rq = $_REQUEST["pass_fix"];
if($pass_fix_rq == "")
    $pass_fix = $ss["Password"];
else
    $pass_fix = md5($pass_fix_rq);

$password = isset($_REQUEST["password"])?$_REQUEST["password"]:"";

if($ss["Password"]==md5($password))
{
    $ketqua = $account->FixEmailAndPasswordByUsername($_SESSION["user"],$email_fix,$pass_fix);
    if($ketqua==FALSE)
        $thongbao="Lỗi sửa dữ liệu";
    else
        $thongbao ="Sửa dữ liệu thành công";

    require("ViewsHome/vKetqua.php");
}

else
{
    $thongbao ="Sai mật khẩu";
    require("ViewsHome/vKetqua.php");
}


?>