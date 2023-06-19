<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách nhân viên</title>
    </head>
    <body>
        <h1 style="color: #090; text-align: center;">DANH SÁCH NHÂN VIÊN</h1>
        <p style="text-align: center;"><a href="ThemNV.php">Thêm nhân viên</a></p>
        <?php
            require_once("fnCSDL.php");
            require_once("Thuvien.php");
            // $maphong=0; //Gán mặc định mã phòn tìm kiếm =0(TH mở DSNV lần đầu)
            // if(isset($_REQUEST["maphong"]))
            //     $maphong = $_REQUEST["maphong"];  //Lấy mã phòng chọn từ form
            $maphong = isset($_REQUEST["maphong"]) ? $_REQUEST["maphong"] : 0;
            $hoten = isset($_REQUEST["tHoten"]) ? $_REQUEST["tHoten"] : "";
            $dienthoai = isset($_REQUEST["tDienthoai"]) ? $_REQUEST["tDienthoai"] : "";
        ?>

        <div style="margin: 10px auto; width: 800px;">
            <form name="f1" id="f1" method="get" action="">
                Phòng ban: 
                <select name="maphong" id="maphong" onchange="document.f1.submit();">
                    <option value="0">Tất cả phòng ban</option>
                    <?php
                        TaoSelect("tbPhongban","maphong","tenphong",$maphong);
                    ?>
                </select>
                Họ tên :
                <input type="text" name="tHoten" id="tHoten" value="<?=$hoten?>">
                Điện thoại: 
                <input type="text" name="tDienthoai" id="tDienthoai" value="<?=$dienthoai?>">
                <input type="submit" name="bTimkiem" id="bTimkiem" value="Tìm kiếm">
            </form>
        </div>

        <table width="1109" border="1" align="center" cellpadding="5"cellspacing="0">
            <tr bgcolor="#ffcc33">
                <td width="87">ID</td>
                <td width="212">HỌ TÊN</td>
                <td width="150">ĐIỆN THOẠI</td>
                <td width="165">GIỚI TÍNH</td>
                <td width="209">HÌNH ẢNH</td>
                <td width="100">PHÒNG BAN</td>
                <td width="172">XỬ LÝ</td>
            </tr>
            <?php
                require_once("tblNV.php");
                $rows = getListNV($maphong,$hoten,$dienthoai);
                if ($rows==false)
                    die("<p>Lỗi SQL truy vấn CSDL</p>");
                if(count($rows)==0)
                    echo "<h3>Không tìm thấy dữ liệu</h3>";
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
                        <td><?=$row["tenphong"]?></td>
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