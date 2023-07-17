<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng kí</title>

    <link rel="stylesheet" type="text/css" href="CSSHome/base.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/login.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/sign_up.css"/>
    
</head>
<body>
 <!--   Modal layout-->
<div class="modal">
    <div class="modal__overlay">

    </div>

    <div class="modal__body">
        <!--Login form-->
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng ký</h3>
                </div>

                <form class="" id="frmLogin" name="frmLogin" method="post" action="HandleSignUp.php">

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" id="tUser" name="tUser" class="auth-form__input" placeholder="Tài khoản" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="password" id="tPassword" name="tPassword" class="auth-form__input" placeholder="Mật khẩu" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="text" id="firstname" name="firstname" class="firstname" placeholder="Họ" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="text" id="lastname" name="lastname" class="lastname" placeholder="Tên" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="text" id="address" name="address" class="auth-form__input" placeholder="Địa chỉ" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="text" id="phone" name="phone" class="auth-form__input" placeholder="Số điện thoại" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="email" id="email" name="email" class="auth-form__input" placeholder="Email" required>
                        </div>
                    </div>
                    <div style="padding-bottom: 30px;" class="auth-form__controls">
                        <button type="submit" id="submit" name="submit" class="btn btn--primary">ĐĂNG KÝ</button>
                    </div>
                    
                </form>
                
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>