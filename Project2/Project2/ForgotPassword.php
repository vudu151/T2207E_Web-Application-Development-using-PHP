<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>

    <link rel="stylesheet" type="text/css" href="CSSHome/base.css"/>
    <link rel="stylesheet" type="text/css" href="CSSHome/login.css"/>
    
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
                    <h3 class="auth-form__heading">Quên mật khẩu</h3>
                </div>

                <form class="" id="frmLogin" name="frmLogin" method="post" action="ctlForgotPassword.php">

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" id="user" name="user" class="auth-form__input" placeholder="Tài khoản" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="email" id="email" name="email" class="auth-form__input" placeholder="Email" required>
                        </div>
                    </div>
                    <div style="padding-bottom: 30px;" class="auth-form__controls">
                        <button type="submit" id="submit" name="submit" class="btn btn--primary">XÁC NHẬN</button>
                    </div>
                    
                </form>
                
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>