<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Kết quả</title>
    </head>
    <body>
        <h1>Kết quả tổng kết</h1>
        <?php
            $toan = $_REQUEST["tToan"];        //Lấy giá trị của input: tToan
            $van = $_REQUEST["tVan"]; 
            $anh = $_REQUEST["tAnh"];
            $tb = ($toan+$van+$anh)/3;
            echo "<br>Điểm trung bình: " . $tb;
            if($tb<4)
                echo "<br>Trượt";
            else if($tb >=4 && $tb < 6.5)
                echo "<br>Trung bình";
            else if($tb>=6.5 && $tb <8)
                echo "<br>Khá";
            else 
                echo "<br>Giỏi";
        ?>
    </body>
</html>




