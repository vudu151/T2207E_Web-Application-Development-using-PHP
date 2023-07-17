<?php

    session_start();

    require_once("Function/Function.php");
    require_once("Models/clsUser.php");

    $user_check = new clsUser();

    $link_tieptuc = "ForgotPassword.php";

    $act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";

    if($act == "")
    {
        $_SESSION["random_number"] = rand(100000, 999999);
        $_SESSION['last_activity'] = time();
        $_SESSION["user_fg"] = isset($_REQUEST["user"])?$_REQUEST["user"]:"";
        $_SESSION["email"] = isset($_REQUEST["email"])?$_REQUEST["email"]:"";
        SendMail($_SESSION["email"],$_SESSION["random_number"]);

        $ketqua = $user_check->GetUserByUsername($_SESSION["user_fg"]);
        $us = $user_check->data;
        if($us["Email"]!=$_SESSION["email"])
        {
            $thongbao = "Email không khớp với tài khoản";
            require("ViewsHome/vKetqua.php");
        }
    }

    if($act == "check")
    {
        require("HandleForgotPassword.php");
    }
    else
    {
        require("CheckForgotPassword.php");
    }
?>