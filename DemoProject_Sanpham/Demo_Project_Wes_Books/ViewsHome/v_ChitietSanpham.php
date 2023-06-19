        <div id="content_center_2">
        	<h1>CHI TIẾT SẢN PHẨM</h1>
            <?php
			if($sanpham->data==NULL)
				echo "<H2>KHÔNG TÌM THẤY SẢN PHẨM</H2>";
			else
			{
				$row = $sanpham->data;
				$hinhanh = $row["images"];
				  if($hinhanh=="")
				  	$hinhanh= "no-Image.png";
			?>
            <div id="content_sp">
              <div class="sanpham">
                <p><a href="#"><?=$row["title"];?></a></p><!-- thẻ <a href>...</a> để tạo liên kết tới sp1.htm-->
                <p><a href="#"><img src="Hinhanh/Sanpham/<?=$hinhanh?>"></a></p> <!--thẻ p này dùng để cố định chiều cao dòng 2, và để ảnh căn giữa-->
               </div>
              <div class="tomtatsanpham">
              	  <h3>Giá: <?=number_format($row["price"])?> VNĐ</h3>
                  <h3><i class="fa fa-shopping-cart"></i><a href="?module=cart&act=add&masp=<?=$row["id"]?>"> Mua hàng</a></h3>
                  <h2> TÓM TẮT SẢN PHẨM</h2>
                  <div class="noidung_tomtat">
                      <?=$row["summary"]?>
                  </div>
              </div> 
              <div class="chitietsanpham">
              	<h2>CHI TIẾT SẢN PHẨM</h2>
                  <?=$row["content"]?>
              </div> 
            </div>
            <?php
			}
			?>
        </div>
