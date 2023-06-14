<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Demo tạo hàm và gọi hàm</title>
        <?php
            //Định nghĩa hàm hiển thị một chuỗi
            function Hello()
            {
                echo "<h3>Hello PHP Function</h3>";
            }
            //Định nghĩa hàm tính tổng 2 số a và b
            function Tinhtong($a, $b)
            {
                $tong = $a + $b;
                return $tong;
            }
            //Khai báo kiểu dữ liệu cho tham số và kiểu trả về của hàm
            function Add(float $a, float $b): float
            {
                $tong = $a + $b;
                return $tong;
            }
        ?>
    </head>
    <body>
        <h2>Demo định nghĩa hàm và gọi hàm</h2>
        <?php
            Hello();     //Gọi hàm Hello()
            $x=10;
            $y=5;
            $t = Tinhtong($x, $y);
            echo"<p>TỔng của $x và $y là: $t</p>";
            $t2 = Add(5.5,10.5);
            echo"<p>Tổng t2 = " . $t2 . "</p>";
        ?>
    </body>
</html>