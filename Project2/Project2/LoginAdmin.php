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
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                </div>

                <form class="" id="frmLogin" name="frmLogin" method="post" action="HandleLoginAdmin.php">

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" id="tAdmin" name="tAdmin" class="auth-form__input" placeholder="Tài khoản">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" id="tPassword" name="tPassword" class="auth-form__input" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link">Cần trợ giúp ?</a>
                        </div>
                    </div>
                    <div style="padding-bottom: 30px;" class="auth-form__controls">
                        <button type="submit" id="submit" name="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
                    </div>
                    
                </form>
                
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>