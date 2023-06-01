<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng 2 chiều</title>
    <style type="text/css">
        .product {width: 200px; height: 100px; border: 1px red solid;
                border-radius: 5px; float:left; margin: 10px; padding: 20px;}
    </style>
</head>
<body>
    <h2>Mảng 2 chiều</h2>
    <?php
    $products = array( 
        array("code"=>"SP01","name"=>"Ti vi","price"=>5000000), 
        array("code"=>"SP02","name"=>"Đồng hồ","price"=>10000000), 
        array("code"=>"SP03","name"=>"Tủ lạnh","price"=>20000000)
        );
    print_r($products);
    ?>
    <h3>Danh sách sản phẩm</h3>
    <?php
    for($i=0; $i<count($products); $i++)
    {
    ?>
    <div class="product">
        <h3><?=$products[$i]["code"]?> - <?=$products[$i]["name"]?></h3>
        <h3>Giá: <?=number_format($products[$i]["price"])?> VNĐ</h3>
    </div>
    <?php
    }//đóng for
    ?>
    <h3 style="clear: both;">Danh sách sản phẩm - foreach</h3>
    <?php
    foreach($products as $p)
    {
    ?>
    <div class="product">
        <h3><?=$p["code"]?> - <?=$p["name"]?></h3>
        <h3>Giá: <?=number_format($p["price"])?> VNĐ</h3>
    </div>
    <?php
    }
    ?>
</body>
</html>