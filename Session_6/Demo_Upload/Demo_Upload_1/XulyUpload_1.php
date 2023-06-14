<?php
    if(isset($_REQUEST["b1"])==false)
        echo "<h3>Chưa Submit từ form</h3>";
    else
    {
        $hoten = $_REQUEST["hoten"];
        if(isset($_FILES["hinhanh"]) && $_FILES["hinhanh"]["error"]==0)
        {
            $tenanh = $_FILES["hinhanh"]["name"];   //Lấy tên file gốc của ảnh
            $temptFile = $_FILES["hinhanh"]["tmp_name"]; //Lấy tên file đã upload lên thư mục tạm
            echo "<p>Tên file: $tenanh</p>";
            echo "<p>Tên file tạm: $temptFile</p>";
            move_uploaded_file($temptFile,"Hinhanh/$tenanh");   //Chuyển từ thư mục tạm đến File Hình ảnh ở form
            echo "<br><img src='Hinhanh/$tenanh' width='80'>";
        }
        else
        {
            echo "<p>Chưa có ảnh</p>";
        }
    }
?>