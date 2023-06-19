<?php
    require_once("fnCSDL.php");
    //Hàm trả về mảng chứa các nhân viên từ bảng tbNhanvien
    function getListNV($maphong=0)   //Tham số $maphong mặc định = 0(khi không có tham số)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;

        //Bổ sung WHERE 1 để luôn có mệnh để WHERE ở câu SELECT mà vẫn trả về all bản ghi kết quả truy vấn
        $sql = "SELECT nv.*,pb.tenphong FROM tbNhanvien nv INNER JOIN tbPhongban pb ON nv.maphong=pb.maphong WHERE 1";
        //Nếu maphong > 0 thì bổ sung thêm điều kiện theo maphong
        if($maphong > 0)
            $sql .= " AND nv.maphong=$maphong";
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
    function AddNhanvien($hoten,$dienthoai,$gioitinh,$hinhanh,$maphong)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "INSERT INTO tbNhanvien VALUES(NULL,?,?,?,?,?)";
        $pdo_stm = $conn->prepare($sql);   //Khởi tạo đối tượng PDOStatement
        $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong];  //tạo mảng chứa các dữ liệu cần bindParam
        $ketqua = $pdo_stm->execute($data);
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
        //$pdo_stm->bindParam(1,$id);
        $data = [$id];
        $ketqua = $pdo_stm->execute($data);
        if($ketqua == false)
            return null;
        else
        {
            $row = $pdo_stm->fetch(PDO::FETCH_BOTH);
            return $row;
        }
    }

    //Hàm sửa nhân viên
    function UpdateNV($id,$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong)
    {
        $conn = ConnectDB();
        if($conn==null)
            return null;
        $sql = "UPDATE tbNhanvien SET hoten=?, dienthoai=?,gioitinh=?,hinhanh=?, maphong=? WHERE id=?";
        $pdo_stm = $conn->prepare($sql);   //Khởi tạo đối tượng PDOStatement
        // $pdo_stm->bindParam(1,$hoten);
        // $pdo_stm->bindParam(2,$dienthoai);
        // $pdo_stm->bindParam(3,$gioitinh);
        // $pdo_stm->bindParam(4,$hinhanh);
        // $pdo_stm->bindParam(5,$id);
        $data = [$hoten,$dienthoai,$gioitinh,$hinhanh,$maphong,$id];
        $ketqua = $pdo_stm->execute($data);
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
        //$pdo_stm->bindParam(1,$id);
        $data = [$id];
        $ketqua = $pdo_stm->execute($data);
        return $ketqua;
    }
?>