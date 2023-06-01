<?php
require_once("KetnoiCSDL.php");
//trả về NULL nếu lỗi kết nối CSDL 
//trả về FALSE nếu lỗi SQL (sai lệnh sql hoặc tên bảng, tên cột..)
//không lỗi
function getListNhanvien($maphong=0)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "SELECT NV.*,PB.tenphong FROM tbNhanvien NV 
                INNER JOIN tbPhongban PB ON NV.maphong=PB.maphong WHERE TRUE ";
    if($maphong>0)
        $sql .= " AND NV.maphong=$maphong";
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
function AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh,$maphong)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?,?)";
    $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong];//tạo mảng chứa các tham số tương ứng dấu ?
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql, trả về TRUE/FALSE
    return $ketqua;
}
//Tìm và trả về 1 dòng là mảng chứa thông tin của nhân viên
function getNhanvienById($id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return -1;//LỖI KẾT NỐI CSDL
    $sql = "SELECT * FROM tbNhanvien WHERE  id=?";
    $data =[$id];
    try{
        $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
        $ketqua = $pdo_stm->execute($data);//thực thi câu sql, trả về TRUE/FALSE
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
function UpdateNhanvien($id,$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "UPDATE tbNhanvien SET hoten=?,dienthoai=?,gioitinh=?,hinhanh=?,maphong=? WHERE id=?";
    $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong,$id];
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql, trả về TRUE/FALSE
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
        $data = [$id];
        $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
        $ketqua = $pdo_stm->execute($data);//thực thi câu sql, trả về TRUE/FALSE
    }
    catch(PDOException $ex){
        echo "<p>" . $ex->getMessage() . "</p>";
        return -2;//LỖI SQL
    }
    if($ketqua)
        return $pdo_stm->rowCount();
}
?>
