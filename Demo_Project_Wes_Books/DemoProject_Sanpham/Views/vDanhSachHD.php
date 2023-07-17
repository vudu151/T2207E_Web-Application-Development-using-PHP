    	<div id="content_left"> 
        	<div class="left1">
            	<h3>CHỨC NĂNG</h3>
                <p><a href="?module=<?=$module?>">Danh sách Hóa đơn</a></p>
                <p><a href="?module=<?=$module?>">Thống kê</a></p>
            </div>

        </div>
        <div id="content_right"> 
        	<h1> QUẢN LÝ HÓA ĐƠN</h1>
            <h2> DANH SÁCH HÓA ĐƠN</h2>
            <div id="right_detail">
				<?php
                if($ketqua)
                {
                ?>
                <table width="100%" border="1" class="Content_Table" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>Mã hd</td>
                    <td>Họ tên</td>
                    <td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td>Ngày đặt</td>
                    <td>Ngày nhận</td>
                    <td>Tổng tiền</td>
                    <td>Trạng thái</td>
                    <td>Act</td>
                  </tr>
                  <?php
                    $rows = $hoadon->data;
                    foreach($rows as $row)
                    {
                        $trangthai="";
                        if($row["trangthai"]==0)
                            $trangthai = "HĐ mới";
                        else if($row["trangthai"]==1)
                            $trangthai = "Đã duyệt";
                        else if($row["trangthai"]==2)
                            $trangthai = "Đã Thanh toán";
                        else if($row["trangthai"]==3)
                            $trangthai = "Tạm hủy";
                                
                    ?>
                  <tr>
                    <td><a href="?module=<?=$module?>&act=chitiet&id=<?=$row["mahd"]?>"> <?=$row["mahd"]?> </a></td>
                    <td><?=$row["tennguoimua"]?></td>
                    <td><?=$row["diachi"]?></td>
                    <td><?=$row["dienthoai"]?></td>
                    <td><?=$row["ngaydat"]?></td>
                    <td><?=$row["ngaynhan"]?></td>
                    <td><?=number_format($hoadon->TongTien($row["mahd"]))?></td>
                    <td><?=$trangthai?></td>
                    <td align="right">
                    <?php
                    if($row["trangthai"]!=2)
                        echo "<a href='?module=" . $module ."&act=xoa&id=" . $row["mahd"] . "'>Xóa</a> - "; 
                    else
                        echo "Xóa - "; 
                    ?>
                    <a href="?module=<?=$module?>&act=chitiet&id=<?=$row["mahd"]?>"> Chi tiết </a></td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
                <?php
                }
                ?>
			</div>
        </div>

