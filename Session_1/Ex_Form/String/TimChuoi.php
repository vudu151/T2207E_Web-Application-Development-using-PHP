<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TÌm kiếm chuỗi</title>
    </head>
    <body>
        <?php
            require("ThuVien.php");
            $s1="";
            $s2="";
            $kq="";
            if(isset($_REQUEST["b1"]))//Nếu trang php được submit
            {
                sleep(1);
                $s1 = $_REQUEST["t1"];
                $s2 = $_REQUEST["t2"];
                $kq = TimChuoi($s1, $s2);
            }
        ?>
        <h3>Tìm kiếm chuỗi</h3>
        <h3><?=$kq?></h3>
        <form id="form_1" name="form_1" method="post" action="">
            <p>
                Chuỗi 1: <input type="text" name="t1"id="t1" size="30" value="<?=$s1?>">
            </p>
            <p>
                Chuỗi 2: <input type="text" name="t2" id="t2" size="30" value="<?=$s2?>">
            </p>
            <p>
                <input type="submit" name="b1" id="b1" size="30" value="Tìm chuỗi 2 trong chuỗi 1"/>
            </p>
        </form>
        <p>&nbsp;</p>
    </body>
</html>