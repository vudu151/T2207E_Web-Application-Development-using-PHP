<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 2- nhận thông tin lưu vào SESSION</title>
</head>
<body>
    <h2>Trang 2 - Nhận thông tin từ form</h2>
    <?php
    session_start();
    $hoten = $_REQUEST["hoten"];
    //biến SESSION là biến toàn cục được truy cập khi chuyển qua trang khác
    $_SESSION["hoten"]=$hoten;//Lưu họ tên vào biến SESSION
    ?>
    <h3> Hello: <?=$hoten?></h3>
    <br>
    <a href="Trang3.php"> Trang 3</a>
</body>
</html>