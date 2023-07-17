			
            <div class="left1">
            	<h3>TÌM KIẾM</h3>
                <?php
				$tukhoa = isset($_REQUEST["tTukhoa"])? $_REQUEST["tTukhoa"]:"";
				$manhom = isset($_REQUEST["manhom"])?$_REQUEST["manhom"]:0;
				?>
                <form name="fTimkiem" id="fTiemkiem" action="index.php">
                <input type="hidden" name="module" value="sanpham">
                <input type="hidden" name="act" value="timkiem">
                <p>
                Từ khóa:<input type="text" name="tTukhoa" id="tTukhoa" value="<?=$tukhoa?>">
                </p>
                <p>
                Nhóm sản phẩm:
                <select name="manhom" id="manhom">
                	<option value="0">Tất tả nhóm SP</option>
					<?php
                        require_once("Models/clsCategory.php");
                        require_once("DungChung/Tienich.php");
                        $nps = new clsCategory();
                        //lấy nhóm SP trạng thái 1, sắp xếp theo thứu tự tăng dần
						$nps->LayDanhSachNhomSanpham(1,1);
                        ShowOptions($nps->data,"cat_id","cat_name",$manhom);
                    ?>
                </select>
                </p>
                <p>
                <input type="submit" name="bSearch" id="bSearch" value="Tìm kiếm">
                </p>
                </form>
            </div>