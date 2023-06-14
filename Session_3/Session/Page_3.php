<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Page 3 - Sử dụng biến SESSION</title>
    </head>
    <body>
        <h2>Page 3 - Hiển thị thông tin từ Page 2</h2>
        <?php
        //Session là một cách để lưu trữ thông tin (trong các biến) được sử dụng trên nhiều trang.
        //Không giống như một cookie, thông tin được lưu trữ trên server, chứ không được lưu trữ trên máy tính người dùng.
        //Khi bạn làm việc với một ứng dụng, bạn mở nó, thực hiện một số thay đổi, và sau đó bạn đóng nó lại. Điều này giống như một phiên (session). Máy tính biết bạn là ai. Nó biết khi bạn bắt đầu ứng dụng và khi bạn kết thúc. Nhưng trên internet có một vấn đề: máy chủ web không biết bạn là ai hoặc bạn làm gì, vì địa chỉ HTTP không duy trì trạng thái.
        //Các biến session giải quyết vấn đề này bằng cách lưu trữ thông tin người dùng được sử dụng trên nhiều trang (ví dụ: tên người dùng, sở thích, v.v.). Theo mặc định, các biến session tồn tại cho đến khi người dùng đóng trình duyệt.


            session_start();   //Khai báo sử dụng SESSION
            $hoten = $_SESSION["hoten"];   //Lấy giá trị hoten từ biến SESSION
        ?>
        <h3>Hello: <?=$hoten?></h3>
    </body>
</html>