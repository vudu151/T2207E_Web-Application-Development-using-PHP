<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành viên</title>
</head>
<body>
<h2>Đăng ký thành viên</h2>
<?php
//xử lý form
//khởi tạo các biển để trán lỗi khi hiển thị lên form lần đầu
$fullname="";
$user = "";
$errFullname = "";
$errUser = "";
$nhanQC = "";
$gioitinh="";
//nếu form đã submit thì mới truy cập vào $_REQUEST["inputname"]
if(isset($_REQUEST["bSubmit"]))
{
    $fullname= $_REQUEST["hoten"];
    $user = $_REQUEST["username"];
    $pass = $_REQUEST["pass"];
    if($fullname=="")
        $errFullname="Chưa nhập họ tên";
    if($user=="")
        $errUser = "Chưa nhập user";
    else if($user=="admin")
        $errUser = "Không được đăng ký tài khoản này";

    //xử lý checkbox/radio    
    //nếu checkbox/radio không được chọn thì input không có trong $_REQUEST
    //phải sử dụng isset() để biết có check hay không?
    if(isset($_REQUEST["rGioitinh"]))
        $gioitinh = $_REQUEST["rGioitinh"];
    else
        $gioitinh = "Chưa chọn giới tính";

    /*if(isset( $_REQUEST["c1"])==true)//checkbox c1 được chọn
        $nhanQC =  $_REQUEST["c1"];//lấy value của checkbox c1
    else//checkbox c1 không được chọn
        $nhanQC = "không chọn quảng cáo";
    */
    $nhanQC = isset($_REQUEST["c1"])? $_REQUEST["c1"] : "không chọn quảng cáo";
    //với radio xử lý tương tự checkbox 
    //(nhưng nên mặc định checked ít nhất 1 radio để chắc chắn có value gửi đi)
}

?>

    <form name="form1" id="form1" action="" method="get">
        <p>Họ tên: <input type="text" name="hoten" value="<?=$fullname?>">
        <span style="color:red"><?=$errFullname?></span>
        </p>
        <p>Username: <input type="text" name="username" value="<?=$user?>">
        <span style="color:red"><?=$errUser?></span>
        </p>
        <p>Password: <input type="password" name="pass"></p>
        <p>Giới tính:
            Nam <input type="radio" name="rGioitinh" value="Nam">
            Nữ <input type="radio" name="rGioitinh" value="Nữ">
            <span style="color:red"><?=$gioitinh?></span>
        <p>
        <p>
            <label for="c1">Đồng ý nhận quảng cáo?</label>
            <input type="checkbox" name="c1" id="c1" value="có">
            <span style="color:red"><?=$nhanQC?></span>
        </p>
        <p><input type="submit" name="bSubmit" value="Đồng ý"></p>
    </form>
</body>
</html>