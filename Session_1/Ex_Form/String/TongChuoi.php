<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tổng chuỗi</title>
    </head>
    <body>
        <?php
            require("ThuVien.php");
            $s1 = "";
            $kq = "";
            if(isset($_REQUEST["b1"]))
            {
                $s1 = $_REQUEST["t1"];
                $tong = TongChuoi($s1);
                $kq = "Tổng là: $tong";
            }
        ?>
        <h3>Tổng các số phân biệt bởi dấu phẩy </h3>
        <h3><?=$kq?></h3>
        <form id="form1" name="form1" method="post" action="">
            <p>Nhập chuỗi phân biệt bởi dấu phẩy:
                <input name="t1" type="text" id="t1" size="30" value="<?=$s1?>" />
            </p>
            <p>
                <input type="submit" name="b1" id="b1" value="Tính tổng" />
            </p>
        </form>
        <p>&nbsp;</p>
    </body>
</html>