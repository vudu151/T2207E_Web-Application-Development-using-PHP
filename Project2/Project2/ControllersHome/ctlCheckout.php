<?php
require_once("Models/clsProduct.php");
$act = "";
$masp = "";
$quantity = "";
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$masp = $_REQUEST["id"];
if(isset($_REQUEST["quantity"]))
	$quantity = $_REQUEST["quantity"];
$link_tieptuc ="?module=" . $module;
$thongbao ="";

if($act == "buy"){
	require_once("Models/clsOrder.php");
    //biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
    $link_tieptuc ="?module=cart";
    $thongbao ="";
    //Lấy thông tin từ form và chèn hóa đơn mới
    if(isset($_SESSION["cart"])==false)
        $thongbao ="Giỏ hàng rỗng";
    else if(isset($_REQUEST["btnbuy"])==false)
        $thongbao ="lỗi submit form đặt hàng";
    else
    {
        if(isset($_SESSION["user"]))
        {
            require("Models/clsUser.php");
            $user_ck = new clsUser();
            $ketqua = $user_ck->GetIdByUsername($_SESSION["user"]);
            $row = $user_ck->data;
        }

        $hoten = $_REQUEST["hoten"];
        $diachi = $_REQUEST["diachi"];
        $dienthoai = $_REQUEST["dienthoai"];
        $note = isset($_REQUEST["note"])?$_REQUEST["note"]:"";
        $hoadon = new clsOrder();
        $ketqua = $hoadon->AddOrder($hoten,$diachi,$dienthoai,$note,$row["Id"]);
        if($ketqua==FALSE)
            $thongbao ="LỖI THÊM HÓA ĐƠN MỚI";
        else
        {
            //lấy mã hóa đơn tự động sinh từ lệnh insert trên
            $mahd = $hoadon->getLastId();
            $sanpham = new clsProduct();
            //duyệt từng mặt hàng trong giỏ hàng (cart) lấy ra masp và soluong
            //lưu mã hóa đơn, mã sản phẩm, số lượng, giá sản phẩm vào chi tiết hóa đơn
            foreach($_SESSION["cart"] as $masp=>$soluong)
            {
                $ketqua = $sanpham->GetProductById($masp);
                $giasp = $sanpham->data;//lấy giá sản phẩm
                $ketqua = $hoadon->AddProductOrder($giasp["Price"],$soluong,$masp,$mahd);
                if($ketqua==FALSE)
                    $thongbao ="LỖI THÊM CHI TIẾT HÓA ĐƠN";
                else
                {
                    unset($_SESSION["cart"]);//xóa giỏ hàng
                    $ketqua2 = $sanpham->FixProductQuantitySold($masp,$giasp["QuantitySold"]+$soluong);
                    $ketqua2 = $sanpham->FixProductQuantity($masp,$giasp["Quantity"]-$soluong);
                    $thongbao ="CẢM ƠN BẠN ĐÃ MUA HÀNG, CHÚNG TÔI SẼ LIÊN HỆ SỚM NHẤT";
                }
            }
        }
    }
    require("ViewsHome/vKetqua.php");
}
else
{   
    require("CheckLoginHome.php");
	require_once("ViewsHome/checkout.php");
}

?>