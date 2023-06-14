<?php
    require_once("clsDatabase.php");
    class clsSanpham extends clsDatabase
    {
        public $data;    //Mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
        function __construct()
        {
            parent::__construct();   //Gọi hàm tạo của lớp cha để kết nối CSDL
            $this->data = null;
        }
        
        //Các hàm truy vấn, THÊM,SỬA,XÓA 
        //Hàm LayDanhsachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
        function LayDanhsachSanpham()
        {
            $sql = "SELECT * FROM books";
            $ketqua = $this->ThucthiSql($sql);   //Gọi ThucthiSql() để kế thừa từ lớp clsDatabase
            //Lấy các bản ghi kết quả lưu vào $data
            if($ketqua==true)
                $this->data = $this->pdo_stm->fetchAll();
            return $ketqua;
        }

        //Hàm thêm dữ liệu
        function ThemSanpham($name,$author,$price)
        {
            $sql = "INSERT INTO books VALUES (NULL,?,?,?)";
            $data = [$name,$author,$price];
            $ketqua = $this->ThucthiSql($sql,$data);
            return $ketqua;
        }

        //Hàm sửa dữ liệu
        function SuaSanpham($id,$name,$author,$price)
        {
            $sql = "UPDATE books SET title=?, author=?, price=? WHERE id=?";
            $data = [$name,$author,$price,$id];
            $ketqua = $this->ThucthiSql($sql,$data);
            return $ketqua;
        }

        //Hàm xóa dữ liệu
        function XoaSanpham($id)
        {
            $sql = "DELETE FROM books WHERE id=?";
            $data = [$id];
            $ketqua = $this->ThucthiSql($sql,$data);
            return $ketqua;
        }
    }
?>