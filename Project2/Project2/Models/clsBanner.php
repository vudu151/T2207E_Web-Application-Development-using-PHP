<?php
require_once("clsDatabase.php");
class clsBanner
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	
	function GetBannerList($order =0) 
	{
		$sql = "SELECT * FROM banners";
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
	function AddBanner($link)
	{
		$sql = "INSERT INTO banners VALUES (NULL, ?)";
		$data[] = $link;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteBanner($id)
	{
		$sql = "DELETE FROM banners WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	
	function GetBannerById($id)
	{
		$sql = "SELECT * FROM banners WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	public function GetSumBanner()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM banners";
 		$ketqua = $this->db->ThucthiSQL($sql);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}
	function GetBannerListByLocation($start, $limit)
	{
		$sql = "SELECT * FROM banners LIMIT $start, $limit";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>