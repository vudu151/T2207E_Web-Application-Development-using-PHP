<?php
    sleep(1);
    require_once("Database.php");
    $keyword = isset($_REQUEST["keyword"])?$_REQUEST["keyword"]: "";
    $year = isset($_REQUEST["year"])?$_REQUEST["year"]: "";
    $rows = getListBooks($keyword, $year);
    if($rows==-1)
        die("<h3>Lỗi kết nối CSDL</h3>");
    else if($rows==-2)
        die("<h3>Lỗi sql</h3>");
    else if(count($rows)==0)
        die("<h3>Không tìm thấy dữ liệu</h3>");
?>
<table width="800" border="1" align="center" cellpadding="5">
    <tr bgcolor = "pink" height = "30">
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
        <tr height = "30">
            <td><?=$row["bookid"]?></td>
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
