		
        <div id="content_right"> 
        	<div class="right1">
            	<h3>SẢN PHẨM MỚI</h3>
                <?php
				require_once("Models/clsSanpham.php");
				$sanpham = new clsSanpham();
				$ketqua = $sanpham->LaySanphamMoiNhat(3);//lấy 3 sản phẩm mới nhất
				$rows = $sanpham->data;
				foreach($rows as $row)
				{
					$hinhanh = $row["images"];
					if($hinhanh=="")
						$hinhanh = "no-Image.png";
					$trangthai="";
					if($row["status"]==1)
						$trangthai = "có";
					else
						$trangthai = "không";
				?>
                <p> 
                	<a href="?module=chitietsanpham&manhom=<?=$row["cat_id"]?>&masp=<?=$row["id"]?>">
                	<img src="Hinhanh/Sanpham/<?=$hinhanh?>"><br>
                    </a>
                	<a href="?module=chitietsanpham&manhom=<?=$row["cat_id"]?>&masp=<?=$row["id"]?>"><?=$row["title"]?></a>
                </p>
                <?
				}
				?>
            
            </div>
            <div class="right1">
            	<h3>SP BÁN CHẠY</h3>
                <p><a href="#">Sản phẩm 4</a></p>
                <p><a href="#">Sản phẩm 5</a></p>
                <p><a href="#">Sản phẩm 6</a></p>
            </div>  
        </div>