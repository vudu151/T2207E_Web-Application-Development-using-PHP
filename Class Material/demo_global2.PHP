<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        function f1()
        {
            //global $x;//khai báo biến $x là biến toàn cục
            $GLOBALS["x"]=20;
            $GLOBALS["x"]++;
        }
    ?>
</head>
<body>
    <h1>biến toàn cục</h1>
    <?php
     $x = 10;
     echo "<p>x1=$x</p>";
     f1();
     echo "<p>x2=$x</p>";
     session_start();
     $_SESSION["bienx"]=$x;
    ?>
    <a href="trang2.php">trang2.php</a>
    <br>
    <a href="trang3.php">trang3.php</a>
</body>
</html>