<?php
require_once("clsDatabase.php");
class clsEvent
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	function GetEventList()
	{
		$sql = "SELECT * FROM events";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm thêm dữ liệu
	function AddEvent($name,$date,$image,$description)
	{
		$sql = "INSERT INTO events VALUES (NULL, ?, ?, ?, ?)";
		$data[] = $name;
		$data[] = $date;
		$data[] = $image;
		$data[] = $description;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixEvent($id,$name,$date,$image,$description)
	{
		$sql = "UPDATE events SET Name=?, Date = ?, Image = ?, Description = ? WHERE Id=?";
		$data[] = $name;
		$data[] = $date;
		$data[] = $image;
		$data[] = $description;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteEvent($id)
	{
		$sql = "DELETE FROM events WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm TimTheoIDTintuc($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
	function GetEventById($id)
	{
		$sql = "SELECT * FROM events WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	public function GetSumEvent()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM events";
 		$ketqua = $this->db->ThucthiSQL($sql);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}
	function GetEventListByLocation($start, $limit)
	{
		$sql = "SELECT * FROM events LIMIT $start, $limit";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>