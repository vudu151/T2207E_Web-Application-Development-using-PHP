<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays - Mảng dạng Keys:Values</title>
</head>
<body>
    <h2>Associative Arrays - Mảng dạng Keys:Values</h2>
    <?php
    //mảng cho phép gán các key truy cập cho từng phần tử thay vì: 0,1,2..
    $cart = array("SP01" => 1, "SP02" => 3);
    //thêm phẩn tử mới có key là SP03, value là 4
    $cart["SP03"] = 4;
    //duyệt mảng sử dụng foreach($mang as $key=>$value)
    echo "<h3> Giỏ hàng </h3>";
    foreach($cart as $pcode => $quantity)
    {
        echo "<p>Mã SP: <b>$pcode</b>, Số lượng: <i>$quantity</i> </p>";
    }
    //kiểm tra key tồn tại trong mảng chưa?
    if(array_key_exists("SP04",$cart))//nếu tồn tại SP04 trong keys của mảng
        echo "<p> Sản phẩm SP04 đã có</p>";
    else
    echo "<p> Sản phẩm SP04 chưa có</p>";
    //lấy danh sách các keys của mảng
    $keys = array_keys($cart);
    echo "<p> Giỏ hàng:</p>";
    for($i=0; $i < count($keys); $i++)
    {
        $key = $keys[$i];
    ?>
        <p> Mã SP: <?=$key?>  - Số lượng: <?=$cart[$key]?> </p>
    <?php
    }
    //sử dụng hàm print_r($bienmang): hiển thị cấu trúc mảng lên màn hình
    print_r($keys);
    echo "<br>";
    print_r($cart);
    ?>
</body>
</html>