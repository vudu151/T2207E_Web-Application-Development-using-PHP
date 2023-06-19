<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Demo biến mảng để lưu giỏ hàng</title>
    </head>
    <body>
        <?php
            //php cho phép khai báo mảng theo dạng key=>value cho mỗi phần tử
            //key là khóa để gắn và quản lý value thay vì index theo thứ tự 0,1,2,...
            //$cart = array("SP01"=>2,"SP02"=>3,"SP03"=>1);
            $cart[3] = 2; //Không cần khai báo trước mảng cứ thêm một phần tử mới là sinh ra mgnr
            $cart[4] = 3;
            $cart[5] = 1;
            //Thêm phần tử mới chỉ cần tạo 1 key mới và gán giá trị cho phần từ đó
            $cart[5] = 2;
            print_r($cart);
            //Duyệt mảng key=>value
            foreach($cart as $key=>$value)
            {
                echo "<p>Mã sp: $key, Số lượng: $value</p>";
            }
            //Kiểm tra 1 key đã có trong mảng chưa
            $masp = "4";
            if(array_key_exists($masp,$cart))
                echo "<p>Sản phẩm $masp đã có trong giỏ hàng</p>";
            else
                echo "<p?>Sản phẩm $masp chưa có trong giỏ hàng</p>";
        ?>
    </body>
</html>