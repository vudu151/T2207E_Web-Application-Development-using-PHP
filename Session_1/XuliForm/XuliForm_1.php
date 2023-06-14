<h2>Xử lý Form - GET</h2>
<?php
    $user = $_GET["username"];   //$_GET: Dữ liệu lấy được hiện trên URL 
    $pass = $_GET["pass"];
    echo"<p>Username: $user, Password: $pass</p>";
?>