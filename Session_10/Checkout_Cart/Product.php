<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách sản phẩm</title>
        <link rel="stylesheet" type="text/css" href="Style.css">
    </head>
    <body>
        <h1>Demo <a href="Cart.php">Giỏ hàng</a></h1>
        <?php
            require("Database.php");
            $rows = DanhSach_SP();
            if($rows==null)
                die("<h3>Lỗi truy vấn CSDL</h3>");
            foreach($rows as $row)
            {
                ?>
                <div class="pro">
                    <h2><?=$row["title"]?></h2>
                    <p>Tác giả: <?=$row["author"]?> - Giá: <?=number_format($row["price"])?> VNĐ</p>
                    <p align="right"><a href="Add_Cart.php?id=<?=$row["id"]?>">Mua sách này</a></p>
                </div>
                <?php
            }
        ?>
    </body>
</html>