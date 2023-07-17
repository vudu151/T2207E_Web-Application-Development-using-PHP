<?php
if($Nhomsanpham->data==NULL)
{
	$thongbao ="không tìm thấy thông tin";
	require("ViewsHome/vKetqua.php");
}
else
{
$row = $Nhomsanpham->data;
?>  
<div class="function">
    <a class="button" href="?module=category">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=category&act=add">THÊM LOẠI SẢN PHẨM</a>
</div>
<div class="content" style="padding: 0 150px 30px 150px;">
    <h2 class="title__heading" style=" text-align: left;">Sửa nhóm sản phẩm</h2>
    <div id="detail">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handlefix&id=<?=$row["Id"]?>">
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="120" height="30">Tên nhóm SP:</td>
                <td width="380"><input type="text" name="categoryname" id="categoryname" value="<?=$row["Name"]?>"></td>
            </tr>
            <tr>
                <td height="30" valign="top">Mô tả:</td>
                <td><textarea name="categorydescription" id="categorydescription" rows="5" cols="50"><?=$row["Description"]?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
            </tr>
            </table>
        </form>
	</div>
</div>
<?php
}
?>