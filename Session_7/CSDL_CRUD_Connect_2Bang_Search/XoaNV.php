<?php
    require_once("tblNV.php");
    if(isset($_REQUEST["id"])==false)
        die("<p>Chưa có id nhân viên</p>");
    $id = $_REQUEST["id"];
    if($id=="" || is_numeric($id)==false)
        die("<p>Id không được rỗng và phải là số</p>");
    $ketqua = DeleteNV($id);
    if($ketqua==true)
        echo"<h3>Thành công</h3>";
    else
        echo"<h3>Lỗi xóa dữ liệu</h3>";
?>
<a href="DSNV.php">DANH SÁCH NHÂN VIÊN</a>