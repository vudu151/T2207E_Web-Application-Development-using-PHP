<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Thêm nhân viên</title>
        <script src="Script.js"></script>
    </head>
    <body>
        <h2 style="text-align: center;color: #090">Thêm nhân viên</h2>
        <form name="form_1"method="post" action="XulyThemNV.php" enctype="multipart/form-data" onsubmit="return kiemtra();">
        <table width="446" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">Phòng ban</td>
                <td width="271">
                    <select name="maphong" id="maphong">
                        <option value="0">Chọn phòng ban</option>
                        <?php
                            require_once("fnCSDL.php");
                            require_once("Thuvien.php");
                            TaoSelect("tbPhongban","maphong","tenphong",0);
                        ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td width="155">Họ tên : </td>
                <td width="271"><input type="text" name="tHoten" id="tHoten"></td>
            </tr>
            <tr>
                <td>Điện thoại : </td>
                <td><input type="text" name="tDienthoai" id="tDienthoai"></td>
            </tr>
            <tr>
                <td>Giới tính : </td>
                <td>
                    <label for="r1">Nam</label>
                    <input type="radio" name="rGioitinh" id="r1" value="0" checked>
                    <label for="r2">Nữ</label>
                    <input type="radio" name="rGioitinh" id="r2" value="1">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh : </td>
                <td><input type="file" name="fHinhanh" id="fHinhanh"></td>
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