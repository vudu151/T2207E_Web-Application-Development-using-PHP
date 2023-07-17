<?php
require_once("clsDatabase.php");
class clsEmailsub
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	
	function GetEmailsubList($order =0) 
	{
		$sql = "SELECT * FROM emailsubs";
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
	function AddEmailsub($email)
	{
		$sql = "INSERT INTO emailsubs VALUES (NULL, ?)";
		$data[] = $email;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixEmailsub($id,$email)
	{
		$sql = "UPDATE emailsubs SET Email=? WHERE Id=?";
		$data[] = $email;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteEmailsub($id)
	{
		$sql = "DELETE FROM emailsubs WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	
}
?>