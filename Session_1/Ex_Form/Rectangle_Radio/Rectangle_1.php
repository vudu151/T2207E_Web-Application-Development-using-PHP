<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tính chu vi và diện tích HCN</title>
    </head>
    <body>
        <?php
            //Nếu submit form thì mới lấy chiều dài, chiều rộng để tính
            if(isset($_REQUEST["dai"])==true && isset($_REQUEST["rong"])==true)
            {
                $dai = $_REQUEST["dai"];
                $rong = $_REQUEST["rong"];
                $chuvi = ($dai+$rong)*2;
                $dientich = $dai*$rong;
            }
        ?>
        <!--Để trống action thì khi submit nó sẽ reload lại chính trang đó-->
        <form name="form_1" id="form_1" method="get" action="">
            <p>
                Chiều dài: <input type="text" name="dai" id="dai" value="<?=$dai?>">
            </p>
            <p>
                Chiều rộng: <input type="text" name="rong" id="rong" value="<?=$rong?>">
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Tính">
            </p>
        </form>
        <p> Chu vi = <?=$chuvi?></p>
        <p> Diện tích = <?=$dientich?></p>
    </body>
</html>