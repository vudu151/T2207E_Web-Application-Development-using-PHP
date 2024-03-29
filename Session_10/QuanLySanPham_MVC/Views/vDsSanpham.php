<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản lý sản phẩm</title>
    </head>
    <body>
        <h1 align="center">DANH SÁCH SẢN PHẨM</h1>
        <?php
            //Sử dụng biến $ketqua và $sanpham đã có bên cltSanpham.php
            if($ketqua==false)
            {
                $noidung_thongbao = "Lỗi truy vấn CSDL";
                require_once("../Views/vThongbao.php");
                die();
            }
            $rows = $sanpham->data;   //Lấy mảng sản phẩm từ $data của lớp clsSanpham
            $n = count($rows);
            echo '<h3 style="text-align: center;">Có ' . $n . ' sản phẩm</h3>';
        ?>
        <h3 align="center"><a href="?act=them">Thêm sản phẩm</a></h3>
        <table width="800" border="1" align="center">
            <tr style="font-weight: bold;background-color:yellow;">
                <td width=10%>ID</td>
                <td width=30%>Title</td>
                <td width=20%>Author</td>
                <td width=20%>Price</td>
                <td width=20%>Action</td>
            </tr>
            <?php
                foreach($rows as $row)
                {
                    ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["title"]?></td>
                        <td><?=$row["author"]?></td>
                        <td><?=$row["price"]?></td>
                        <td>
                            <a href="?act=sua&id=<?=$row["id"]?>">Sửa</a>
                            - 
                            <a href="?act=xoa&id=<?=$row["id"]?>" onclick="return confirm('Chắc chắn xóa ?')">Xóa</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>