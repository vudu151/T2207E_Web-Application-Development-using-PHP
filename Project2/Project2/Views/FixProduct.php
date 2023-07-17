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
    <a class="button" href="?module=product">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=product&act=add">THÊM SẢN PHẨM</a>
</div>
<div class="content" style="padding: 0 150px 30px 150px;">
    <h2 class="title__heading" style=" text-align: left;">Sửa sản phẩm</h2>
    <div id="detail">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handlefix&id=<?=$row["Id"]?>" enctype="multipart/form-data">
            <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="120" height="30">Nhóm sản phẩm:</td>
                <td width="630">
                <select name="selectCategory" id="selectCategory">
                    <option value="0"> Chọn nhóm SP</option>
                    <?php
                        require_once("Models/clsCategory.php");
                        require_once("Function/Function.php");
                        $nps = new clsCategory();
                        $nps->GetCategoryList(1);//lấy tất cả nhóm SP
                        ShowOptions($nps->data,"Id","Name",$row["CategoryId"]);
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td width="120" height="30">Tác giả:</td>
                <td width="630">
                <select name="selectAuthor" id="selectAuthor">
                    <option value="0"> Chọn tác giả</option>
                    <?php
                        require_once("Models/clsAuthor.php");
                        require_once("Function/Function.php");
                        $nps = new clsAuthor();
                        $nps->GetAuthorList(1);//lấy tất cả nhóm SP
                        ShowOptions($nps->data,"Id","Name",$row["AuthorId"]);
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td width="120" height="30">Tên:</td>
                <td width="380"><input type="text" name="t1" id="t1" value="<?=$row["Name"]?>"></td>
            </tr>
            <tr>
                <td height="30">Số lượng:</td>
                <td><input type="text" name="t2" id="t2" value="<?=$row["Quantity"]?>"></td>
            </tr>
            <tr>
                <td height="30">Giá:</td>
                <td><input type="text" name="t3" id="t3" value="<?=$row["Price"]?>"></td>
            </tr>
            <tr>
                <td height="30">Khối lượng:</td>
                <td><input type="text" name="t4" id="t4" value="<?=$row["Mass"]?>"></td>
            </tr>
            <tr>
                <td height="30">Số trang:</td>
                <td><input type="text" name="t5" id="t5" value="<?=$row["NumberPage"]?>"></td>
            </tr>
            <tr>
                <td height="30">Hình ảnh:</td>
                    <td>
                    <img width="100" src="images/<?=$row["Image"]?>"><br>
                    <input type="hidden" name="anhHientai" id="anhHientai" value="<?=$row["Image"]?>">
                    <input type="file" name="f1" id="f1">
                </td>
            </tr>
                <tr>
                <td height="30"  valign="top">Mô tả:</td>
                <td><textarea name="t6" id="t6" rows="5" cols="50"><?=$row["Description"]?></textarea></td>
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
    <h2 class="title__heading">Danh sách bình luận của tác phẩm</h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:5%">ID</th>
                        <th style="width:10%">Date</th>
                        <th style="width:10%">Mức đánh giá</th>
                        <th style="width:45%">Mô tả</th>
                        <th style="width:10%">Mã sản phẩm</th>
                        <th style="width:10%">Mã người dùng</th>
                        <th style="width:10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Models/clsComment.php");
                    $cmt = new clsComment();
                    $ketqua = $cmt->GetProductCommentListByProductId($id);
                    $rows = $cmt->data;
                    foreach($rows as $r)
                    {
                    ?>
                    <tr class="py-3">
                        <td>
                            <p class="id"><?=$r["Id"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$r["Date"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$r["RatingLevel"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$r["Description"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$r["ProductId"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$r["UserId"]?></p>
                        </td>
                        <td>
                            <p class="button-cell">
                                <button class="delete-button">
                                    <a href="?module=product&act=deletecomment&id=<?=$r["Id"]?>"><i class="fa fa-trash-alt"></i></a>
                                </button>
                            </p>
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