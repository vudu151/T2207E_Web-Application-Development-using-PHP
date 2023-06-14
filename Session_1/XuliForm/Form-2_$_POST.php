<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Xử lí form</title>
    </head>
    <body>
        <h2>Đăng nhập</h2>
        <form name="form_2" action="XuliForm_2.php" method="post"><!--method="post" thì username và pass hiện trên URL-->
            <p>Username: <input type="text" name="username"></p>
            <p>Password: <input type="password" name="pass"></p>
            <p><input type="submit" name="Submit" value="Đồng ý"></p>
        </form>
    </body>
</html>