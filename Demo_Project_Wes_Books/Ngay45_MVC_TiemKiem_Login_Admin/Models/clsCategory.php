<?php
require_once("clsDatabase.php");
class clsCategory
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsCategory()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//$trangthai: 2 - tất cả; 1 hoặc 0 thì lọc các bản ghi có status = 1|0
	//$order = 0 : không sắp xếp; 1 : tăng dần; -1 : giảm dần
	//tham số mặc định $trangthai =2, $order =0
	function LayDanhSachNhomSanpham($trangthai =2, $order =0) 
	{
		$sql = "SELECT * FROM tbcategory";
		//nếu khác 2 thì thêm mệnh đề WHERE để lọc, 
		//còn nếu =2 thì không có có WHERE => sẽ hiển thị mọi sản phẩm
		if($trangthai!=2) 
			$sql = $sql . " WHERE cat_status = " . $trangthai;
		if($order == 1)
			$sql .= " ORDER BY cat_ord ASC";
		else if($order == -1)
			$sql .= " ORDER BY cat_ord DESC";
				$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
		
	//Hàm thêm dữ liệu
	function ThemNhomSanpham($cat_name,$cat_ord,$cat_status)
	{
		$sql = "INSERT INTO tbcategory VALUES (NULL, ?, ?, ?)";
		$data[] = $cat_name;
		$data[] = $cat_ord;
		$data[] = $cat_status;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaNhomSanpham($cat_id,$cat_name,$cat_ord,$cat_status)
	{
		$sql = "UPDATE tbcategory SET cat_name=?, cat_ord = ?, cat_status = ? WHERE cat_id=?";
		$data[] = $cat_name;
		$data[] = $cat_ord;
		$data[] = $cat_status;
		$data[] = $cat_id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaNhomSanpham($cat_id)
	{
		$sql = "DELETE FROM tbcategory WHERE cat_id=?";
		$data[] = $cat_id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	
	function TimTheoIDNhomSanpham($cat_id)
	{
		$sql = "SELECT * FROM tbcategory WHERE cat_id=?";
		$data[] = $cat_id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm sửa dữ liệu cột cat_status
	function SuaTrangThaiSanpham($cat_id, $cat_status)
	{
		$sql = "UPDATE tbcategory SET cat_status = ? WHERE cat_id=?";
		$data[] = $cat_status;
		$data[] = $cat_id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
}
?>