<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sửa nhân viên</title>
    </head>
    <body>
        <h2 style="text-align: center;color: #090">Sửa nhân viên</h2>
        <?php
            if(isset($_REQUEST["id"])==false)
                die("<p>Chưa có id nhân viên nào</p>");
            $id = $_REQUEST["id"];   //Lấu id nhân viên id
            if($id==""||is_numeric($id)==false)
                die("<p>ID nhân viên không được rống và phải là số</p>");
            //Kết nối CSDL và tìm kiếm nhân viên theo id
            require("KNCSDL.php");
            $sql = "SELECT * FROm tbNhanvien WHERE id= $id";
            $pdo_stm = $conn->prepare($sql); //Tạo đối tượng PDOStatement
            $ketqua = $pdo_stm->execute();    //Thực thi câu lệnh sql
            if($ketqua==false)
                die("<p>Lỗi Sql</p>");
            if($pdo_stm->rowCount()<=0)
                die("<p>Không tìm thấy nhân viên có id = $id</p>");
            
            //Lấy thoogn tinh nhân viên để hiển thị vòa form
            $row = $pdo_stm->fetch();   //Lấy 1 dòng kết quả SELECT
            $hoten = $row["hoten"];
            $dienthoai = $row["dienthoai"];
            $gioitinh = $row["gioitinh"];
            $hinhanh = $row["hinhanh"];
        ?>
        <form name="form_1" method="post" action="XulySuaNV.php">
            <input type="hidden" name="id"id="id" value="<?=$id?>">

            <table width="446" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">Họ tên</td>
                <td width="271"><input type="text" name="tHoten" id="tHoten" value="<?=$hoten?>"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" name="tDienthoai" id="tDienthoai" value="<?=$dienthoai?>"></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <label for="r1">Nam</label>
                    <input type="radio" name="rGioitinh" id="r1" value="0" <?=($gioitinh==0)?"checked":""?>>
                    <label for="r2">Nữ</label>
                    <input type="radio" name="rGioitinh" id="r2" value="1" <?=($gioitinh==1)?"checked":""?>>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="text" name="tHinhanh" id="tHinhanh" value="<?=$hinhanh?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="b1" id="b1" value="Đồng ý">
                    &nbsp;&nbsp;
                    <input type="reset" name="b2" id="b2" value="Nhập lại">
                </td>
            </tr>
            </table>
        </form>
    </body>
</html>