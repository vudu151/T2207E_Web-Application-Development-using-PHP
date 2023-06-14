<h2>Xử lý form - REQUEST</h2>
<?php
    //Nếu không có biến Submit, username, password thì chưa submit form
    if(isset($_REQUEST["Submit"])==false)
    {
        echo "<p>Mời <a href="/'Form-3_$_REQUEST.php'/"> Đăng nhập từ form </a>";
        die();   //Dừng phần còn lại của trang php
    }
    //$_REQUEST["BIEN"];    //Dùng thay $_POST và $_GET
    $user = $_REQUEST["username"];
    $pass = $_REQUEST["password"];
    echo "<p>Username: $user, Password: $pass</p>";
?>