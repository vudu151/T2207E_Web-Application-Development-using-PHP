<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Books</title>
</head>
<body>
    <h1>Book Management</h1>
    <div id="search" style="width: 800px; margin: 10px auto;">
    <?php
    $keyword = isset($_REQUEST["keyword"])?$_REQUEST["keyword"]:"";
    ?>
        <form name="f1" id="f1" method="get" action="">
            <input type="text" name="keyword" id="keyword" 
                placeholder="input name of book" value="<?=$keyword?>">
            <input type="submit" name="b1" id="b1" value="Search">
        </form>
    </div>
    <?php 
        sleep(1);
        require_once("Database.php");
        $rows = getListBooks($keyword);
        if($rows==-1)
            die("<h3>LỖI KẾT NỐI CSDL</h3>");
        else if($rows==-2)
            die("<h3>LỖI SQL</h3>");
        else if(count($rows)==0)
            die("<h3>không tìm thấy dữ liệu</h3>");
    ?> 
    <table width="800"  align="center" border="1" cellpadding="5">
        <Tr bgcolor="pink" height="30">
            <th>bookid</th>
            <th>authorid</th>
            <th>title</th>
            <th>ISBN</th>
            <th>pub_year</th>
            <th>available</th>
        </Tr>
        <?php
        foreach($rows as $row)
        {
        ?>
        <Tr height="30">
            <td><?=$row["bookid"]?></td>
            <td><?=$row["authorid"]?></td>
            <td><?=$row["title"]?></td>
            <td><?=$row["ISBN"]?></td>
            <td><?=$row["pub_year"]?></td>
            <td><?=$row["available"]?></td>
        </Tr>
        <?php
        }
        ?>
    </table>
</body>
</html>