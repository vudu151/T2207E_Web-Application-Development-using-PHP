<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tính tuổi</title>
        <style type="text/css">
            input {border-radius: 10px;}
            input[type="text"] {width:50px;background:#ff9;}
            input[name=b1]{background:#093}
            #divKetqua{border:red 1px dashed;margin-top: 10px;}
        </style>
    </head>
    <body>  
        <?php
            require("ThuVien.php");
            $ngay = "";
            $thang = "";
            $nam = "";
            $ketqua = "";
            $loi = "";
            if(isset($_REQUEST["b1"]))
            {
                $ngay = $_REQUEST["tNgay"];
                $thang = $_REQUEST["tThang"];
                $nam = $_REQUEST["tNam"];
                //Kiểm tra số
                if($loi= KiemtraSo($ngay)!="")
                    $loi = "Ngày" . $loi;
                else if (($loi = KiemtraSo($thang))!="")
                    $loi = "Thang" . $loi;
                else if (($loi = KiemtraSo($nam))!="")
                    $loi = "Nam" . $loi;
                else if(!checkdate($thang,$ngay,$nam)) //Kiểm tra thời gian hợp lệ không
                    $loi = "Thời gian nhập không đúng";
                //Thực hiện tìm thứ trong tuần
                if($loi == "")
                    $ketqua = XemTuoi_1($ngay,$thang,$nam);
            }
        ?>
        <h3 style="color:red;font-size:24px;"><?=$loi?></h3>
        <h2>Nhập ngày/tháng/năm để xem tuổi</h2>
        <form name="form_1" method="post" action="">
            <input type="text" name="tNgay" id="tNgay" value="<?=$ngay?>"> /
            <input type="text" name="tThang" id="tThang" value="<?=$thang?>"> /
            <input type="text" name="tNam" id="tNam" value="<?=$nam?>">
            <input type="submit" name="b1" id="b1" value="Xem tuổi?">
        </form>
        <div id="divKetqua">Kết quả: <?=$ketqua?></div>
    </body>
</html>