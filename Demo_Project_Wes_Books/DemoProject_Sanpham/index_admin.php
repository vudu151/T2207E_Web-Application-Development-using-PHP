<?php
session_start();
require("KiemtraDangNhap.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>
<link rel="stylesheet" type="text/css" href="css_Admin/Style.css">
<link rel="stylesheet" type="text/css" href="css_Admin/Menu.css">
<link rel="stylesheet" type="text/css" href="css_Admin/ContentRight.css">
<script language="javascript" src="JS/JQuery.js"></script>
<script language="javascript" src="JS/ckeditor/ckeditor.js"></script>
<script language="javascript" src="JS/ckfinder/ckfinder.js"></script>
</head>

<body>
<div id="wrapper">
	<div id="header"> 
    	
    </div>
    <div id="menu">  
    	<ul>
        	<li><a href="index_admin.php">Trang chủ</a></li>
            <li><a href="?module=tintuc">Quản lý Tin tức</a></li>
            <li><a href="?module=nhomsp">Quản lý Nhóm Sản phẩm</a></li>
            <li><a href="?module=sanpham">Quản lý Sản phẩm</a></li>
            <li><a href="?module=hoadon">Quán lý Hóa đơn</a></li>
        </ul>
        <span class="welcome">Xin chào: <b><?=isset($_SESSION["user"])?$_SESSION["user"]:""?></b></span>
        <span class="logout"><?=isset($_SESSION["user"])?"<a href='logout.php'>Đăng xuất</a>":"<a href='login.php'>Đăng nhập</a>"?></span> 
    </div>
	<div id="content" class="clear_fix">
    	<?php
		$module = "";
		if(isset($_REQUEST["module"]))
			$module = $_REQUEST["module"];
		if($module=="tintuc")
		{
			require("Controllers/ctlTintuc.php");
		}
		else if($module=="nhomsp")
		{
			require("Controllers/ctlCategory.php");
		}
		else if($module=="sanpham")
		{
			require("Controllers/ctlSanpham.php");
		}
		else if($module=="hoadon")
		{
			require("Controllers/ctlHoadon.php");
		}
		else
		{
			require("Views/vHome.php");
		}
		?>
     </div>
    <div id="footer"> 
    	Thầy hướng dẫn. Ths. Trần Mạnh Trường
        <br>Di động: 0912 356 004<br>Email: truongtm@gmail.com    
     </div>
</div>
</body>
</html>
