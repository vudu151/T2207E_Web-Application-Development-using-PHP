<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Demo biến toàn cục - Biến cục bộ</title>
        <?php
            $GLOBALS["x"] = 20;   //x là biến toàn cục trong Func_1
            $x = 30; //x là biến cục bộ không liên quan gì đến x ở dòng 16
            echo"<p>Trong Func_2 : x global = " .$GLOBALS["x"] ."</p>";
            echo"<p>Trong Func_2 : \$x = $x </p>";
        ?>
    </head>
    <body>
    h2>Demo biến toàn cục trong PHP</h2>
            <?php
                $x=10;       //$x là biến toàn cục(global)
                echo "<p>Trước Func_1: x = $x</p>";
                Func_1();
                echo "<p>Sau Func_1: x = $x</p>";
                include("Page_2.php");
            ?>
            <a href="Page_2.php">Chuyển tới trang 2</a>
    </body>
</html>