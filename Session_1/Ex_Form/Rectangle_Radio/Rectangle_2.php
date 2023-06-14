<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tính chu vi diện tích</title>
    </head>
    <body>
        <?php
           //Khai báo trước để tránh lỗi lần đầu
           $dai = 0;
           $rong = 0;
           $chuvi = 0;
           $dientich = 0;
           $loi = "";
           if(isset($_REQUEST["dai"])==true && isset($_REQUEST["rong"])==true)
           {
               $dai = $_REQUEST["dai"];
               $rong = $_REQUEST["rong"];
               if($dai == "" || $rong == "")
                    $loi = "Chưa nhập chiều dài hoặc chiều rộng";
               else if(is_numeric($dai)==false || is_numeric($rong)==false)
                    $loi = "Phải nhập chiều dài, rộng là số";
                if($loi == "")
                {
                    $chuvi = ($dai+$rong)*2;
                    $dientich = $dai * $rong;
                }
           }
                
        ?>
        <div style="color: red"><?=$loi?></div>
        <form name="form_1" id="form_1" method = "get" action="">
            <p>
                Chiều dài: <input type="text" name="dai"id="dai" value="<?=$dai?>">
            </p>
            <p>
                Chiều rộng: <input type="text" name="rong"  id="rong" value="<?=$rong?>">
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Tính">
            </p>
        </form> 
        <p>Chu vi = <?=$chuvi?></p>
        <p>Diện tích = <?=$dientich?></p>
    </body>
</html>