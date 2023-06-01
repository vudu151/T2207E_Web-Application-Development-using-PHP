<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sử dụng include</title>
</head>
<body>
<h2>Ví dụ Định nghĩa hàm và gọi hàm</h2>
    <?php
    //include("tệp"): nếu tệp không tìm thấy thì các lệnh sau vẫn hoạt động
    //include("inc_Myfunctions.php");
    //require("tệp"): nếu tệp không tìm thấy thì dừng luôn trang web
    //require("inc_Myfunctions.php");
    //require_once("tệp"): để xử lý việc 1 tệp được include 2 lần trùng nhau
    require_once("inc_Myfunctions.php");

    echo "<h3> Ví dụ include và require </h3>";
    Hello(); //gọi hàm Hello()
    $x =10;
    $y = 5.5;
    $t = Tinhtong($x,$y);
    echo "<p>Tổng của $x và $y là: $t </p>";
    ?>
</body>
</html>