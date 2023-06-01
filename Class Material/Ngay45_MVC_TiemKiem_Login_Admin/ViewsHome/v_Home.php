        
        <div id="content_center">
			<div id="slider">
            	<img src="hinhanh/slides/promotion-01.png" id="anh_slide">
                <script> SlideShow();</script>
            </div>
        	<h1>SẢN PHẨM MỚI</h1>
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