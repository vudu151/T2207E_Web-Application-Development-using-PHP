<div class="function">
    <a class="button" href="?module=product">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=product&act=add">THÊM SẢN PHẨM</a>
</div>
<div class="content" style="padding: 0 150px 30px 150px;">
    <h2 class="title__heading" style=" text-align: left;">Thêm sản phẩm</h2>
    <div id="detail">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handleadd" enctype="multipart/form-data">
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
                        ShowOptions($nps->data,"Id","Name",0);
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
                        ShowOptions($nps->data,"Id","Name",0);
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td width="120" height="30">Tên:</td>
                <td width="380"><input type="text" name="t1" id="t1"></td>
            </tr>
            <tr>
                <td height="30">Số lượng:</td>
                <td><input type="text" name="t2" id="t2"></td>
            </tr>
            <tr>
                <td height="30">Giá:</td>
                <td><input type="text" name="t3" id="t3"></td>
            </tr>
            <tr>
                <td height="30">Khối lượng:</td>
                <td><input type="text" name="t4" id="t4"></td>
            </tr>
            <tr>
                <td height="30">Số trang:</td>
                <td><input type="text" name="t5" id="t5"></td>
            </tr>
            <tr>
                <td height="30">Hình ảnh:</td>
                <td><input type="file" name="f1" id="f1"></td>
            </tr>
            <tr>
                <td height="30"  valign="top">Mô tả:</td>
                <td><textarea name="t6" id="t6" rows="5" cols="50"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
            </tr>
            </table>
        </form>
	</div>
</div>