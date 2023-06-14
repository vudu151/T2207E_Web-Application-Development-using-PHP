<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Danh sách nhân viên</title>
    </head>
    <body>
        <h1 style="text-align: center;color: #090;">DANH SÁCH NHÂN VIÊN</h1>
        <p style="text-align: center;"><a href="ThemNV.php">Thêm nhân viên</a></p>
        <?php
            require("KNCSDL.php");
            $sql = "SELECT * FROM tbNhanvien";
            $pdo_stm = $conn->prepare($sql);   //Tạo đối tượng PDOStatement
            $ketqua = $pdo_stm->execute();     //Thực thi câu lệnh sql
            if($ketqua==false)
                die("<h3>Lỗi câu lệnh sql</h3>");
            if($pdo_stm->rowCount()<=0)
                die("<h3>Chưa có CSDL</h3>");
            //Lấy các dòng từ CSDL dạng mảng 2 chiều
            $rows = $pdo_stm->fetchAll(PDO::FETCH_BOTH);
        ?>
        <table width="974" border="1" align="center" cellpadding="5"cellspacing="0">
            <tr bgcolor="#ffcc33">
                <td width="80">ID</td>
                <td width="210">Họ tên</td>
                <td width="166">Điện thoại</td>
                <td width="139">Giới tính</td>
                <td width="132">Hình ảnh</td>
                <td width="173">Xử lý</td>
            </tr>
            <?php
            foreach($rows as $row)
            {
                ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["hoten"]?></td>
                    <td><?=$row["dienthoai"]?></td>
                    <td><?=($row["gioitinh"]==0)?"Nam":"Nữ"?></td>
                    <td><?=$row["hinhanh"]?></td>
                    <td>
                        <a href="SuaNv.php?id=<?=$row["id"]?>">Sửa</a>
                        -
                        <a href="XoaNv.php?id=<?=$row["id"]?>" onclick="return confirm('Chắc chắn xóa ?');">Xóa</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>