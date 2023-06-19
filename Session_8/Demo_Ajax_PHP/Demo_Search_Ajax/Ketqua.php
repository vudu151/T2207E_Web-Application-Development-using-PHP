<?php
    require("Dungchung.php");
    $conn = KetnoiCSDL();
    $tukhoa = "";
    if(isset($_REQUEST["tukhoa"]))
        $tukhoa = $_REQUEST["tukhoa"];
    $sql = "SELECT * FROM tbnhomsp";
    if($tukhoa !="")
        $sql .= " WHERE tennhom LIKE '%$tukhoa%'";
    $pdo_stm = $conn -> query($sql);   //Thực thi câu lệnh sql
    if($pdo_stm==null)
        die("<h3>Lỗi sql</h3>");
    $n = $pdo_stm->rowCount();        //Lấy số bản ghi kết quả
    echo "<h3>Số kết quả nhóm sản phẩm là $n</h3>";
    //Lấy mảng chứa các dòng kết quả SELECT
    $rows = $pdo_stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)  //Lặp từng dòng trong mảng $rows
    {
        $manhom = $row["manhom"];
        $tennhom = $row["tennhom"];
        echo "<p>Mã: $manhom, Tên: $tennhom</p>";
    }
?>