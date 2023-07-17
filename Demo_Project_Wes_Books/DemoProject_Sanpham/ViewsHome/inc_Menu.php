	
    <div id="menu">  
    	<ul>
        	<li><a href="index.php">Trang chủ</a></li>
            <li><a href="?module=tintuc">Tin tức</a>
            	<ul>
                	<li><a href="?module=tintuc&manhom=1">Thể thao</a></li>
                    <li><a href="?module=tintuc&manhom=2">Kinh tế</a></li>
                    <li><a href="?module=tintuc&manhom=3">Giáo dục</a></li>
                    <li><a href="?module=tintuc&manhom=4">Xã hội</a></li>
                </ul>
            </li>
            <li><a href="?module=sanpham">Sản phẩm</a>
            	<?PHP
				require_once("Models/clsCategory.php");
				$mnuNhomSP = new clsCategory();
				$ketqua = $mnuNhomSP->LayDanhSachNhomSanpham(1,1);//lấy ds nhomsp có trạng thái =1 và sắp xếp theo cat_ord tăng dần
				?>
            	<ul>
                	<?php
					$rows = $mnuNhomSP->data;
					foreach($rows as $row)
					{
					?>
                	<li><a href="?module=sanpham&manhom=<?=$row["cat_id"]?>"><?=$row["cat_name"]?></a></li>
                    <?php
					}
					?>
                </ul>
            </li>
            <li><a href="?module=lienhe">Liên hệ</a></li>
            <li><a href="?module=cart">Giỏ hàng</a></li>
        </ul>  
    </div>