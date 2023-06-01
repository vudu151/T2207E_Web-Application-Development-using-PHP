<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>
<link rel="stylesheet" type="text/css" href="CSS/Style.css">
<link rel="stylesheet" type="text/css" href="CSS/Menu.css">
<link rel="stylesheet" type="text/css" href="CSS/Sanpham.css">
<link rel="stylesheet" type="text/css" href="CSS/Cart.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--nhúng file css và js của Slide show-->
<link rel="stylesheet" type="text/css" href="CSS/SlideShow.css">
<script src="JS/SlideShow.js"></script>
</head>

<body>
<div id="wrapper">
	<?php include("ViewsHome/inc_Header.php"); ?>
    <?php include("ViewsHome/inc_Menu.php"); ?>
	
    <div id="content" class="clear_fix">
    	<?php include("ViewsHome/inc_Left.php"); ?>
		<?php 
			//hiển thị phần nội dung giữa của trang web
            $module = "";
            if(isset($_REQUEST["module"]))
                $module = $_REQUEST["module"];
            if($module=="tintuc")
            {
                require("ControllersHome/ctlTintuc.php");
            }
            else if($module=="sanpham")
            {
                require("ControllersHome/ctlSanpham.php");
            }
            else if($module=="chitietsanpham")
            {
                require("ControllersHome/ctlChitietSanpham.php");
            }
            else if($module=="cart")
            {
                require("ControllersHome/ctlCart.php");
            }
			else if($module=="checkout")
            {
                require("ControllersHome/ctlCheckout.php");
            }
            else
            {
                require("ControllersHome/ctlHome.php");
            }
        ?>
        <?php 
			 if($module!="cart" && $module!="chitietsanpham")
			 {
				 include("ViewsHome/inc_Right.php");
			 }
		?>
    
    </div> <!--id="content" -->
    <div id="footer"> 
    	Thầy hướng dẫn. Ths. Trần Mạnh Trường
        <br>Di động: 0912 356 004<br>Email: truongtm@gmail.com    
     </div>
</div>
</body>
</html>
