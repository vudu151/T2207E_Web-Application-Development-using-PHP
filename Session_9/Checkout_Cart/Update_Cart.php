<?php
    session_start();
    if(isset($_REQUEST["qty"])==false)
        die("<p>Lỗi form</p>");
    $qty = $_REQUEST["qty"];   //Lấy mảng các input có name = qty[$id]
    //var_dump($qty);             //var_dump($qty);  Hiển thị kiểu chi tiết về biến cả về kiểu dữ liệu và giá trị
    foreach($qty as $id => $soluong)
    {
        if($soluong>0)
            $_SESSION["Cart"][$id] = $soluong;
        else
            unset($_SESSION["Cart"][$id]);  //Nếu số lượng <=0 thì xóa sản phẩm khỏi giỏ hàng
    }
?>
<p>Update thành công</p>
<a href="Cart.php">Hiển thị giỏ hàng</a>