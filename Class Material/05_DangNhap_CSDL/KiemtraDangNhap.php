<?php
//Kiểm tra nếu chưa tồn tại biến $_SESSION["logined"] => chưa đăng nhập
//Biến này được tạo ra và gán giá trị ở trang XulyLogin.php 
//nếu đăng nhập thành công
if(isset($_SESSION["logined"])==false ||$_SESSION["logined"]=="")
{
?>
	<h3 style="color:red;">Bạn chưa đăng nhập</h3> 
	<a href='Login.php'> Mời Đăng nhập</a>
<?php
	die();
}
?>