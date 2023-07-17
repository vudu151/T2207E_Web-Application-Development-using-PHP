<?php
require_once("clsDatabase.php");
class clsCategory
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	
	function GetCategoryList($order =0) 
	{
		$sql = "SELECT * FROM categories";
		if($order == 1)
			$sql .= " ORDER BY Id ASC";
		else if($order == -1)
			$sql .= " ORDER BY Id DESC";
				$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
		
	//Hàm thêm dữ liệu
	function AddCategory($name,$description)
	{
		$sql = "INSERT INTO categories VALUES (NULL, ?, ?)";
		$data[] = $name;
		$data[] = $description;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixCategory($id,$name,$description)
	{
		$sql = "UPDATE categories SET Name=?, Description = ? WHERE Id=?";
		$data[] = $name;
		$data[] = $description;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteCategory($id)
	{
		$sql = "DELETE FROM categories WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	
	function GetCategoryById($id)
	{
		$sql = "SELECT * FROM categories WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	public function GetSumCategory()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM categories";
 		$ketqua = $this->db->ThucthiSQL($sql);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}
	function GetCategoryListByLocation($start, $limit)
	{
		$sql = "SELECT * FROM categories LIMIT $start, $limit";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>