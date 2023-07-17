<?php
require_once("clsDatabase.php");
class clsAuthor
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	
	function GetAuthorList($order =0) 
	{
		$sql = "SELECT * FROM authors";
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

	function GetAuthorById($id)
	{
		$sql = "SELECT * FROM authors WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	
	//Hàm thêm dữ liệu
	function AddAuthor($name,$image,$description)
	{
		$sql = "INSERT INTO authors VALUES (NULL, ?, ?, ?)";
		$data[] = $name;
		$data[] = $image;
		$data[] = $description;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixAuthor($id,$name,$image,$description)
	{
		$sql = "UPDATE authors SET Name=?, Image = ?, Description = ? WHERE Id=?";
		$data[] = $name;
		$data[] = $image;
		$data[] = $description;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteAuthor($id)
	{
		$sql = "DELETE FROM authors WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	public function GetSumAuthor()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM authors";
 		$ketqua = $this->db->ThucthiSQL($sql);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}
	function GetAuthorListByLocation($start, $limit)
	{
		$sql = "SELECT * FROM authors LIMIT $start, $limit";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>