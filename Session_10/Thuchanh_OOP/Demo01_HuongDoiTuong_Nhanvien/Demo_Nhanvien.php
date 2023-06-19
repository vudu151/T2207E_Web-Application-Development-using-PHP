<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Demo sử dụng clsNhanvien</title>
    </head>
    <body>
        <h2>Demo sử dụng clsNhanvien</h2>
        <?php
            require("clsNhanvien.php");
            //Tạo đối tượng của lớp clsNhanvien
            $nv1 = new clsNhanvien("NV01", "Phương");
            $nv2 = new clsNhanvien("","");
            $nv2->setManv("NV02");
            $nv2->setHoten("Anh");
            echo "<h3>Nhân viên 1: </h3>";
            $nv1->Hienthi();
            echo "<h3>Nhân viên 2: </h3>";
            $nv2->Hienthi();

            //Khai báo sử dụng lớp con
            require_once("clsNhanvienKythuat.php");
            $nv3 = new clsNhanvienKythuat("NV03","Hải",26);
            echo "<h3>Nhân viên 3: </h3>";
            $nv3->Hienthi();
        ?>
    </body>
</html>