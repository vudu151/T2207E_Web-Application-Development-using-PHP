<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sử dụng kĩ thuật tham chiếu</title>
        <?php
            //Hàm đầu vào $a,$b, tráo đổi giá trị của $a và $b
            //Sử dụng tham số kiểu tham chiếu
            function Traodoi($a,$b)
            {
                $tam = $a;
                $a = $b;
                $b = $tam;
                echo "<p>Sau tráo đổi: a = $a, b = $b</p>";
            }
        ?>
    </head>
    <body>
        <h2>Sử dụng tham chiếu</h2>
        <?php
            $x=10;
            $y=20;
            Traodoi($x,$y);   //$a tham chiếu tới $x, $b tham chiếu tới $y
            echo "<p>Sau tráo đổi: x = $x, y = $y</p>";
        ?>
    </body>
</html>