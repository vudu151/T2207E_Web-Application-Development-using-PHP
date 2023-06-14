<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Hình chữ nhật</title>
    </head>
    <body>
        <?php
            $chieudai="";
            $chieurong="";
            if(isset($_POST["b1"]))    //Nếu có b1 nghĩa là form được submit
            {
                require("Thuvien.php");
                $chieudai  = $_POST["tDai"];
                $chieurong = $_POST["tRong"];
                $cv = chuvi($chieudai,$chieurong);
                $dt = dientich($chieudai,$chieurong);
                echo "<br>Chu vi: $cv";
                echo "<br>Diện tích: $dt";
            }
        ?>
        <form name="form_1" id="form_1" method="post" action="">
            Chiều dài: <input type="text" name="tDai" id="tDai" value="<?=$chieudai?>"/>
            <br/>
            Chiều rộng: <input type="text" name="tRong" id="tRong" value="<?=$chieurong?>"/>
            <br/>
            <input type="submit" name="b1" id="b1" value="Tính"/>
        </form>
    </body>
</html>