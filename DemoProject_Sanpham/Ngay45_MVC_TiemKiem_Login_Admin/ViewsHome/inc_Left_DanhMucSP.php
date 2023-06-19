			
            <div class="left1">
            	<h3>DANH MỤC NHÓM SP</h3>
                <?PHP
				require_once("Models/clsCategory.php");
				$manhom=0;
				if(isset($_REQUEST["manhom"]))
				$manhom = $_REQUEST["manhom"];
				
				$leftNhomSP = new clsCategory();
				$ketqua = $leftNhomSP->LayDanhSachNhomSanpham(1,1);//lấy ds nhomsp có trạng thái =1 và sắp xếp theo cat_ord tăng dần
				$rows = $leftNhomSP->data;
				foreach($rows as $row)
				{
					if($row["cat_id"]==$manhom){
				?>
					<p><a class="active" href="?module=sanpham&manhom=<?=$row["cat_id"]?>"><?=$row["cat_name"]?></a></p>
					<?php
					}else{
					?>
                    <p><a href="?module=sanpham&manhom=<?=$row["cat_id"]?>"><?=$row["cat_name"]?></a></p>
				<?php
					}
				}
				?>
            
            </div>