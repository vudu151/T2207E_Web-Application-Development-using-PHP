<?php
    require("fnCSDL.php");
    //Hàm trả về mảng chứa các nhân viên từ bảng tbNhanvien
    function getListNV()
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "SELECT * FROM tbNhanvien";
        $pdo_stm = $conn->prepare($sql);    //Khởi tạo đối tượng PDOStatement
        $ketqua = $pdo_stm->execute();           //Thực thi câu lệnh sql
        if($ketqua==false)
            return null;
        else
        {
            $rows = $pdo_stm->fetchAll(PDO::FETCH_BOTH);
            return $rows;   //Trả về các mảng dòng dữ liệu
        }
    }

    //Hàm thêm nhân viên
    function AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?)";
        $pdo_stm = $conn->prepare($sql);   //Khởi tạo đối tượng PDOStatement
        $pdo_stm->bindParam(1,$hoten);
        $pdo_stm->bindParam(2,$dienthoai);
        $pdo_stm->bindParam(3,$gioitinh);
        $pdo_stm->bindParam(4,$hinhanh);
        $ketqua = $pdo_stm->execute();
        return $ketqua;
    }

    //Hàm tìm kiếm nhân viên theo id và trả về dạng mảng
    function getNV($id)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "SELECT * FROM tbNhanvien WHERE id = ?";
        $pdo_stm = $conn->prepare($sql);
        $pdo_stm->bindParam(1,$id);
        $ketqua = $pdo_stm->execute();
        if($ketqua == false)
            return null;
        else
        {
            $row = $pdo_stm->fetch(PDO::FETCH_BOTH);
            return $row;
        }
    }

    //Hàm sửa nhân viên
    function UpdateNV($id,$hoten,$dienthoai,$gioitinh,$hinhanh)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "UPDATE tbNhanvien SET hoten=?, dienthoai=?,gioitinh=?,hinhanh=? WHERE id=?";
        $pdo_stm = $conn->prepare($sql);   //Khởi tạo đối tượng PDOStatement
        $pdo_stm->bindParam(1,$hoten);
        $pdo_stm->bindParam(2,$dienthoai);
        $pdo_stm->bindParam(3,$gioitinh);
        $pdo_stm->bindParam(4,$hinhanh);
        $pdo_stm->bindParam(5,$id);
        $ketqua = $pdo_stm->execute();
        return $ketqua;
    }

    //Hàm xóa nhân viên
    function DeleteNV($id)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "DELETE FROM tbNhanvien WHERE id = ?";
        $pdo_stm = $conn->prepare($sql);
        $pdo_stm->bindParam(1,$id);
        $ketqua = $pdo_stm->execute();
        return $ketqua;
    }
?>