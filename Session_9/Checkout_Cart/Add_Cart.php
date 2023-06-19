<?php
    session_start();  //Khai báo sử dụng session
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    if($id == "" || is_numeric($id) == false)
        die("<h3>Lỗi lấy ID</h3>");
    if(isset($_SESSION["Cart"]) && array_key_exists($id,$_SESSION["Cart"]))
    {
        $soluong = $_SESSION["Cart"][$id];
        $soluong++;
        $_SESSION["Cart"][$id] = $soluong;
    }
    else
    {   //Nếu mã sản phẩm chưa có trong giỏ hàng hoặc giỏ hàng chưa tồn tại thì thêm mới 1 sản phẩm vào giỏ hàng
        $_SESSION["Cart"][$id] = 1;
    }
    header("Location:Cart.php");   //Chuyển tới trang hiển thị giỏ hàng
?>