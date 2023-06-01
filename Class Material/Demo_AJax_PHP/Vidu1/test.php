<?php
if(!isset($_REQUEST["hoten"]) || !isset($_REQUEST["solan"]))
    echo "<h2> LỖI URL </h2>";
else
{
    $hoten = $_REQUEST["hoten"];
    $n = $_REQUEST["solan"];
    if($n==""  || is_numeric($n)==false)
        $n=1;
    for($i=1; $i<=$n;$i++)
        echo "<p> Họ tên:  $hoten </p>";
}
?>