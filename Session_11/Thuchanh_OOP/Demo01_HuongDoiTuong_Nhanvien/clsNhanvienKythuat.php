<?php
    require_once("clsNhanvien.php");
    //Tạo lớp con thừa kế clsNhanvien
    class clsNhanvienKythuat extends clsNhanvien
    {
        public $ngaycong;
        //Khai báo hàm tạo: Mặc định cú pháp như này __construct
        function __construct($manv, $hoten, $ngaycong)
        {
            parent::__construct($manv,$hoten);//gọi hàm tạo của lớp cha
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
        function Hienthi()   //Ghi đè onveride Hienthi() của hàm cha
        {
            parent::Hienthi();   //Gọi hàm Hienthi() kế thừa từ lớp cha
            echo "<p>Ngày công: " . $this->ngaycong . "</p>";
        }
    }
?>
