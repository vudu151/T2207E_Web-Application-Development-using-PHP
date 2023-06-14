<?php
    require("KNCSDL.php");
    //Lấy dữ liệu từ form
    if(isset($_REQUEST["b1"])==false)
        die("<h3>Chưa nhập form</h3>" );
    $id = $_REQUEST["id"];//Lấy id từ thẻ <input type ="hidden" name="id"...>
    $hoten = $_REQUEST["tHoten"];
    $dienthoai = $_REQUEST["tDienthoai"];
    $gioitinh = "0";
    if(isset($_REQUEST["rGioitinh"])==true)  //nếu chọn radio
        $gioitinh = $_REQUEST["rGioitinh"];
    $hinhanh = $_REQUEST["tHinhanh"];
    //Thực hiện các câu lệnh CRUD
    $sql = "UPDATE tbNhanvien SET hoten=?,dienthoai=?,gioitinh=?,hinhanh=? WHERE id=?";
    $pdo_stm = $conn->prepare($sql);
    $pdo_stm->bindParam(1,$hoten);   //Gán hoten vào ? thứ 1
    $pdo_stm->bindParam(2,$dienthoai);
    $pdo_stm->bindParam(3,$gioitinh);
    $pdo_stm->bindParam(4,$hinhanh);
    $pdo_stm->bindParam(5,$id);
    $ketqua = $pdo_stm->execute();  //Thực hiện lệnh sql
    if($ketqua==true)
        echo"<h3>Thành công</h3>";
    else
        echo"<h3>Lỗi sửa CSDL</h3>";
?>
<a href="DSNV.php">DANH SÁCH NV</a>