<?php
require_once("clsDatabase.php");
class clsProduct
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function __construct()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//Hàm LayDanhSachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
	function GetProductListByLocation($id=0, $keyword="", $start, $limit)
	{
		$sql = "SELECT P.*, C.Name as CName
					FROM products AS P INNER JOIN categories AS C
					ON P.CategoryId=C.Id WHERE 1 ";
		if($id != 0)
			$sql = $sql . " AND P.CategoryId = " . $id;
		//bổ sung tìm theo từ khóa
		if($keyword!="")
			$sql = $sql . " AND P.Name LIKE '%" . $keyword . "%'";
		
			$sql = $sql . " LIMIT " . $start . ", " . $limit;

		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetProductList($id=0, $keyword="", $sell="", $start, $limit)
	{
		$sql = "SELECT P.*, C.Name as CName
					FROM products AS P INNER JOIN categories AS C
					ON P.CategoryId=C.Id WHERE 1 ";
		if($id != 0)
			$sql = $sql . " AND P.CategoryId = " . $id;
		//bổ sung tìm theo từ khóa
		if($keyword!="")
			$sql = $sql . " AND P.Name LIKE '%" . $keyword . "%'";
		if($sell=="")
			$sell = " Id DESC";

		$sql = $sql . " ORDER BY $sell";

		$sql = $sql . " LIMIT " . $start . ", " . $limit;

		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetProductListOnkeyup($id=0, $keyword="")
	{
		$sql = "SELECT P.*, C.Name as CName
					FROM products AS P INNER JOIN categories AS C
					ON P.CategoryId=C.Id WHERE 1 ";
		if($id != 0)
			$sql = $sql . " AND P.CategoryId = " . $id;
		//bổ sung tìm theo từ khóa
		if($keyword!="")
			$sql = $sql . " AND P.Name LIKE '%" . $keyword . "%'";

		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetProductListByKeyword($keyword="")
	{
		$sql = "SELECT P.*, C.Name as CName
					FROM products AS P INNER JOIN categories AS C
					ON P.CategoryId=C.Id WHERE P.Name LIKE '%$keyword%' ";

		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	public function GetSumProductPaging($id=0, $keyword="")
	{
		$sql = "SELECT COUNT(*) AS Total FROM products WHERE 1 ";
		if($id != 0)
			$sql = $sql . " AND CategoryId = " . $id;
		//bổ sung tìm theo từ khóa
		if($keyword!="")
			$sql = $sql . " AND Name LIKE '%" . $keyword . "%'";

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
		
	//Hàm thêm dữ liệu
	function AddProduct($name,$quantity,$price,$mass,$numberpage,$image,$description,$categoryid,$authorid)
	{
		$sql = "INSERT INTO products VALUES (NULL, ?, ?, ?, ?, ?, ?, 0, ?, ?, ?)";
		$data[] = $name;
		$data[] = $quantity;
		$data[] = $price;
		$data[] = $mass;
		$data[] = $numberpage;
		$data[] = $image;
		$data[] = $description;
		$data[] = $categoryid;
		$data[] = $authorid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	function AddProductImage($image,$productid)
	{
		$sql = "INSERT INTO productimages VALUES (NULL, ?, ?)";
		$data[] = $image;
		$data[] = $productid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function FixProductQuantitySold($id,$quantitysold)
	{
		$sql = "UPDATE products SET QuantitySold=? WHERE Id =?";
		$data[] = $quantitysold;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}

	function FixProductQuantity($id,$quantity)
	{
		$sql = "UPDATE products SET Quantity=? WHERE Id =?";
		$data[] = $quantity;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function FixProduct($id,$name,$quantity,$price,$mass,$numberpage,$image,$description,$categoryid,$authorid)
	{
		$sql = "UPDATE products SET Name = ?, Quantity = ?, Price = ?, Mass = ?, NumberPage = ?, Image = ?, 
				Description = ?, CategoryId = ?, AuthorId = ? WHERE Id=?";
		$data[] = $name;
		$data[] = $quantity;
		$data[] = $price;
		$data[] = $mass;
		$data[] = $numberpage;
		$data[] = $image;
		$data[] = $description;
		$data[] = $categoryid;
		$data[] = $authorid;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function DeleteProduct($id)
	{
		$sql = "DELETE FROM products WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	function DeleteProductImage($id)
	{
		$sql = "DELETE FROM productimages WHERE Id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	function DeleteProductImageByProductId($id)
	{
		$sql = "DELETE FROM productimages WHERE ProductId=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	function GetProductImageByProductId($id)
	{
		$sql = "SELECT * FROM productimages WHERE ProductId=?";
			
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm TimTheoIDSanpham($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
	function GetProductById($id)
	{
		$sql = "SELECT P.*, A.Name AS AName, C.Name AS CName FROM products P 
		INNER JOIN authors A ON P.AuthorId = A.Id
		INNER JOIN categories C ON P.CategoryId = C.Id
		WHERE P.Id=?";
			
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm TimTheoNhomSanpham($cat_id) truy vấn dữ liệu theo cat_id 
	function GetProductByCategoryId($categoryid)
	{
		$sql = "SELECT * FROM products WHERE CategoryId=?";
		$data[] = $categoryid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	function GetProductByAuthorId($authorid)
	{
		$sql = "SELECT * FROM products WHERE authorId=?";
		$data[] = $authorid;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Lấy số lượng $n danh sách sản phẩm mới nhất
	function GetTheLatestProducts($number)
	{
		$sql = "SELECT P.*, C.Name as CName FROM products P INNER JOIN categories C ON P.CategoryId=C.Id
		ORDER BY Id DESC LIMIT 0, $number";
		
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	function GetTheLatestProductsByQuantitySold($number)
	{
		$sql = "SELECT P.*, C.Name as CName FROM products P INNER JOIN categories C ON P.CategoryId=C.Id
		ORDER BY QuantitySold DESC LIMIT 0, $number";
		
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm TimTheo_DS_IDSanpham($list) truy vấn dữ liệu theo danh sách masp (1,2,3..)
	function GetProductsByListId($list)
	{
		$sql = "SELECT * FROM products WHERE Id in ($list)";
 		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}

	public function GetSumProduct()
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM products";
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

	public function GetSumQuantitySold()
	{
		$sql = "SELECT SUM(QuantitySold) AS Total 
				FROM products";
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

	public function GetSumProductByAuthorId($authorid)
	{
		$sql = "SELECT COUNT(*) AS Total 
				FROM products WHERE AuthorId = ?";
		$data = [$authorid];
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

}
?>