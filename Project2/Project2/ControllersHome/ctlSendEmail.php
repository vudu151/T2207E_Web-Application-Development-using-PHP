<?php
    require_once("Function/Function.php");

    $act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";

    if($act == "")
    {
        $_SESSION["random_number"] = rand(100000, 999999);
        $_SESSION['last_activity'] = time();
        $_SESSION["email"] = isset($_REQUEST["contact-email"])?$_REQUEST["contact-email"]:"";
        SendMail($_SESSION["email"],$_SESSION["random_number"]);
    }

    if($act == "check")
    {
        require("HandleSendEmail.php");
    }
    else
    {
        require("ViewsHome/SendEmail.php");
    }
?>