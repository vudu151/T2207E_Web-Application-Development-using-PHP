<?php
require_once("KetnoiCSDL.php");
//trả về NULL nếu lỗi kết nối CSDL 
//trả về FALSE nếu lỗi SQL (sai lệnh sql hoặc tên bảng, tên cột..)
//không lỗi
function getListNhanvien()
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "SELECT * FROM tbNhanvien";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute();//thực thi câu sql, trả về TRUE/FALSE
    if($ketqua==FALSE)
        return FALSE;
    else{
        $rows = $pdo_stm->fetchAll();
        return $rows;
    }
}
//hàm thêm nhân viên mới
function AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?)";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $pdo_stm->bindParam(1,$hoten);
    $pdo_stm->bindParam(2,$dienthoai);
    $pdo_stm->bindParam(3,$gioitinh);
    $pdo_stm->bindParam(4,$hinhanh);
    $ketqua = $pdo_stm->execute();//thực thi câu sql, trả về TRUE/FALSE
    return $ketqua;
}
//Tìm và trả về 1 dòng là mảng chứa thông tin của nhân viên
function getNhanvienById($id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return -1;//LỖI KẾT NỐI CSDL
    $sql = "SELECT * FROM tbNhanvien WHERE  id=?";
    try{
        $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
        $pdo_stm->bindParam(1,$id);
        $ketqua = $pdo_stm->execute();//thực thi câu sql, trả về TRUE/FALSE
    }
    catch(PDOException $ex){
        echo "<p>" . $ex->getMessage() . "</p>";
        return -2;//LỖI SQL
    }
    if($ketqua==FALSE)//không có dữ liệu
        return 0;
    else{
        $row = $pdo_stm->fetch();//lấy 1 dòng kết quả
        return $row;
    }
}
//hàm sửa nhân viên
function UpdateNhanvien($id,$hoten,$dienthoai,$gioitinh,$hinhanh)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "UPDATE tbNhanvien SET hoten=?,dienthoai=?,gioitinh=?,hinhanh=? WHERE id=?";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $pdo_stm->bindParam(1,$hoten);
    $pdo_stm->bindParam(2,$dienthoai);
    $pdo_stm->bindParam(3,$gioitinh);
    $pdo_stm->bindParam(4,$hinhanh);
    $pdo_stm->bindParam(5,$id);
    $ketqua = $pdo_stm->execute();//thực thi câu sql, trả về TRUE/FALSE
    return $ketqua;
}
//hàm xóa nhân viên
function DeleteNhanvien($id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return -1;
    try{
        $sql = "DELETE FROM tbNhanvien WHERE id=?";
        $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
        $pdo_stm->bindParam(1,$id);
        $ketqua = $pdo_stm->execute();//thực thi câu sql, trả về TRUE/FALSE
    }
    catch(PDOException $ex){
        echo "<p>" . $ex->getMessage() . "</p>";
        return -2;//LỖI SQL
    }
    if($ketqua)
        return $pdo_stm->rowCount();
}
?>
