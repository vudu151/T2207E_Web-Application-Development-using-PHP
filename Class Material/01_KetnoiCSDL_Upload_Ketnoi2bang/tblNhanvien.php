<?php
require_once("fnCSDL.php");
//hàm trả về mảng chứa các nhân viên từ bảng tbNhanvien
function getListNhanvien($maphong=0)//tham số $maphong mặc định = 0 (khi không có tham số)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    //Bổ sung WHREE 1 để luôn có mệnh đề WHERE ở câu SELECT 
    //mà vẫn trả về tất cả bản ghi kết quả truy vấn
    $sql = "SELECT nv.*,pb.tenphong FROM tbNhanvien nv 
            INNER JOIN tbPhongban pb ON nv.maphong=pb.maphong WHERE 1 ";
    //nếu maphong > 0 thì bổ sung thêm điều kiện thì theo maphong
    if($maphong>0)
        $sql .= " AND nv.maphong=$maphong";   
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
function AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh,$maphong)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?,?)";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong];//tạo mảng chứa các dữ liệu cần bindParam
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
function UpdateNhanvien($id,$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "UPDATE tbNhanvien 
            SET hoten=?,dienthoai=?,gioitinh=?,hinhanh=?, maphong=? WHERE id=?";
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    /*$pdo_stm->bindParam(1,$hoten);
    $pdo_stm->bindParam(2,$dienthoai);
    $pdo_stm->bindParam(3,$gioitinh);
    $pdo_stm->bindParam(4,$hinhanh);
    $pdo_stm->bindParam(5,$id);*/
    $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong,$id];
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