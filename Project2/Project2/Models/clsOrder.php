<?php
require_once("clsDatabase.php");
class clsOrder
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//Hàm LayDanhSachHoadon() truy vấn dữ liệu lưu vào thuộc tính data
	function GetOrderList()
	{
		$sql = "SELECT * FROM orders ORDER BY Id DESC";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm tính và trả về tổng tiền của 1 hóa đơn, đầu vào mã hóa đơn
	public function GetTotalMoney($id)
	{
		$sql = "SELECT SUM(Quantity*Price) AS Total 
					FROM productorders WHERE OrderId=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();//lấy dòng kết quả
			return $this->data["Total"];//trả về cột tongtien
		}
		else
			return -1;
	}

	public function GetTotalMoneyByDate($date)
	{
		$sql = "SELECT SUM(PO.Quantity*PO.Price) AS Total FROM productorders PO
				INNER JOIN orders O ON PO.OrderId=O.Id WHERE O.TimeOrder=? AND O.Status='Giao hàng thành công'";
		$data[] = $date;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();//lấy dòng kết quả
			return $this->data["Total"];//trả về cột tongtien
		}
		else
			return 0;
	}

	public function GetTotalMoneyInMonthByDate($date)
	{
		$sql = "SELECT SUM(PO.Quantity*PO.Price) AS Total FROM productorders PO
				INNER JOIN orders O ON PO.OrderId=O.Id WHERE MONTH(O.TimeOrder)=MONTH(?) AND YEAR(O.TimeOrder)=YEAR(?) AND O.Status='Giao hàng thành công'";
		$data[] = $date;
		$data[] = $date;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();//lấy dòng kết quả
			return $this->data["Total"];//trả về cột tongtien
		}
		else
			return 0;
	}

	public function GetTotalMoneyOfMonthInYearByDate($date, $month)
	{
		$sql = "SELECT SUM(PO.Quantity*PO.Price) AS Total FROM productorders PO
				INNER JOIN orders O ON PO.OrderId=O.Id WHERE MONTH(O.TimeOrder)=$month AND YEAR(O.TimeOrder)=YEAR(?) AND O.Status='Giao hàng thành công'";
		$data[] = $date;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();//lấy dòng kết quả
			return $this->data["Total"];//trả về cột tongtien
		}
		else
			return -1;
	}

	public function GetTotalMoneyComfirmedOrder()
	{
		$sql = "SELECT SUM(Quantity*Price) AS Total 
					FROM productorders WHERE OrderId IN (SELECT Id FROM orders WHERE Status='Giao hàng thành công')";
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
	//Hàm TimHoaDon(mahd) đầu vào là mã hóa đơn, 
	//trả về bản ghi chứa thông tin của hóa đơn từ bảng tbHoadon
	function GetOrder($id)
	{
		$sql = "SELECT * FROM orders WHERE Id=?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm ChitietHoadon(mahd): đầu vào là mã hóa đơn, trả về danh sách các sản phẩm
	//của hóa đơn,số lượng, giá mua.. lấy từ bảng tbChitietHoadon kết nối với bảng tbSanpham
	function GetDetailOrder($id)
	{
		$sql = "SELECT PO.*, P.Name 
				 FROM productorders PO INNER JOIN products P
				 ON PO.ProductId = P.Id WHERE OrderId = ?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetUnconfirmedOrder()
	{
		$sql = "SELECT * FROM orders WHERE Status='Chưa xác nhận'";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm xóa chi tiết hóa đơn
	function DeleteProductOrder($id)
	{
		$sql = "DELETE FROM productorders WHERE Id=?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm xóa  hóa đơn
	function DeleteOrder($id)
	{
		$sql = "DELETE FROM orders WHERE Id=?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Tìm xem mã sản phẩm có trong chi tiết hóa đơn?
	function GetProductOrderByProductId($id)
	{
		$sql = "SELECT * FROM productorders WHERE ProductId=?";
		$data[] = $id;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Xây dựng hàm Thêm hóa đơn
	function AddOrder($name,$address,$phone,$description,$userid)
	{
		$sql = "INSERT INTO orders(Name,Address,Phone,Description,UserId) 
				VALUES(?,?,?,?,?)";
		$data[] = $name;
		$data[] = $address;
		$data[] = $phone;
		$data[] = $description;
        $data[] = $userid;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	function FixStatusOrder($id,$status)
	{
		$sql = "UPDATE orders SET Status=? WHERE Id=?";
		$data[] = $status;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm lấy id của hóa hóa đơn cuối vừa được thêm
	function getLastId()
	{
		return $this->db->conn->lastInsertId();
	}
	//Xây dựng hàm Thêm chi tiết hóa đơn
	function AddProductOrder($price,$quantity,$productid,$orderid)
	{
		$sql = "INSERT INTO productorders VALUES(?,?,?,?)";
		$data[] = $price;
		$data[] = $quantity;
		$data[] = $productid;
		$data[] = $orderid;
		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	public function GetSumOrder()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM orders";
 		$ketqua = $this->db->ThucthiSQL($sql);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}
	function GetOrderListByLocation($start, $limit)
	{
		$sql = "SELECT * FROM orders LIMIT $start, $limit";
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	public function GetSumOrderPaging($status)
	{
		$sql = "SELECT COUNT(*) AS Total FROM orders WHERE 1 ";
		if($status != "Tất cả hóa đơn")
		{
			$sql = $sql . " AND Status = '" . $status . "'";
		}
 		$ketqua = $this->db->ThucthiSQL($sql);
		if($ketqua==TRUE)
		{
			$this->data = $this->db->pdo_stm->fetch();
			return $this->data["Total"];
		}
		else
			return NULL;
	}

	function GetOrderListByStatusAndLocation($status, $start, $limit)
	{	
		$sql = "SELECT * FROM orders WHERE 1 ";
		if($status != "Tất cả hóa đơn")
		{
			$sql = $sql . " AND Status = '" . $status . "'";
		}
		
		$sql = $sql . " ORDER BY Id DESC LIMIT " . $start . ", " . $limit;
		
		$ketqua = $this->db->ThucthiSQL($sql,);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>





















