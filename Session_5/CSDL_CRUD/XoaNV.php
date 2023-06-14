<?php
    require("KNCSDL.php");
    //Lấy id từ link XoaNV?id=xxx
    if(isset($_REQUEST["id"])==false)
        die("<h3>Chưa có id nhân viên</h3>" );
    $id = $_REQUEST["id"];//Lấy id từ thẻ <input type ="hidden" name="id"...>
    if($id=="" || is_numeric($id)==false)
	    die("<p>Id không được rỗng và phải là số</p>");
    //Thực hiện các câu lệnh CRUD
    $sql = "DELETE FROM tbNhanvien WHERE id=?";
    $pdo_stm = $conn->prepare($sql);
    $pdo_stm->bindParam(1,$id);   //Gán id vào ? sau WHERE
    $ketqua = $pdo_stm->execute();  //Thực hiện lệnh sql
    if($ketqua==true)
    {
        if($pdo_stm->rowCount()>0)
            echo"<h3>Thành công</h3>";
        else
            echo"<h3>Không có nhân viên id = $id</h3>";
    }    
    else
        echo"<h3>Lỗi xóa CSDL</h3>";
?>
<a href="DSNV.php">DANH SÁCH NV</a>