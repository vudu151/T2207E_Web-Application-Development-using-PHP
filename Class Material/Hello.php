<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ lấy giá trị Request từ URL</title>
    
    <style type="text/css">
        h3:nth-child(odd) {background-color:pink}
        h3:nth-child(even) {background-color:green}
    </style>
</head>
<body>
    <h2>Ví dụ lấy giá trị Request từ URL</h2>
    <?php
        $n=0;
        $hoten="";
        //nếu có biến solan và hoten trong URL
        if(isset($_REQUEST["solan"]) && isset($_REQUEST["hoten"])) 
        {
            $n= $_REQUEST["solan"];
            $hoten = $_REQUEST["hoten"];
        }
        else
        {
            echo "<p><a href=\"?hoten=FPT&solan=5\">Thử đường link</a></p>";
        }
        for($i=1; $i<=$n;$i++)
        {
     ?>
            <hr width="50%" align="left">
            <h3 style="color:red"><?=$i?> - Heloo: <?=$hoten?></h3>
            <hr width="50%" align="left">
    <?php             
        }
    ?>
</body>
</html>