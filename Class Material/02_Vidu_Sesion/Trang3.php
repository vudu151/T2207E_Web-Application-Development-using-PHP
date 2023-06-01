<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang 3 - Sử dụng biến SESSION</title>
</head>
<body>
    <h2>Trang 3 - Hiển thị thông tin từ trang2</h2>
    <?php
    session_start();//Khai báo sử dụng SESSION
    $hoten = $_SESSION["hoten"];//lấy giá trị biến hoten từ SESSION
    ?>
    <h3> Hello: <?=$hoten?></h3>
</body>
</html>