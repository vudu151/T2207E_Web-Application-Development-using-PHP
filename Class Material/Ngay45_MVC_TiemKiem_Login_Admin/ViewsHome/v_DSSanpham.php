        <div id="content_center">
        	<h1>
            <?php
			if($act=="timkiem")
				echo "KẾT QUẢ TÌM KIẾM";
			else
				echo "DANH SÁCH SẢN PHẨM";
			?>
            </h1>
            <?php
			if($sanpham->data==NULL)
				echo "<H2>KHÔNG TÌM THẤY SẢN PHẨM</H2>";
			else
				if($act=="timkiem")
					echo "<H2>CÓ ". $soketqua . " SẢN PHẨM</H2>";
				else if($tennhom!="")
					echo "<H2> Loại sách: " . $tennhom . "</H2>";
					
			?>
            <div id="content_sp">
              <?php
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
              <div class="sanpham">
                <p><a href="?module=chitietsanpham&manhom=<?=$row["cat_id"]?>&masp=<?=$row["id"]?>"><?=$row["title"]?></a></p><!-- thẻ <a href>...</a> để tạo liên kết tới sp1.htm-->
                <p><a href="?module=chitietsanpham&manhom=<?=$row["cat_id"]?>&masp=<?=$row["id"]?>"><img src="Hinhanh/Sanpham/<?=$hinhanh?>"></a></p> <!--thẻ p này dùng để cố định chiều cao dòng 2, và để ảnh căn giữa-->
                <p>Giá: <?=number_format($row["price"])?> VNĐ</p>
                <p><i class="fa fa-shopping-cart"></i><a href="?module=cart&act=add&masp=<?=$row["id"]?>"> Mua hàng</a></p>
              </div>
				<?php
				}
				?>
            </div>
       </div>