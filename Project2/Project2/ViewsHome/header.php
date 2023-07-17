
<div class="wrapper">
    <!-- Header  -->
    <div class="header">
        <!-- Header Top -->
        <div class="header-top">
            <div class="header-top-content">
                <div class="social-network htop">
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i> </a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>              
                    <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i> </a>                            
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
                    <a href="index.php"><img src="images/LogoPj2.png"></a>
                </div>
                <div class="list htop">
                    <ul>
                        <li><a href="?module=product"><span class="list-text">SẢN PHẨM</span></a>
                            <ul>
                                <?php
                                    foreach($rows as $row)
                                    {
                                        ?>
                                        <li><img src="https://theme.hstatic.net/200000343865/1001052087/14/hd_mainlink_icon2.png?v=117" class="img-book"><a href="?module=product&categoryid=<?=$row["Id"]?>"><?=$row["Name"]?></a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li><a href="#"><span class="list-text">TIN TỨC</span></a>
                            <ul>
                                <li><a href="#">Hoạt động</a></li>
                                <li><a href="?module=event">Sự kiện</a></li>
                                <li><a href="#">Điểm sách</a></li>
                                <li><a href="#">Lịch phát hành</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="list-text">GIỚI THIỆU</span></a>
                            <ul>
                                <li><a href="?module=aboutus">Giới thiệu của hàng</a></li>
                                <li><a href="?module=contactus">Hệ thống nhà sách</a></li>
                                <li><a href="?module=author">Danh sách tác giả</a></li>
                                <li><a href="?module=faqs">Những câu hỏi thường gặp</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="search htop">
                    <form action="?module=product&act=search" method="post">
                        <input id="searchInput" onkeyup="search()" name="keyword" class="input-search htop" type="text" placeholder="Tìm kiếm...">
                        <div class="icon-search htop">
                            <button type="submit" class="button-search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                    <table id="searchResults" class="header-info-search">
                    </table>
                </div>
                <div class="user-info htop">
                    <?php
                        if(isset($_SESSION["user"])){
                            ?>
                            <span class="user-icon">
                                <a href="?module=user">
                                    <i class="fa-sharp fa-solid fa-user"></i>
                                    <span class="user-info-text">
                                        <span><?=isset($_SESSION["user"])?$_SESSION["user"]:""?></span>
                                    <span>
                                </a>
                            </span>
                            <span class="sign-out-icon">
                                <a href='logout.php'>
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="user-info-text">Đăng xuất<span>
                                </a>
                            </span>
                            <?php
                        }
                        else {
                            ?>
                            <span class="sign-out-icon">
                                <a href='login.php'>
                                    <i class="fa-sharp fa-solid fa-user"></i>
                                    <span class="user-info-text">Đăng nhập<span>
                                </a>
                            </span>

                            <span class="sign-out-icon">
                                <a href='sign_up.php'>
                                    <i class="fa-solid fa-square-pen"></i>
                                    <span class="user-info-text">Đăng kí<span>
                                </a>
                            </span>
                            <?php
                        }
                    ?>
                </div>
                <div class="cart htop">
                    
                    <div class="cart-icon">
                        <a href="?module=cart"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    <?php 
                    $sum=0;
                    if(isset($_SESSION["cart"]))
                        $sum = array_sum($_SESSION["cart"]);
                    ?>
                    <div class="cart-number"><span class="header-number"><?=$sum?></span></div>
                </div>

                <div class="menu-mobile htop">
                    <div class="menu-mobile-icon">
                        <a href="#"><i class="fa-solid fa-bars"></i></a>
                    </div>
                    <div class="menu-mobile-content">
                        <div class="search-mobile">
                            <input id="searchtext" onkeyup="myKeyup()" name="search" value="" class="input-search htop" type="text" placeholder="Tìm kiếm...">
                            <div class="icon-search htop">
                                <button type="submit" class="button-search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                        <div class="list-mobile">
                            <ul>
                                <li><a href="#"><span class="list-text">SẢN PHẨM</span></a>
                                    <ul>
                                        <?php
                                            foreach($rows as $row)
                                            {
                                                ?>
                                                <li><a href="#"><?=$row["Name"]?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="#"><span class="list-text">TIN TỨC</span></a>
                                    <ul>
                                        <li><a href="#">Hoạt động</a></li>
                                        <li><a href="#">Sự kiện</a></li>
                                        <li><a href="#">Điểm sách</a></li>
                                        <li><a href="#">Lịch phát hành</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><span class="list-text">GIỚI THIỆU</span></a>
                                    <ul>
                                        <li><a href="#">Giới thiệu của hàng</a></li>
                                        <li><a href="#">Hệ thống nhà sách</a></li>
                                        <li><a href="#">Tác giả - Tác phẩm</a></li>
                                        <li><a href="#">Công tác xã hội</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="back-to-top">
            <div class="back-to-top-content">
                <i id="top-up" class="fa fa-angle-up back-to-top-button" aria-hidden="true"></i>
            </div>
        </div>

    </div>    
</div>
