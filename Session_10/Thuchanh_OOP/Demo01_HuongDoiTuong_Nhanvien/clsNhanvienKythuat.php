<?php
    require_once("clsNhanvien.php");
    //Tạo lớp con thừa kế clsNhanvien
    class clsNhanvienKythuat extends clsNhanvien
    {
        public $ngaycong;
        //Khai báo hàm tạo
        function __construct($manv,$hoten,$ngaycong)
        {
            parent::__construct($manv,$hoten);  //Họi hàm tạo từ lớp cha
            $this->ngaycong = $ngaycong;
        }
        function getNgaycong()
        {
            return $this->ngaycong;
        }
        function setNgaycong($ngaycong)
        {
            $this->ngaycong = $ngaycong;
        }
        function Hienthi()  //Overide(ghi đè) lên hàm Hienthi() của lớp cha bên clsNhanvien.php
        {
            parent::Hienthi();    //Gọi hàm Hienthi() kế thừa từ lớp cha
            echo "<p>Ngày công: " . $this->ngaycong . "</p>";
        }
    }
?>