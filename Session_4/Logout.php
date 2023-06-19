<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Đăng xuất</title>
    </head>
    <body>
        <?php
        session_start();
        session_destroy(); //Hủy toàn bộ Session
        ?>
        <h3 style="color: blue;">Đã đăng xuất</h3>
        <a href="admin.php">Về trang Admin</a>
    </body>
</html>