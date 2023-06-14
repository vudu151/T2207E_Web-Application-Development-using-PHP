<?php   
    //Nếu chưa có biến $_SESSION["logined] thì chưa cho đăng nhập
    if(isset($_SESSION["logined"]) == false && $_SESSION["logined"] == "")
    {
        ?>
        <h3 style="color: red;">Bạn chưa đăng nhập</h3>
        <a href="Login.php">Mời đăng nhập</a>
        <?php
        die("<h2>Kết thúc</h2>");
    }
?>