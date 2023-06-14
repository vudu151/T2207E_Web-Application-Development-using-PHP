<?php
    //Lớp clsSanpham thừa hưởng thuộc tính từ lớp clsDatabase
    //Thừa hưởng thuộc tính $conn, $pdo_stm, ThucthiSql()
    //Xây dựng thêm các hàm tìm kiếm, thêm, sửa, xóa tên bảng books
    require_once("clsDatabase.php");
    class clsSanpham extends clsDatabase
    {
        public $data = null;
        function __construct()
        {
            parent::__construct();    
        }

        //Hàm lấy danh sách sản phẩm
        public function LayDsSanpham()
        {
            $sql = "SELECT * FROM books";
            $ketqua = $this->ThucthiSql($sql);
            if($ketqua==true)
                $this->data = $this->pdo_stm->fetchAll();
            return $ketqua;
        } 

        //Tìm sản phẩm theo ID
        public function TimSanphamTheoID($id)
        {
            $sql = "SELECT * FROM books WHERE id = ?";
            $param = [$id];
            $ketqua = $this->ThucthiSql($sql,$param);
            if($ketqua==true)
                $this->data = $this->pdo_stm->fetch();   //Lấy 1 dòng kết quả lưu vào data
            return $ketqua;
        }

        //Tìm sản phẩm theo tên
        public function TimSanphamTheoTitle($title)
        {
            $sql = "SELECT * FROM books WHERE title LIKE ?";
            $title = "%$title%";
            $param = [$title];
            $ketqua = $this->ThucthiSql($sql,$param);
            if($ketqua==true)
                $this->data = $this->pdo_stm->fetch();
            return $ketqua;
        }

        //Hàm thêm sản phẩm
        public function ThemSanpham($title,$author,$price)
        {
            $sql = "INSERT INTO books VALUES(NULL,?,?,?)";
            $param = [$title,$author,$price];
            $ketqua = $this->ThucthiSql($sql,$param);
            return $ketqua;
        }

        //Hàm sửa sản phẩm
        public function SuaSanpham($title,$author,$price,$id)
        {
            $sql = "UPDATE books SET title = ?, author = ?, price = ? WHERE id = ?";
            $param = [$title,$author,$price,$id];
            $ketqua = $this->ThucthiSql($sql,$param);
            return $ketqua;
        }

        //Hàm xóa sản phẩm
        public function XoaSanpham($id)
        {
            $sql = "DELETE FROM books WHERE id = ?";
            $param = [$id];
            $ketqua = $this->ThucthiSql($sql,$param);
            return $ketqua;
        }
    }
?>