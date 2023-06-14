<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng xuất</title>
    </head>
    <body>
        <?php
            session_start();
            unset($_SESSION["logined"]);   //Hủy biến $SESSION["logined"]
            session_destroy();             //Hoặc hủy toàn bộ biến SESSION 
        ?>
        <h3>Đã đăng xuất</h3>
        <a href="Admin.php">Trở về trang Admin</a>
    </body>
</html>