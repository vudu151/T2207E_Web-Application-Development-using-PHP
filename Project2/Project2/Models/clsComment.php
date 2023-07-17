<?php
require_once("clsDatabase.php");
class clsComment
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	
	function GetProductCommentList($order =0) 
	{
		$sql = "SELECT * FROM productcomments";
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

	function GetProductCommentById($id)
	{
		$sql = "SELECT * FROM productcomments WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetProductCommentByUserIdAndProductId($userid,$productid)
	{
		$sql = "SELECT * FROM productcomments WHERE UserId=? AND ProductId=?";
		$data[] = $userid;
		$data[] = $productid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetEventCommentByUserIdAndEventId($userid,$eventid)
	{
		$sql = "SELECT * FROM eventcomments WHERE UserId=? AND EventId=?";
		$data[] = $userid;
		$data[] = $eventid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

    function GetProductCommentListByProductId($productid)
	{
		$sql = "SELECT * FROM productcomments WHERE ProductId=? ORDER BY Id DESC";
		$data[] = $productid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetProductCommentListAndUsernameByProductId($productid, $start, $limit)
	{
		$sql = "SELECT PC.*, U.Username AS UsernameU FROM productcomments PC INNER JOIN users U ON PC.UserId = U.Id WHERE PC.ProductId=? ORDER BY PC.Id DESC LIMIT $start, $limit";
		$data[] = $productid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetEventCommentListAndUsernameByEventId($eventid, $start, $limit)
	{
		$sql = "SELECT PC.*, U.Username AS UsernameU FROM eventcomments PC INNER JOIN users U ON PC.UserId = U.Id WHERE PC.EventId=? ORDER BY PC.Id DESC LIMIT $start, $limit";
		$data[] = $eventid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

    function GetProductCommentListByUserId($userid)
	{
		$sql = "SELECT * FROM productcomments WHERE UserId=? ORDER BY Id DESC";
		$data[] = $userid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	
	//Hàm thêm dữ liệu
	function AddProductComment($rating,$description,$productid,$userid)
	{
		$sql = "INSERT INTO productcomments(RatingLevel,Description,ProductId,UserId) VALUES(?,?,?,?)";
		$data[] = $rating;
		$data[] = $description;
        $data[] = $productid;
        $data[] = $userid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixProductComment($id,$rating,$description)
	{
		$sql = "UPDATE productcomments SET RatingLevel=?, Description = ? WHERE Id=?";
		$data[] = $rating;
		$data[] = $description;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteProductComment($id)
	{
		$sql = "DELETE FROM productcomments WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

    function DeleteProductCommentByProductId($id)
	{
		$sql = "DELETE FROM productcomments WHERE ProductId=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function DeleteProductCommentByProductIdAndUserId($productid,$userid)
	{
		$sql = "DELETE FROM productcomments WHERE ProductId=? AND UserId=?";
		$data[] = $productid;
		$data[] = $userid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function DeleteEventCommentByEventIdAndUserId($eventid,$userid)
	{
		$sql = "DELETE FROM productcomments WHERE EventId=? AND UserId=?";
		$data[] = $eventid;
		$data[] = $userid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

    function GetEventCommentList($order =0) 
	{
		$sql = "SELECT * FROM eventcomments";
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

	function GetEventCommentById($id)
	{
		$sql = "SELECT * FROM eventcomments WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

    function GetEventCommentListByEventId($eventid)
	{
		$sql = "SELECT * FROM eventcomments WHERE EventId=?";
		$data[] = $eventid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

    function GetEventCommentListByUserId($userid)
	{
		$sql = "SELECT * FROM eventcomments WHERE UserId=?";
		$data[] = $userid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	
	//Hàm thêm dữ liệu
	function AddEventComment($description,$eventid,$userid)
	{
		$sql = "INSERT INTO eventcomments(Description,EventId,UserId) VALUES(?,?,?)";
		$data[] = $description;
        $data[] = $eventid;
        $data[] = $userid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixEventComment($id,$description)
	{
		$sql = "UPDATE eventcomments SET Description = ? WHERE Id=?";
		$data[] = $description;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteEventComment($id)
	{
		$sql = "DELETE FROM eventcomments WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

    function DeleteEventCommentByEventId($id)
	{
		$sql = "DELETE FROM eventcomments WHERE EventId=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	public function GetSumCommentByProductId($productid)
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM productcomments WHERE ProductId = ?";
		$data[] = $productid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}

	public function GetSumEventCommentByEventId($eventidid)
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM eventcomments WHERE EventId = ?";
		$data[] = $eventidid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}
}
?>