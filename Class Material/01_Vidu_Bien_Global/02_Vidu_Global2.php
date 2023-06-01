<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ biến toàn cục - biến cục bộ</title>
    <?php
    function Func1()
    {
        $GLOBALS["x"] = 20;//x là biến toàn cục trong Func1
        $x = 30;//$x là cục bộ (local của Func1) không liên quan $x ở dòng 20
        echo "<p> trong Func1: x global = " .$GLOBALS["x"] . "</p>";
        echo "<p> trong Func1: \$x =  $x </p>";
    }
    ?>
</head>
<body>
    <h2> Ví dụ sử dụng biến toàn cục PHP</h2>
    <?php
    $x = 10; //$x là biến toàn cục (global)
    Func1();
    echo "<p> sau Func1: x = $x";
    include("Trang2.php");
    ?>
    <br>
    <a href="Trang2.php">Trang 2</a>
</body>
</html>