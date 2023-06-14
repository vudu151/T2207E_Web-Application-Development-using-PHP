<?php
    require("Thuvien.php");
    if(isset($_REQUEST["b2"])==false)
        echo "<h3>Chưa submit từ form</h3>";
    else
    {
        $anh1= UploadFile("hinhanh1","Hinhanh/Anh1");
        if($anh1=="")
            echo "<p>Lỗi Upload ảnh 1</p>";
        else
            echo "<br><img src='Hinhanh/anh1/$anh1' width='80'><br>";
            $anh2= UploadFile("hinhanh2","Hinhanh/Anh2");
            if($anh2=="")
                echo "<p>Lỗi Upload ảnh 2</p>";
            else
                echo "<br><img src='Hinhanh/anh2/$anh2' width='80'><br>";
    }
?>