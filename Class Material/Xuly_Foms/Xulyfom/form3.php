<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý form</title>
    <script>
        function kiemtra()
        {
            user = document.getElementById("username");
            pass = document.getElementById("pass");
            if(user.value=="" || pass.value=="")
            {
                alert("chưa nhập user hoặc pass")
                return false;
            }
            alert("OK");
            return true;
        }
    </script>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form name="form1" id="form1" action="xuly3.php" 
        method="get" onsubmit="return kiemtra()">
        <p>Username: <input type="text" name="username" id="username"></p>
        <p>Password: <input type="password" name="pass" id="pass"></p>
        <p><input type="submit" name="bSubmit" value="Đồng ý"></p>
    </form>
    <a href="xuly3.php?username=abc&pass=123&bSubmit=1" onclick="return confirm('chắc chắn tiếp tục?');">Xóa tài khoản</a>
</body>
</html>