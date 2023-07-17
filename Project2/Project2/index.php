<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/LogoPJ2.png" type="image/png">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="library/bootstrap5.2/css/bootstrap.css">
    <link rel="stylesheet" href="library/fontawesome/css/all.css"/>
    <link rel="stylesheet" href="library/owlcarousel2-2.3.4/dist/assets/owl.carousel.css">

    <link rel="stylesheet" type="text/css" href="CSSHome/base.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/header.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/home.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/footer.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/product_list.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/product_details.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/login.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/register.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/cart.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/send_email.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/user.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/paging.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/aboutus.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/contactus.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/faqs.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/author.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/event.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/event_detail.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <script language="javascript" src="library/ckeditor/ckeditor.js"></script>
    <script language="javascript" src="library/ckfinder/ckfinder.js"></script>
</head>
<body>

<div id="header">
    <?php require("ControllersHome/ctlHeader.php"); ?>
</div>

<div id="body" class="clear-fix">
    <?php
    $module = "";
    if(isset($_REQUEST["module"]))
        $module = $_REQUEST["module"];
    if($module=="productdetail")
    {
        require("ControllersHome/ctlProductDetail.php");
    }
    else if($module=="product")
    {
        include("ControllersHome/ctlProduct.php");
    }
    else if($module=="sendemail")
    {
        require("ControllersHome/ctlSendEmail.php");
    }
    else if($module=="user")
    {
        require("ControllersHome/ctlUser.php");
    }
    else if($module=="cart")
    {
        require("ControllersHome/ctlCart.php");
    }
    else if($module=="checkout")
    {
        require("ControllersHome/ctlCheckout.php");
    }
    else if($module=="event")
    {
        require("ControllersHome/ctlEvent.php");
    }
    else if($module=="eventdetail")
    {
        require("ControllersHome/ctlEventDetail.php");
    }
    else if($module=="author")
    {
        require("ControllersHome/ctlAuthor.php");
    }
    else if($module=="authordetail")
    {
        require("ControllersHome/ctlAuthorDetail.php");
    }
    else if($module=="aboutus")
    {
        include("ViewsHome/aboutus.php");
    }
    else if($module=="contactus")
    {
        include("ViewsHome/contactus.php");
    }
    else if($module=="faqs")
    {
        include("ViewsHome/faqs.php");
    }
    else
    {
        require("ControllersHome/ctlHome.php");
    }
    ?>
</div>

<div id="footer">
    <?php include("ViewsHome/footer.php"); ?>
</div>

    
    <script type="text/javascript" src="library/bootstrap5.2/js/bootstrap.js"></script>
    <script type="text/javascript" src="library/jquery/jquery.3.6.1.js"></script>
    <script type="text/javascript" src="library/owlcarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script type="text/javascript" src="JS/SlideProduct.js"></script>
    <script type="text/javascript" src="JS/Back-to-top.js"></script>
    <script type="text/javascript" src="JS/Onkeyup.js"></script>
    <script type="text/javascript" src="JS/Comment.js"></script>

</body>
</html>