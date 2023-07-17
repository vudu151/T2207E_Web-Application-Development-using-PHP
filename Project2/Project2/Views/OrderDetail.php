<div class="function">
    <a class="button" href="?module=order">HIỂN THỊ DANH SÁCH</a>
</div>
<div class="order-detail">
    <h2 style="text-align: left; padding-left: 150px;" class="title__heading">Chi tiết hóa đơn</h2>
    <?php
    ?>
    <div class="order-detail-content">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handlefix&id=<?=$rowHD["Id"]?>">
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="250" height="30"><p>Mã hóa đơn: </p></td>
                <td width="380"><p><?=$id?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Tên người mua: </p></td>
                <td width="380"><p><?=$rowHD["Name"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Địa chỉ: </p></td>
                <td width="380"><p><?=$rowHD["Address"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Điện thoại: </p></td>
                <td width="380"><p><?=$rowHD["Phone"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Ngày đặt: </p></td>
                <td width="380"><p><?=$rowHD["TimeOrder"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Mô tả: </p></td>
                <td width="380"><p><?=$rowHD["Description"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Mã tài khoản đặt hàng: </p></td>
                <td width="380"><p><?=$rowHD["UserId"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Tổng tiền: </p></td>
                <td width="380"><p><?=number_format($totalmoney)?>đ</p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Trạng thái: </p></td>
                <td>
                <select name="selectStatus" id="selectStatus">
                    <?php
                        $nps = ["Chưa xác nhận", "Đã xác nhận", "Đang giao hàng", "Giao hàng thành công"];
                        foreach($nps as $n)
                        {
                            $selected = "";
                            if($rowHD["Status"]== $n)
                                $selected = "selected";
                            echo "<option value='" . $n. "' " . $selected . ">" . $n ."</option>\n";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
            </tr>
            </table>
        </form>
    </div>
    <?php
    ?>
</div>
<div class="content">
    <h2 class="title__heading">Danh sách sản phẩm</h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:10%">ID</th>
                        <th style="width:30%">Tên</th>
                        <th style="width:20%">Giá</th>
                        <th style="width:10%">Số lượng</th>
                        <th style="width:30%">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rows = $hoadon->data;
                    foreach($rows as $row)
                    {
                    ?>
                    <tr class="py-3">
                        <td>
                            <p class="id"><?=$row["ProductId"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["Name"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=number_format($row["Price"])?>đ</p>
                        </td>
                        <td >
                            <p class="id"><?=$row["Quantity"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=number_format($row["Price"]*$row["Quantity"])?>đ</p>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>