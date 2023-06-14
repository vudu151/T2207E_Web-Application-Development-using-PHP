<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>List Books</title>
    </head>
    <body>
        <h1 align="center" style="color: #090;">BOOK MANAGEMENT</h1>

        <div id="search" style="width: 800px; margin: 10px auto;">
            <?php
                $keyword = isset($_REQUEST["keyword"]) ? $_REQUEST["keyword"] : "";
                $year = isset($_REQUEST["year"]) ? $_REQUEST["year"] : "";
            ?>
            <form name="form_1" id="form_1" action="">   <!--Khi reload lại thì nó vẫn ở trang cũ-->
                Title: <input type="text" name="keyword" id="keyword" placeholder="Nhập tên sách" value="<?=$keyword?>" style="width: 160px; height: 26px;">
                Year: <input type="text" name="year" id="year" placeholder="Nhập năm xuất bản" value="<?=$year?>" style="padding: 6px 8px">
                <input type="submit" name="submit" id="submit" value="Search" style="padding: 6px 8px">
            </form>
        </div>

        <?php
            require_once("Database.php");
            $rows = getListBooks($keyword,$year);
            if($rows==-1)  //Các giá trị: Lỗi SQL, Lỗi kết nối CSDL, Không tìm thấy dữ liệu thì cần phải trùng với giá trị của với bên của function getListBooks() ở bên file ListBooks.php
                die("<h3>Lỗi kết nối CSDL</h3>");
            else if($rows==-2)
                die("<h3>Lỗi SQL</h3>");
            else if(count($rows)==0)
                die("<h3>Không tìm thấy dữ liệu</h3>");
        ?>

        <table width="800" align="center" border="1" cellspacing="0"cellpadding="5">
            <tr bgcolor="pink" height="30">
                <th>BookID</th>
                <th>AuthorID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>Pub_year</th>
                <th>Available</th>
            </tr>
            <?php
            foreach ($rows as $row) 
            {
            ?>
            <tr style="height: 30; text-align: center;">
                <td><?=$row["bookid"]?></td>     <!--bookid là tên cột trong database trên phpMyadmin -->
                <td><?=$row["authorid"]?></td>
                <td><?=$row["title"]?></td>
                <td><?=$row["ISBN"]?></td>
                <td><?=$row["pub_year"]?></td>
                <td><?=$row["available"]?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>