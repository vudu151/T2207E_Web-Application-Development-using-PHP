<?php
require_once("fnCSDL.php");
//hàm trả về mảng chứa các nhân viên từ bảng tbNhanvien
function getListNhanvien()
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "SELECT * FROM tbNhanvien";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute();//thực thi câu sql
    if($ketqua==FALSE)
        return NULL;
    else
    {
        $rows = $pdo_stm->fetchAll(PDO::FETCH_BOTH);
        return $rows;//Trả về mảng các dòng dữ liệu
    } 
}
//Hàm thêm nhân viên
function AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?)";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    /*$pdo_stm->bindParam(1,$hoten);
    $pdo_stm->bindParam(2,$dienthoai);
    $pdo_stm->bindParam(3,$gioitinh);
    $pdo_stm->bindParam(4,$hinhanh);*/
    $data = [$hoten,$dienthoai,$gioitinh,$hinhanh];//tạo mảng chứa các dữ liệu cần bindParam
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql với mảng dữ liệu
    return $ketqua;//TRUE/FALSE
}
//hàm tìm nhân viên theo id và trả về bản ghi dạng mảng
function getNhanvien($id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "SELECT * FROM tbNhanvien WHERE id=?";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    //$pdo_stm->bindParam(1,$id);
    $data =[$id];
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql
    if($ketqua==FALSE)
        return NULL;
    else
    {
        $row = $pdo_stm->fetch(PDO::FETCH_BOTH);
        return $row;//Trả về mảng chứa dữ liệu
    } 
}
//Hàm Sửa nhân viên
function UpdateNhanvien($id,$hoten,$dienthoai,$gioitinh,$hinhanh)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "UPDATE tbNhanvien 
            SET hoten=?,dienthoai=?,gioitinh=?,hinhanh=? WHERE id=?";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    /*$pdo_stm->bindParam(1,$hoten);
    $pdo_stm->bindParam(2,$dienthoai);
    $pdo_stm->bindParam(3,$gioitinh);
    $pdo_stm->bindParam(4,$hinhanh);
    $pdo_stm->bindParam(5,$id);*/
    $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$id];
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql
    return $ketqua;//TRUE/FALSE
}
//Hàm Xóa nhân viên
function DeleteNhanvien($id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "DELETE FROM tbNhanvien WHERE id=?";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    //$pdo_stm->bindParam(1,$id);
    $data =[$id];
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql
    return $ketqua;//TRUE/FALSE
}
?>