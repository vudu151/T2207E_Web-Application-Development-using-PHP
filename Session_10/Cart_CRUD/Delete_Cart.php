<?php
    session_start();
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    if($id=="" || is_numeric($id) == false)
        die("<h3>Lỗi id</h3>");
    if(isset($_SESSION["Cart"]))
    {
        if($id==0) 
            unset($_SESSION["Cart"]);    //Xóa toàn bộ giỏ hàng
        else
            unset($_SESSION["Cart"][$id]); //Xóa sản phầm có id khỏi giỏ hàng
    }
    header("location: Cart.php");
?>