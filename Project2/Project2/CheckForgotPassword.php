
<link rel="stylesheet" type="text/css" href="CSSHome/base.css"/>
<link rel="stylesheet" type="text/css" href="CSSHome/login.css"/>
    
 <!--   Modal layout-->
<div class="modal">
    <div class="modal__overlay">

    </div>

    <div class="modal__body">
        <!--Login form-->
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Xác nhận Email</h3>
                </div>

                <form class="" id="frmLogin" name="frmLogin" method="post" action="ctlForgotPassword.php?act=check">

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" id="number_check" name="number_check" class="auth-form__input" placeholder="Mã xác nhận được gửi tới Email của bạn" required>
                        </div>
                        <div class="auth-form__group">
                            <input type="password" id="password" name="password" class="auth-form__input" placeholder="Mật khẩu mới" required>
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