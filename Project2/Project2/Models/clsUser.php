<?php
require_once("clsDatabase.php");
class clsUser
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	
	function GetUserList($order =0) 
	{
		$sql = "SELECT * FROM users";
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

	function GetUserById($id)
	{
		$sql = "SELECT * FROM users WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetIdByUsername($username)
	{
		$sql = "SELECT * FROM users WHERE username=?";
		$data[] = $username;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	
	//Hàm sửa dữ liệu
	function FixUser($id,$pass)
	{
		$sql = "UPDATE users SET Password=? WHERE Id=?";
		$data[] = md5($pass);
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	public function GetSumUser()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM users";
 		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();//lấy dòng kết quả
			return $this->data["Total"];//trả về cột tongtien
		}
		else
			return 0;
	}
	function GetUserListByLocation($start, $limit)
	{
		$sql = "SELECT * FROM users LIMIT $start, $limit";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetUserByUsername($username)
	{
		$sql = "SELECT * FROM users WHERE Username=?";
		$data[] = $username;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function FixEmailAndPasswordByUserName($username,$email,$password)
	{
		$sql = "UPDATE users SET Email=?, Password=? WHERE Username=?";
		$data[] = $email;
		$data[] = $password;
		$data[] = $username;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function FixUserByUsername($username,$firstname,$lastname,$address,$phone)
	{
		$sql = "UPDATE users SET FirstName=?, LastName=?, Address=?,Phone=? WHERE Username=?";
		$data[] = $firstname;
		$data[] = $lastname;
		$data[] = $address;
		$data[] = $phone;
		$data[] = $username;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function FixPasswordByUsername($username,$password)
	{
		$sql = "UPDATE users SET Password=? WHERE Username=?";
		$data[] = md5($password);
		$data[] = $username;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function AddUser($firstname,$lastname,$address,$email,$phone,$username,$password)
	{
		$sql = "INSERT INTO users VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
		$data[] = $firstname;
		$data[] = $lastname;
		$data[] = $address;
		$data[] = $email;
		$data[] = $phone;
		$data[] = $username;
		$data[] = md5($password);
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
}
?>