<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sử dụng kỹ thuật tham chiếu</title>
    <?php
    //hàm đầu vào $a,$b, tráo đổi giá trị của $a và $b
    //sử dụng tham số kiểu tham chiếu
    function Traodoi(&$a, &$b)
    {
        $tam = $a;
        $a = $b;
        $b = $tam;
        echo "<p>Sau tráo đổi, a = $a và b = $b </p>";
    }
    ?>
</head>
<body>
    <h2>Sử dụng tham chiếu</h2>
    <?php
    $x = 10;
    $y = 20;
    Traodoi($x,$y);//$a tham chiếu tới $x, $b tham chiếu tới $y
    echo "<p>Sau tráo đổi, x = $x và y = $y </p>";
    ?>
</body>
</html>