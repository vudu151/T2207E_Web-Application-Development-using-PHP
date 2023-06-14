<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Đăng kí thành viên</title>
    </head>
    <body>
        <h2>Đăng kí thành viên</h2>
        <?php
        //Xử lí các form
        //Khởi tạo các biến rỗng tránh khi khởi động bị lỗi
        $fullname="";
        $user="";
        $errFullname="";
        $errUser="";
        $nhanQC="";
        $gioitinh="";
        if(isset($_REQUEST["Submit"]))
        {
            $fullname = $_REQUEST["hoten"];
            $user = $_REQUEST["username"];
            $pass = $_REQUEST["password"];
            if($fullname=="")
                $errFullname="Chưa nhập họ tên";
            if($user=="")
                $errUser="Chưa nhập user";
            else if($user=="admin")
                $errUser="Không được đăng kí tài khoản này";

            //Xử lí checkbox, radio.Nếu checkbox,radio không được chọn thì input không có trong $_REQUEST
            //Phải sử dụng isset để xem có check hay không 
            if(isset($_REQUEST["rGioitinh"]))
                $gioitinh = $_REQUEST["rGioitinh"];
            else
                $gioitinh="Bạn chưa chọn giới tính";
            //if(isset($_REQUEST["c1"])==true)
            //    $nhanQC = $_REQUEST["c1"];       //Lấy value của checkbox c1
            //else
            //    $nhanQC = "Không chọn quảng cáo";
            $nhanQC = isset($_REQUEST["c1"]) ? $_REQUEST["c1"] : "Không chọn quảng cáo";
            //Với radio xử lí tương tự nhưng nên để mặc định checked ít nhất 1 radio để có value gửi đi
        }
        //Nếu form được submit thì mới truy cập vào được $_REQUEST["inputname"]
        ?>
        <form name="form" id="form" method="get" action="">
            <p>Họ tên: <input type="text" name="hoten" value="<?=$fullname?>">
                <span style="color: red;"><?=$errFullname?></span>
            </p>
            <p>Username: <input type="text" name="username" value="<?=$user?>">
                <span style="color: red;"><?=$errUser?></span>
            </p>
            <p>Password: <input type="password" name="password"></p>
            <p>Giới tính:
                Nam: <input type="radio" name="rGioitinh" value="Nam">
                Nữ: <input type="radio" name="rGioitinh" value="Nữ">
                <span style="color:red"><?=$gioitinh?></span>
            </p>
            <p>
                <label for="c1">Đồng ý nhận quảng cáo ?</label>
                <input type="checkbox" name="c1" id="c1" value="có">
                <span style="color:red"><?=$nhanQC?></span>
            </p>
            <p><input type="submit" name="Submit" value="Đồng ý"></p>
        </form> 
    </body>
</html>