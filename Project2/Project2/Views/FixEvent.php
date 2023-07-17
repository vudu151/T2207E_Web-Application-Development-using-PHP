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
    <a class="button" href="?module=event">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=event&act=add">THÊM SỰ KIỆN</a>
</div>
<div class="content" style="padding: 0 150px 30px 150px;">
    <h2 class="title__heading" style=" text-align: left;">Sửa sự kiện</h2>
    <div id="detail">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handlefix&id=<?=$row["Id"]?>" enctype="multipart/form-data">
            <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="150" height="30">Tên sự kiện:</td>
                <td width="380"><input type="text" name="name" id="name" value="<?=$row["Name"]?>"></td>
            </tr>
            <tr>
                <td height="30">Ngày diễn ra:</td>
                <td width="380"><input type="date" name="date" id="date" value="<?=$row["Date"]?>"></td>
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

        <script language="javascript">
            var ckTomtat = CKEDITOR.replace('description');
            ckTomtat.config.width = 600;
            CKFinder.setupCKEditor(ckTomtat, null, { type: 'Images' });
        </script>
	</div>
</div>

<div class="content">
    <h2 class="title__heading">Danh sách bình luận của sự kiện</h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:10%">ID</th>
                        <th style="width:10%">Date</th>
                        <th style="width:50%">Mô tả</th>
                        <th style="width:10%">Mã sự kiện</th>
                        <th style="width:10%">Mã người dùng</th>
                        <th style="width:10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("Models/clsComment.php");
                    $cmt = new clsComment();
                    $ketqua = $cmt->GetEventCommentListByEventId($id);
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
                            <p class="name-product"><?=$r["Description"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$r["EventId"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$r["UserId"]?></p>
                        </td>
                        <td>
                            <p class="button-cell">
                                <button class="delete-button">
                                    <a href="?module=event&act=deletecomment&id=<?=$r["Id"]?>"><i class="fa fa-trash-alt"></i></a>
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