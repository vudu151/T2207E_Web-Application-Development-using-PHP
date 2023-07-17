<?php
session_start();
require("CheckLoginAdmin.php");
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

    <link rel="stylesheet" type="text/css" href="CSS/header_admin.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/footer.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/category.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/product.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/order.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/home_admin.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <script language="javascript" src="library/ckeditor/ckeditor.js"></script>
    <script language="javascript" src="library/ckfinder/ckfinder.js"></script>
</head>
<body>

<div id="header">
    <?php include("Views/header_admin.php"); ?>
</div>

<div id="body">
    <?php
    $module = "";
    if(isset($_REQUEST["module"]))
        $module = $_REQUEST["module"];
    if($module=="category")
    {
        require("Controllers/ctlCategory.php");
    }
    else if($module=="product")
    {
        require("Controllers/ctlProduct.php");
    }
    else if($module=="event")
    {
        require("Controllers/ctlEvent.php");
    }
    else if($module=="order")
    {
        require("Controllers/ctlOrder.php");
    }
    else if($module=="author")
    {
        require("Controllers/ctlAuthor.php");
    }
    else if($module=="user")
    {
        require("Controllers/ctlUser.php");
    }
    else if($module=="banner")
    {
        require("Controllers/ctlBanner.php");
    }
    else
    {
        include("Views/home_admin.php");
    }
    ?>
</div>

<div id="footer">
    <?php include("Views/footer_admin.php"); ?>
</div>

    
    <script type="text/javascript" src="library/bootstrap5.2/js/bootstrap.js"></script>
    <script type="text/javascript" src="library/jquery/jquery.3.6.1.js"></script>
    <script type="text/javascript" src="library/owlcarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script type="text/javascript" src="JS/SlideProduct.js"></script>
    <script type="text/javascript" src="JS/Back-to-top.js"></script>
</body>
</html>