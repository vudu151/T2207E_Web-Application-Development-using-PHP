<?php
require_once("clsDatabase.php");
class clsSanpham
{
	public $db;
	public $data;//mảng chứa dữ liệu trả về bởi hàm truy vấn dữ liệu
	function clsSanpham()
	{
		$this->db = new clsDatabase();//tạo đối tượng clsDatabase và kết nối CSDSL
		$this->data = array();
	}
	//các hàm truy vấn, thêm, sửa, xóa
	//Hàm LayDanhSachSanpham() truy vấn dữ liệu lưu vào thuộc tính data của lớp
	function LayDanhSachSanpham($trangthai=2, $cat_id=0, $tukhoa="")
	{
		$sql = "SELECT Sp.*, Cat.cat_name, Cat.cat_status 
					FROM books AS Sp INNER JOIN tbCategory AS Cat 
					ON Sp.cat_id=Cat.cat_id WHERE 1 ";
		if($cat_id != 0)
			$sql = $sql . " AND Sp.cat_id = " . $cat_id;
		//nếu khác 2 thì thêm mệnh đề WHERE để lọc, 
		//còn nếu =2 thì không có có WHERE => sẽ hiển thị mọi sản phẩm
		if($trangthai!=2) 
		{
			$sql = $sql . " AND status = " . $trangthai;
			$sql = $sql . " AND cat_status = " . $trangthai;
		}
		//bổ sung tìm theo từ khóa
		if($tukhoa!="")
			$sql = $sql . " AND Sp.title LIKE '%" . $tukhoa . "%'";
			
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
		
	//Hàm thêm dữ liệu
	function ThemSanpham($name,$author,$price, $images, $summary,$content,$status,$cat_id)
	{
		$sql = "INSERT INTO books VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
		$data[] = $name;
		$data[] = $author;
		$data[] = $price;
		$data[] = $images;
		$data[] = $summary;
		$data[] = $content;
		$data[] = $status;
		$data[] = $cat_id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm sửa dữ liệu
	function SuaSanpham($id,$name,$author,$price, $images, $summary,$content,$status,$cat_id)
	{
		$sql = "UPDATE books SET title=?, author = ?, price = ?, 
				images=?,summary=?,content=?, status=?, cat_id=? WHERE id=?";
		$data[] = $name;
		$data[] = $author;
		$data[] = $price;
		$data[] = $images;
		$data[] = $summary;
		$data[] = $content;
		$data[] = $status;
		$data[] = $cat_id;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm xóa dữ liệu
	function XoaSanpham($id)
	{
		$sql = "DELETE FROM books WHERE id=?";
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Hàm TimTheoIDSanpham($id) truy vấn dữ liệu theo id lưu vào thuộc tính data
	function TimTheoIDSanpham($id, $trangthai=2)
	{
		$sql = "SELECT * FROM books WHERE id=?";
		if($trangthai!=2) 
			$sql = $sql . " AND status = " . $trangthai;
			
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm TimTheoNhomSanpham($cat_id) truy vấn dữ liệu theo cat_id 
	function TimTheoNhomSanpham($cat_id)
	{
		$sql = "SELECT Sp.*, Cat.cat_status FROM books AS Sp INNER JOIN tbCategory AS Cat 
				ON Sp.cat_id=Cat.cat_id	WHERE sp.cat_id=?";
		$data[] = $cat_id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetch();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm sửa dữ liệu cột status
	function SuaTrangThaiSanpham($id, $status)
	{
		$sql = "UPDATE books SET status = ? WHERE id=?";
		$data[] = $status;
		$data[] = $id;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		return $ketqua;
	}
	//Lấy số lượng $n danh sách sản phẩm mới nhất
	function LaySanphamMoiNhat($n)
	{
		$sql = "SELECT Sp.*, Cat.cat_status FROM books AS Sp INNER JOIN tbCategory AS Cat 
				ON Sp.cat_id=Cat.cat_id
				WHERE status = 1 AND cat_status=1 ORDER BY id DESC LIMIT 0,$n";
		
		$ketqua = $this->db->ThucthiSQL($sql);
		//LẤY CÁC BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
	//Hàm TimTheo_DS_IDSanpham($list) truy vấn dữ liệu theo danh sách masp (1,2,3..)
	function TimTheo_DS_IDSanpham($list, $trangthai=2)
	{
		$sql = "SELECT * FROM books WHERE id in ($list)";
		if($trangthai!=2) 
			$sql = $sql . " AND status = " . $trangthai;
			
		$data[] = NULL;
 		$ketqua = $this->db->ThucthiSQL($sql,$data);
		//LẤY BẢN GHI KẾT QUẢ LƯU VÀO $data
		$this->data=NULL;
		if($ketqua==TRUE)
			$this->data = $this->db->pdo_stm->fetchAll();
		return $ketqua;//trả về $ketqua: TRUE/FALSE
	}
}
?>