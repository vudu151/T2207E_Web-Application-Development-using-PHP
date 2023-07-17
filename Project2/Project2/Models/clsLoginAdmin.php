<?php
require_once("clsDatabase.php");
class clsLoginAdmin
{
	public $db;
	public $data;
	function __construct()
	{
		$this->db = new clsDatabase();
		$this->data = array();
	}
	function CheckAdmin($user,$pass)
	{
		$sql = "SELECT * FROM admins WHERE Username=? and Password=?";
		
		$data[] = $user;
		$data[] = $pass;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;
	}
}
?>