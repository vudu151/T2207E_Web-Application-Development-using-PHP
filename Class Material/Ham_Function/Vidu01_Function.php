<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ tạo hàm và gọi hàm</title>
    <?php
    //định nghĩa hàm hiển thị một chuỗi
    function Hello()
    {
        echo "<h3> HELLO PHP FUNCTION </h3>";
    }
    //định nghĩa hàm tính tổng 2 số a và b
    function Tinhtong($a, $b)
    {
        $tong = $a + $b;
        return $tong;
    }
    //khai báo kiểm dữ liệu cho tham số và kiểu trả về của hàm
    function Add(float $a, float $b):float
    {
        $tong = $a + $b;
        return $tong; 
    }
    ?>
</head>
<body>
    <h2>Ví dụ Định nghĩa hàm và gọi hàm</h2>
    <?php
    Hello(); //gọi hàm Hello()
    $x =10;
    $y = 5.5;
    $t = Tinhtong($x,$y);
    echo "<p>Tổng của $x và $y là: $t </p>";
    $t2 = Add(5.5,10.5);
    echo "<p>Tổng t2 = " . $t2;
    ?>
</body>
</html>