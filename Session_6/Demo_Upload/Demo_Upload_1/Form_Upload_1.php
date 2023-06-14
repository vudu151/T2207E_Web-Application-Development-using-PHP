<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Form Upload 1</title>
    </head>
    <body>
        <h1>Demo Upload Files</h1>
        <form name="form_1" id="form_1" method="post" action="XulyUpload_1.php" enctype="multipart/form-data"><!--Khi upload files hay ảnh đều cần có enctype="multipart/form-data"--> 
            Họ tên: <input type="text" name="hoten" id="hoten">
            <br><br>
            Hình ảnh: <input type="file" name="hinhanh"id="hinhanh">
            <br><br>
            <input type="submit" name="b1" id="b1" value="Gửi đi">
        </form>
    </body>
</html>