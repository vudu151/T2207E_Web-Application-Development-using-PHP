<?php
if($sanpham->data==NULL)
{
	$thongbao ="không tìm thấy thông tin";
	require("ViewsHome/vKetqua.php");
}
else
{
$row = $sanpham->data;
?>  
<div class="function">
    <a class="button" href="?module=author">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=author&act=add">THÊM TÁC GIẢ</a>
</div>
<div class="content" style="padding: 0 150px 30px 150px;">
    <h2 class="title__heading" style=" text-align: left;">Sửa tác giả</h2>
    <div id="detail">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handlefix&id=<?=$row["Id"]?>" enctype="multipart/form-data">
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="150" height="30">Tên tác giả:</td>
                <td width="380"><input type="text" name="name" id="name" value="<?=$row["Name"]?>"></td>
            </tr>
            <td height="30">Hình ảnh:</td>
                <td>
                <img width="100" src="images/<?=$row["Image"]?>"><br>
                <input type="hidden" name="anhHientai" id="anhHientai" value="<?=$row["Image"]?>">
                <input type="file" name="f1" id="f1">
            </td>
            <tr>
                <td  height="30"  valign="top">Mô tả:</td>
                <td><textarea name="description" id="description" rows="5" cols="50"><?=$row["Description"]?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
            </tr>
            </table>
        </form>
	</div>
</div>

<div class="content">
    <h2 class="title__heading">Danh sách sản phẩm của tác giả <?=$row["Name"]?> </h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:5%">ID</th>
                        <th style="width:15%">Tên</th>
                        <th style="width:30%">Ảnh</th>
                        <th style="width:30%">Giá</th>
                        <th style="width:50%">Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Models/clsProduct.php");
                    $sanpham = new clsProduct();
                    $ketqua = $sanpham->GetProductByAuthorId($id);
                    $rows = $sanpham->data;
                    foreach($rows as $r)
                    {
                    ?>
                    <tr class="py-3">
                        <td>
                            <p class="id"><?=$r["Id"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$r["Name"]?></p>
                        </td>
                        <td >
                            <p class="id"><a href="images/<?=$r["Image"]?>"><img style="max-width: 60px; max-height: 80px;" src="images/<?=$r["Image"]?>"></a></p>
                        </td>
                        <td >
                            <p class="id"><?=number_format($r["Price"])?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$r["Quantity"]?></p>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
}
?>