
<div class="wrapper">
    <!-- Header  -->
    <div class="header">
        <!-- Header Top -->
        <div class="header-top">
            <div class="header-top-content">
                <div class="social-network htop">
                    <a href="#"><i class="fa-brands fa-facebook"></i> </a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>              
                    <a href="#"><i class="fa-brands fa-youtube"></i> </a>                            
                </div>
                <div class="notification htop">
                    <i class="fa-solid fa-bullhorn htop"></i>
                    
                    <marquee class="text-run">Chào mừng bạn đến với nhà sách Group4</marquee>
                </div>
                <div class="contact-info htop">
                <span class="email">
                        <i class="fa-solid fa-envelope"></i>
                        : Group4SellBook@gmail.com
                    </span>
                    <span class="phone">
                        <i class="fa-solid fa-phone"></i>
                        : (+84) 0123456789
                    </span>
                </div>
            </div>
        </div>

        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="header-bottom-content">
                <div class="logo htop">
                    <a href="index_admin.php"><img src="images/LogoPj2.png"></a>
                </div>
                <div class="list htop">
                    <ul>
                        <li><a href="?module=category"><span class="list-text">LOẠI SẢN PHẨM</span></a></li>
                        <li><a href="?module=product"><span class="list-text">SẢN PHẨM</span></a></li>
                        <li><a href="?module=event"><span class="list-text">SỰ KIỆN</span></a></li>
                        <li><a href="?module=order"><span class="list-text">HÓA ĐƠN</span></a></li>
                        <li><a href="#"><span class="list-text">XEM THÊM</span></a>
                            <ul>
                                <li><a href="?module=author">TÁC GIẢ</a></li>
                                <li><a href="?module=user">TÀI KHOẢN</a></li>
                                <li><a href="?module=banner">BANNER</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="user-info htop">
                    <?php
                        if(isset($_SESSION["admin"])){
                            ?>
                            <span class="user-icon">
                                <a href="">
                                    <i class="fa-sharp fa-solid fa-user"></i>
                                    <span class="user-info-text">
                                        <span><?=isset($_SESSION["admin"])?$_SESSION["admin"]:""?></span>
                                    <span>
                                </a>
                            </span>
                            <span class="sign-out-icon">
                                <a href='LogoutAdmin.php'>
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="user-info-text">Đăng xuất<span>
                                </a>
                            </span>
                            <?php
                        }
                        else {
                            ?>
                            <span class="sign-out-icon">
                                <a href='LoginAdmin.php'>
                                    <i class="fa-sharp fa-solid fa-user"></i>
                                    <span class="user-info-text">Đăng nhập<span>
                                </a>
                            </span>
                            <?php
                        }
                    ?>
                </div>

                <div class="menu-mobile htop">
                    <div class="menu-mobile-icon">
                        <a href="#"><i class="fa-solid fa-bars"></i></a>
                    </div>
                    <div class="menu-mobile-content">
                        <div class="list-mobile">
                            <ul>
                            <li><a href="?module=category"><span class="list-text">LOẠI SẢN PHẨM</span></a></li>
                            <li><a href="?module=product"><span class="list-text">SẢN PHẨM</span></a></li>
                            <li><a href="?module=event"><span class="list-text">SỰ KIỆN</span></a></li>
                            <li><a href="?module=order"><span class="list-text">HÓA ĐƠN</span></a></li>
                            <li><a href="?module=author"><span class="list-text">TÁC GIẢ</span></a></li>
                            <li><a href="?module=user"><span class="list-text">TÀI KHOẢN</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>