<h2> Xử lý form - REQUEST </h2>
<?php
//nếu không có biến bSubmit,username,pass... thì chưa submit form
if(isset($_REQUEST["bSubmit"])==false)
{
    echo "<p>Mời <a href='form3.php'> Đăng nhập từ form </a>";
    die();//dừng phần còn lại của trang php
}
//$_REQUEST["BIEN"]; dùng thay $_POST[] và $_GET[]
$user =$_REQUEST["username"];
$pass = $_REQUEST["pass"];
echo "<p>Username: $user, Password: $pass </p>";
?>