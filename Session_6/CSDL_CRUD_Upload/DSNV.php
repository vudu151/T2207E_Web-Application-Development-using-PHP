<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Danh sách nhân viên</title>
    </head>
    <body>
        <h1 style="color: #090; text-align: center;">DANH SÁCH NHÂN VIÊN</h1>
        <p style="text-align: center;"><a href="ThemNV.php">Thêm nhân viên</a></p>
        <table width="1009" border="1" align="center" cellpadding="5"cellspacing="0">
            <tr bgcolor="#ffcc33">
                <td width="87">ID</td>
                <td width="212">HỌ TÊN</td>
                <td width="150">ĐIỆN THOẠI</td>
                <td width="165">GIỚI TÍNH</td>
                <td width="209">HÌNH ẢNH</td>
                <td width="172">XỬ LÝ</td>
            </tr>
            <?php
            require_once("tblNV.php");
            $rows = getListNV();
            if ($rows==null)
                die("<p>Lỗi CSDL</p>");
            foreach ($rows as $row)  //Lặp từng dòng
            {
                $hinhanh = $row["hinhanh"]==""?"no_image.png":$row["hinhanh"];
                ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["hoten"]?></td>
                    <td><?=$row["dienthoai"]?></td>
                    <td><?=$row["gioitinh"]==0?"Nam":"Nữ"?></td>
                    <td align="center" valign="middle">
                        <img src="Images/<?=$hinhanh?>" width="80">
                    </td>
                    <td>
                        <a href="SuaNV.php?id=<?=$row["id"]?>">Sửa</a>
                        -
                        <a href="XoaNV.php?id=<?=$row["id"]?>" onclick="return confirm('Chắc chắn xóa?')">Xóa</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>