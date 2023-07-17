<h2 class="title__heading">HÓA ĐƠN</h2>
<?php
$count =0;
if(isset($_SESSION["cart"]))
    $count = count($_SESSION["cart"]);//đếm số phần tử của mảng cart
if($count==0)
{
?>
    <h2 class="title__heading">Hóa đơn trống</h2>
    
<?php
}
else //count>0
{
?>

<div id="cart_checkout">
    <script>
    function kt()
    {
        hoten = document.getElementById("hoten");
        diachi = document.getElementById("diachi");
        dienthoai = document.getElementById("dienthoai");
        if(hoten.value=="" || diachi.value=="" ||dienthoai.value=="")
        {
            alert("Chưa nhập đủ thông tin");
            return false;
        }
    }
    </script>
    <div class="content" style="padding: 0 150px 30px 150px;">
        <h2 class="title__heading" style=" text-align: left; padding: 15px 0">Điền thông tin mua hàng</h2>
        <div id="detail">
            <form name="f2" id="f1" action="?module=checkout&act=buy" method="post" onSubmit="return kt();">
                <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="150" height="30">Họ và tên:</td>
                    <td width="380"><input type="text" name="hoten" id="hoten" required></td>
                </tr>
                <tr>
                    <td width="150" height="30">Địa chỉ:</td>
                    <td width="380"><input type="text" name="diachi" id="diachi" required></td>
                </tr>
                <tr>
                    <td width="150" height="30">Điện thoại:</td>
                    <td width="380"><input type="text" name="dienthoai" id="dienthoai" required></td>
                </tr>
                <tr>
                    <td width="150" height="30">Ghi chú:</td>
                    <td width="380"><input type="text" name="note" id="note"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnbuy" id="btnbuy" value="Đồng ý"></td>
                </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<div class="grid">
    <div class="container">
        <table id="cart" class="table table-bordered tbale-condensed">
            <thead>
                <tr class="text-start text-center">
                    <th style="width:20%">Hình ảnh</th>
                    <th style="width:30%">Tên sản phẩm</th>
                    <th style="width:20%">Giá</th>
                    <th style="width:10%">SL</th>
                    <th style="width:20%">Thành tiền</th>
                </tr>
            </thead>
            <tbody>

            <?php
            
				//tạo chuỗi chứa danh sách các id của sản phẩm từ giỏ hàng (để SELECT)
				$arr = array_keys($_SESSION["cart"]);//lấy ra danh sách các key của mảng cart
				$str = implode(",", $arr);//tạo chuỗi chứa các phần tử của mảng ngăn cách bởi dấu phẩy
				//tạo đối tượng clsSanpham
				$sanpham = new clsProduct();
				$ketqua = $sanpham->GetProductsByListId($str);
				$total =0;//tổng tiền của tất cả sản phẩm trong giỏ hàng
				$rows = $sanpham->data;
                foreach($rows as $row)
				{
					$masp = $row["Id"];
					$soluong = $_SESSION['cart'][$masp];//số lượng của masp từ giỏ hàng
					$total+=$soluong*$row["Price"];
					
					$hinhanh = $row["Image"];
				?>

                <tr class="py-3">
                    <td>
                        <p class="image"><img src="images/<?=$row["Image"]?>" alt="Hình ảnh sách" width="60"></p>
                    </td>
                    <td >
                        <h3 class="name-product"><?=$row["Name"]?></h3>
                    </td>
                    <td>
                        <p class="price"><?=number_format($row["Price"])?> đ</p>
                    </td>
                    <td>
                        <p class="price"><?=$soluong?></p>    
                    </td>
                    <td>
                        <p class="subtotal"><?=number_format($row["Price"]*$soluong)?> đ</p>
                    </td>
                </tr>
                <?php
				}
			?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="hidden-xs"></td>
                    <td class="hidden-xs text-center">
                        <strong>Tổng tiền: <?=number_format($total)?> đ</strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php
}
?>
