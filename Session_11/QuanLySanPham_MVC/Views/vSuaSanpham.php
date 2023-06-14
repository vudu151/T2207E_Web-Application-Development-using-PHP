<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form sửa sản phẩm</title>
    </head>
    <body>
        <h1>Sửa sản phẩm</h1>
        <?php
            if($id=="")
            {
                $noidung_thongbao="Chưa có id cần sửa";
                require_once("vThongbao.php");
                die();
            }
            if(is_numeric($id)==false)
            {
                $noidung_thongbao="Id phải là số";
                require_once("vThongbao.php");
                die();
            }
            if($ketqua==false)
            {
                $noidung_thongbao="Lỗi truy vấn CSDL";
                require_once("vThongbao.php");
                die();
            }
            if($sanpham->data==null)
            {
                $noidung_thongbao="Không tìm thấy sản phẩm có id = $id";
                require_once("vThongbao.php");
                die();
            }

            $row = $sanpham->data;
        ?>
        <form name="form_1" id="form_1" method="post" action="?act=xulysua">
            <input type="hidden" name="id" value="<?=$id?>">
            <p>Tên sách: <input type="text" name="tensach" value="<?=$row["title"]?>"></p>
            <p>Tên tác giả:<input type="text" name="tacgia" id="tacgia"  value="<?=$row["author"]?>"></p>
            <p>Giá sách:<input type="text" name="gia" id="gia"  value="<?=$row["price"]?>"></p>
            <p><input type="submit" name="b1" id="b1" value="Đồng ý"></p>
        </form>
    </body>
</html>