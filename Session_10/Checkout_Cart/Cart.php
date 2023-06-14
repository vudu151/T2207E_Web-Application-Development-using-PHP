<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Giỏ hàng</title>
        <link rel="stylesheet" href="Style.css" type="text/css">
    </head>
    <body>
        <h1>Demo Giỏ hàng</h1>
        <h2><a href="Product.php">Danh sách sản phẩm</a></h2>
        <?php
            session_start();
            require("Database.php");
            if(isset($_SESSION["Cart"])==false || count($_SESSION["Cart"])==0)   //Nếu chưa có giỏ hàng Cart
            {
                ?>
                <div class="pro">
                    <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                    <a href="Product.php">Vào danh sách sản phẩm</a>
                </div>
                <?php
            }
            else
            {
                ?>
                <form name="form_1" id="form_1" method="post" action="Update_Cart.php">
                    <?php
                        $tongtien = 0;
                        foreach($_SESSION["Cart"] as $id => $soluong)
                        {
                            $row = Tim_Sanpham_Theo_ID($id);
                            $tongtien += $row["price"] * $soluong;
                    ?>
                    <div class="pro">
                        <h3><?=$row["title"]?> - <?=$row["author"]?></h3>
                        <p>Giá: <b><?=number_format($row["price"])?> vnđ</b></p>
                        <p align="right">
                            Số lượng <input type="text" name = "qty[<?=$id?>]" value="<?=$soluong?>" size="5">
                        </p>
                        <p align="right">
                            Tổng tiền sản phẩm: <b><?=number_format($row["price"] * $soluong)?> vnđ</b>
                        </p>
                        <p align="right"><a href="Delete_Cart.php?id=<?=$id?>">Xóa sản phẩm</a></p>
                    </div>
                    <?php
                        }    //for
                    ?>
                    <div class="pro">
                        <h3 style="text-align: center;color:red">Tổng tiền: <?=number_format($tongtien)?> VNĐ</h3>
                        <p align="center">
                            <input type="submit" name="b1" id="b1" value="Cập nhập số lượng" style="width:300px;height:50px;font-size: 18px;">    
                        </p>
                        <p align="center">
                            <a href="Delete_Cart.php?id=0"style="width: 300px; height:50px; font-size: 18px;color:red">Xóa tất cả sản phẩm</a>
                        </p>
                    </div>
                </form>
                <div>
                    <h2>THANH TOÁN GIỎ HÀNG</h2>
                    <form name="form_2" id="form_2" action="Checkout.php"method="post">
                        <p>
                            <span style="width: 110px; display: inline-block;">Họ tên:</span>
                            <input type="text" name="hoten"id="hoten">
                        </p>
                        <p>
                            <span style="width: 110px; display: inline-block;">Địa chỉ:</span>
                            <input type="text" name="diachi"id="diachi">
                        </p>
                        <p>
                            <span style="width: 110px; display: inline-block;">Điện thoại:</span>
                            <input type="text" name="dienthoai"id="dienthoai">
                        </p>
                        <p>
                            <span style="width: 110px; display: inline-block;">Ngày nhận hàng:</span>
                            <input type="text" name="ngaynhan"id="ngaynhan">
                        </p>
                        <p>
                            <input type="submit" name="dathang"id="dathang"value="Đồng ý">
                        </p>
                    </form>
                </div>
                <?php
            }
        ?>
    </body>
</html>