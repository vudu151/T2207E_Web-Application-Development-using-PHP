<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng kí</title>
        <script>
        function check() 
        {
            hoten =document.getElementById("hoten");
            email =document.getElementById("email");
            if(hoten.value==""||hoten.value=="")
            {
                alert("Bạn chưa nhập họ tên or email");
                return false;
            }
            alert("Gửi đi");
            return true;
        }
    </script>
    </head>
    <body>
        <?php
            //Khởi tạo họ tên và email để tránh lỗi hiển thị lần đầu tiên
            $hoten = "";
            $email = "";
            $thongbao = "";
            //Lấy họ tên và email từ form submit nếu đã submit
            if(isset($_REQUEST["b1"]))
            {
                $hoten = $_REQUEST["hoten"];
                $email = $_REQUEST["email"];
                if(strrpos($email,"admin")===false)   //Nếu email không chưa từ admin
                {
                    $thongbao="Thành công!";
                }
                else
                {
                    $thongbao = "Lỗi: Email không được chứa từ admin";
                }
            }
        ?>
        <form name="form_1" id="form_1" action = "" onsubmit="return check()">
            <p>Họ tên: <input type="text" name="hoten" id="hoten" value="<?=$hoten?>"></p>
            <p>Email: <input type="text" name="email" id="email" value="<?=$email?>"></p>
            <div style="color:red"><?=$thongbao?></div>
            <p><input type="submit" name="b1" id="b1" value="Gửi đi"></p>
        </form>
    </body>
</html>