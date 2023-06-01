<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script>
        function check()
        {
            hoten = document.getElementById("hoten");
            email = document.getElementById("email"); 
            if(hoten.value=="" || email.value=="")
            {
                alert("Bạn chưa nhập họ tên hoặc email");
                return false;
            }
            alert("Gửi đi");
            return true;
        }
    </script>
</head>
<body>
    <?php
        //khởi tạo hoten và email để tránh lỗi hiển thị lần đầu tiên
        $hoten="";
        $email="";
        $thongbao="";
        //lấy hoten và email từ form submit đến chỉ nếu đã submit form
        if(isset($_REQUEST["b1"]))
        {
            $hoten=$_REQUEST["hoten"];
            $email = $_REQUEST["email"];
            //if($email=="admin@gmail.com")
            if(strpos($email,"admin")===FALSE) //nếu email không chứa từ amdin
                $thongbao="Thành công!";
            else
                $thongbao="Lỗi: email không chứa từ admin";
        }
       
    ?>
    <form name="f1" id="f1" action="" onsubmit="return check()">
        <p>Họ tên: <input type="text" name="hoten" id="hoten" value="<?=$hoten?>"></p>
        <p>email: <input type="text" name="email" id="email" value="<?=$email?>"></p>
        <div style="color:red"><?=$thongbao?></div>
        <p><input type="submit" name="b1" id="b1" value="Gửi đi"></p>
    </form>
</body>
</html>