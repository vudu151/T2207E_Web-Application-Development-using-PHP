<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo tạo hàm và gọi hàm</title>
    <?php
    //Định nghĩa hàm hiển thị một chuỗi
    function Hello()
    {
        echo "<h3> HELLO PHP FUNCTION </h3>";
    }
    //định nghĩa hàm tính tổng 2 số a và b, sử dụng default value
    //khi gọi hàm mà bỏ qua tham số thì $a được coi là 10, $b là 20
    function Tinhtong($a = 10, $b = 20)
    {
        $tong = $a + $b;
        return $tong;
    }
    ?>
</head>
<body>
    <h2>Demo Định nghĩa hàm và gọi hàm</h2>
    <?php
        Hello();                         //gọi hàm Hello()
        $t1 = Tinhtong();                //Tinhtong(10,20)
        echo "<p>Tổng t1 là: $t1 </p>";
        $t2 = Tinhtong(5.5);             //Tinhtong(a=5.5, b=20);
        echo "<p>Tổng t2 là: $t2 </p>";
    ?>
</body>
</html>