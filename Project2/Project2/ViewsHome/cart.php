<h2 class="title__heading">GIỎ HÀNG</h2>
<?php
$count =0;
if(isset($_SESSION["cart"]))
    $count = count($_SESSION["cart"]);//đếm số phần tử của mảng cart
if($count==0)
{
?>
    <h2 class="title__heading">Giỏ hàng trống</h2>
    
<?php
}
else //count>0
{
?>
<div class="grid">
    <div class="container">    
        <form action="?module=cart&act=update" id="formcart" name="formcart" method="post">
        <table id="cart" class="table table-bordered tbale-condensed">
            <thead>
                <tr class="text-start text-center">
                    <th style="width:15%">Hình ảnh</th>
                    <th style="width:30%">Tên sản phẩm</th>
                    <th style="width:15%">Giá</th>
                    <th style="width:10%">SL</th>
                    <th style="width:15%">Thành tiền</th>
                    <th style="width:15%">Thao tác</th>
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
                        <p class="quantity"><input class="form-control" type="number" name="qty[<?=$masp?>]" value="<?=$soluong?>" ></p>    
                    </td>
                    <td>
                        <p class="subtotal"><?=number_format($row["Price"]*$soluong)?> đ</p>
                    </td>
                    <td>
                        <p class="button-cell">
                            <a href="?module=cart&act=del&id=<?=$masp?>" class="delete-button">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </p>
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
                    <td>
                        <input style="background-color: #449d44; color: var(--white-color); width: 100%;" class="btn btn-success btn-block" type="submit" name="btnupdate" value="Cập nhật giỏ hàng">
                    </td>
                </tr>
            </tfoot>
        </table>
        </form>
        <div style="text-align: right;">
            <a href="?module=checkout" style="background-color: #a9171d; color: var(--white-color);" class="btn btn-success btn-block">Mua hàng</a>
        </div>
    </div>
</div>

<?php
}
?>
