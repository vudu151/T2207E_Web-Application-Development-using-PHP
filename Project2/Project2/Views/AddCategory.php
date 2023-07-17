<div class="function">
    <a class="button" href="?module=category">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=category&act=add">THÊM LOẠI SẢN PHẨM</a>
</div>
<div class="content" style="padding: 0 150px 30px 150px;">
    <h2 class="title__heading" style=" text-align: left;">Thêm nhóm sản phẩm</h2>
    <div id="detail">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handleadd">
            <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="120" height="30">Tên nhóm SP:</td>
                <td width="380"><input type="text" name="categoryname" id="categoryname"></td>
            </tr>
            <tr>
                <td height="30" valign="top">Mô tả:</td>
                <td><textarea name="categorydescription" id="categorydescription" rows="5" cols="50"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
            </tr>
            </table>
        </form>
	</div>
</div>