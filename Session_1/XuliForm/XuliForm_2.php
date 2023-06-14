<h2>Xử lý Form - POST</h2>
<?php
    $user = $_POST["username"];   //$_GET: Dữ liệu lấy được không hiện trên URL
    $pass = $_POST["pass"];
    echo"<p>Username: $user, Password: $pass</p>";
?>