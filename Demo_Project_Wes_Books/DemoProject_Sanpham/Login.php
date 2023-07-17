<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link rel="stylesheet" type="text/css" href="css_Admin/Login.css">
</head>
<body>
<div id="form_box">
    <h1 style="text-align:center"> ĐĂNG NHẬP </h1>
    <form id="frmLogin" name="frmLogin" method="post" action="Xulylogin.php">
    	<fieldset>
        	<legend> Nhập thông tin</legend>
            <div class="input_box">
                <span class="label">Tài khoản: <b style="color:red">*</b></span> 
                <input type="text" id="tUser" name="tUser" class="no_border" placeholder="Nhập Username">
            </div>
            <div class="input_box">
                <span class="label">Mật khẩu: <b style="color:red">*</b></span> 
                <input type="password" id="tPassword" name="tPassword" class="no_border" placeholder="Nhập Password">
            </div>
            <div class="button_box">
                <input type="submit" name="b1" id="b1" value="Đồng ý">
                <input type="reset" value="Nhập lại">
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>




