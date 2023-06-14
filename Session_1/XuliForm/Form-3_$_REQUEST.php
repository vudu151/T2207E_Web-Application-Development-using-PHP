<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Xử lý form</title>
        <script>
            function Kiemtra()
            {
                user =document.getElementById("username");
                pass =document.getElementById("password");
                if(user.value==""||pass.value=="")
                {
                    alert("Chưa nhập username hoặc password");
                    return false;
                }
                alert("Thành công!");
                return true;
            }
        </script>
    </head>
    <body>
        <h2>Đăng nhập</h2>
        <form name="form" id="form" method="get" action="XuliForm_3.php" onsubmit="return Kiemtra()">
            <p>Username: <input type="text" name="username" id="username"></p>
            <p>Password: <input type="password" name="password" id="password"></p>
            <p><input type="submit" name="Submit" value="Đồng ý"></p>
        </form>
        <a href="XuliForm_3.php?username=Vũ+Dự&password=123&Submit=Đồng+ý" onclick="return confirm('Chắc chắn tiếp tục ?');">Xóa tài khoản</a>
    </body>
</html>