<?php
require_once("clsDatabase.php");
class clsTintuc
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsTintuc()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	function LayDanhSachTintuc()
	{
		$sql = "SELECT * FROM tbTintuc";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm thêm dữ liệu
	function ThemTintuc($tieude,$tomtat,$noidung,$hinhanh,$trangthai)
	{
		$sql = "INSERT INTO tbTintuc(tieude,tomtat,noidung,hinhanh,trangthai) VALUES (?, ?, ?, ?, ?)";
		$data[] = $tieude;
		$data[] = $tomtat;
		$data[] = $noidung;
		$data[] = $hinhanh;
		$data[] = $trangthai;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaTintuc($id,$tieude,$tomtat,$noidung,$hinhanh,$trangthai)
	{
		$sql = "UPDATE tbTintuc SET tieude=?, tomtat = ?, noidung = ?, hinhanh = ?, trangthai = ? WHERE id=?";
		$data[] = $tieude;
		$data[] = $tomtat;
		$data[] = $noidung;
		$data[] = $hinhanh;
		$data[] = $trangthai;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaTintuc($id)
	{
		$sql = "DELETE FROM tbTintuc WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm TimTheoIDTintuc($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
	function TimTheoIDTintuc($id)
	{
		$sql = "SELECT * FROM tbTintuc WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>