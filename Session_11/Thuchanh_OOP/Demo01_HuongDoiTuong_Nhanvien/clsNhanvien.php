<?php
class clsNhanvien{
	//khai báo các thuộc tính của lớp Nhanvien
	public $manv;
	public $hoten;
	//Khai báo hàm tạo: Mặc định cú pháp như này __construct
	function __construct($manv, $hoten){
		$this->manv = $manv;
		$this->hoten = $hoten;
	}
	//khai báo một số hàm getter, setter
	function getManv()
	{
		return $this->manv;
	}
	function setManv($manv)
	{
		$this->manv=$manv;
	}
	function getHoten()
	{
		return $this->hoten;
	}
	function setHoten($hoten)
	{
		$this->hoten=$hoten;
	}
	//hàm hiển thị thông tin
	function Hienthi()
	{
		echo "<p> Mã nv: " . $this->manv . "</p>";
		echo "<p> Họ tên: " . $this->hoten. "</p>";
	}
}
?>