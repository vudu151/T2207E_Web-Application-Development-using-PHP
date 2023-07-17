<?php
$searchValue = $_GET['s'];

require_once("../Models/clsProduct.php");

$search_Onkeyup = new clsProduct();

$ketqua = $search_Onkeyup->GetProductListOnkeyup(0, $searchValue);
$rows = $search_Onkeyup->data;

foreach($rows as $row)
{
    ?>
        <tr class="item-search-Onkeyup">
            <td><a href="?module=productdetail&id=<?=$row["Id"]?>"><img style="width: 30px; height: 40px;" src="images/<?=$row["Image"]?>"><a></td>
            <td><a href="?module=productdetail&id=<?=$row["Id"]?>"><?=$row["Name"]?></a></td>
        </tr>
    <?php
}
?>