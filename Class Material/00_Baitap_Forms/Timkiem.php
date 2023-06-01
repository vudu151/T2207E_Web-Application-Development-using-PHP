<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm chuỗi</title>
    <script>
        function check()
        {
            text1 = document.getElementById("t1");
            text2 = document.getElementById("t2");
            tb = document.getElementById("thongbao");
            if(text1.value=="")
            {
                tb.innerHTML="Chưa nhập chuỗi 1";
                text1.focus();//đặt con trỏ vào t1
                return false; //để không submit
            }
            if(text2.value=="")
            {
                tb.innerHTML="Chưa nhập chuỗi 2";
                text2.focus();//đặt con trỏ vào t2
                return false; //để không submit
            }
            tb.innerHTML="";
            alert("Submit");
            return true;//để tiếp tục submit
        }
    </script>
</head>
<body>
    <?php
        //khởi tạo giá trị hiển thị lên form
        $t1 = "";
        $t2 = "";
        $check = false;
        //nếu submit thì lấy giá trị của input
        if(isset($_REQUEST["b1"]))
        {
            $t1 = $_REQUEST["t1"];
            $t2 = $_REQUEST["t2"];
            //$i = strpos($t1,$t2);
            $i = stripos($t1,$t2);//tìm vị trí t2 trong t2 không phân biệt hoa/thường
            echo "<p>i = $i</p>";
            if($i==false)
                $check = false;
            else
                $check=true;
        }
    ?>
    <h2>Tìm chuỗi 2 trong chuỗi 1</h2>
    <form method="get" action="" onsubmit="return check();">
        <div id="thongbao" style="color:red"></div>
       Chuỗi 1: 
       <input type="text" name="t1" id="t1" value="<?=$t1?>" placeholder="Chuỗi ban đầu" >
       <br><br>
       Chuỗi 2: 
       <input type="text" name="t2" id="t2" value="<?=$t2?>" placeholder="Từ cần tìm" >
       <br><br>
       <input type="submit" name="b1" id="b1" value="Tìm chuỗi 2 trong chuỗi 1">
       <br><br>
       Kết quả: 
       Có <input type="radio" name="r" <?=$check==true?"checked":""?>>
       Không <input type="radio" name="r" <?=$check==false?"checked":""?>>
    </form>
</body>
</html>