
<div class="function">
    <a class="button" href="?module=order">HIỂN THỊ DANH SÁCH</a>
</div>
<div class="content">

    <div class="ProductSearch">
        <?php
        $status = isset($_REQUEST["status"])?$_REQUEST["status"]:"Tất cả hóa đơn";
        ?>
        <form name="fTimkiem" id="fTiemkiem" action="">
        <input type="hidden" name="module" value="order">
        <input type="hidden" name="act" value="search">
        <span class="title-search">Trạng thái hóa đơn :</span>
        <select name="status" id="status">
            <option value="Tất cả hóa đơn">Tất tả hóa đơn</option>
            <?php
                $nps = ["Chưa xác nhận", "Đã xác nhận", "Đang giao hàng", "Giao hàng thành công"];
                foreach($nps as $n)
                {
                    $selected = "";
                    if($status == $n)
                        $selected = "selected";
                    echo "<option value='" . $n. "' " . $selected . ">" . $n ."</option>\n";
                }
            ?>
        </select>
        <input type="submit" name="bSearch" id="bSearch" value="Search">
        </form>
    </div>

    <h2 class="title__heading">Danh sách hóa đơn</h2>
    <div class="grid">
        <div class="container">

            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:5%">ID</th>
                        <th style="width:10%">Tên người nhận</th>
                        <th style="width:15%">Địa chỉ</th>
                        <th style="width:10%">Điện thoại</th>
                        <th style="width:10%">Thời gian đặt hàng</th>
                        <th style="width:10%">Trạng thái</th>
                        <th style="width:20%">Mô tả</th>
                        <th style="width:5%">Tài khoản</th>
                        <th style="width:15%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
                    $limit =  3;
                    //B2.Tính tổng số sản phẩm 

                    $order = new clsOrder();

                    $total_records = $order->GetSumOrderPaging($status);
                    if($total_records==NULL)
                        die("<h3> LỖI ĐẾM </h3>");
                    //B3.Tính tổng số trang sẽ có = ceil(Tổng số sản phẩm / Số sản phẩm trên 1 trang)
                    //$total_pages để dùng cho vòng lặp hiển thị các trang: 1 | 2 | ...|$total_pages
                    $total_pages = ceil((int)$total_records/$limit);
                    //B4. Xác định vị trí trang muốn hiển thị (từ link phân trang)
                    //Ví dụ: index.php?trang=1, index.php?trang=2
                    $current_page = 1; //gán mặc định trang cần hiển thị = 1
                    if(isset($_REQUEST["page"]) && is_numeric($_REQUEST["page"]))
                    {
                        $current_page = $_REQUEST["page"];
                    }
                    else
                    {
                        $_REQUEST["page"] = 1;
                    }
                    if($current_page<=0) //nếu trang cần hiển thị <=0 thì gán về trang 1
                        $current_page=1;
                    if($current_page>$total_pages)//nếu vượt quá tổng số trang thì gán bằng trang cuối
                        $current_page = $total_pages;
                    //B5. Tính vị trí đầu tiên của bản ghi cần truy vấn ứng số vị trí trang cần hiển thị
                    $start = ($current_page-1) * $limit;
                    $order->GetOrderListByStatusAndLocation($status,$start,$limit);
                    $rowsOrder = $order->data;
                    if($rowsOrder==NULL)
                        die("<h3> KHÔNG CÓ SẢN PHẨM NÀO </h3>");
                    foreach($rowsOrder as $row)
                    {
                    ?>
                    <tr class="py-3">
                        <td>
                            <p class="id"><?=$row["Id"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["Name"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["Address"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["Phone"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["TimeOrder"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$row["Status"]?></p>
                        </td>
                        <td>
                            <p class="description"><?=$row["Description"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["UserId"]?></p>
                        </td>
                        <td>
                            <p class="button-cell">
                                <button class="edit-button">
                                    <a href="?module=order&act=detail&id=<?=$row["Id"]?>"><i class="fa fa-edit"></i></a>
                                </button>
                                <button class="delete-button">
                                    <a href="?module=order&act=delete&id=<?=$row["Id"]?>"><i class="fa fa-trash-alt"></i></a>
                                </button>
                            </p>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <div class="pager">
                        <B>Trang: </B>
                        <?php
                        //tính vị trí trang trước
                        $page = (($current_page-1)>0)?($current_page-1):1;
                        if($_REQUEST["page"] == 1)
                        {
                            $CSS_OffButtonDau = "href='#' class='OffButton'";
                            $CSS_OffButtonTruoc = "href='#' class='OffButton'";
                        }
                        else
                        {
                            $CSS_OffButtonDau = "href='?module=order&act=search&status=$status&bSearch=Search&page=1'";
                            $CSS_OffButtonTruoc = "href='?module=order&act=search&status=$status&bSearch=Search&page=$page'";
                        }
                        
                        ?>
                        
                        <a <?=$CSS_OffButtonDau?>> Đầu </a>
                        |<a <?=$CSS_OffButtonTruoc?>> Trước </a> 
                        <?php
                        for($page=1; $page<=$total_pages; $page++)
                        {
                            $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
                        
                        ?>
                        |<a href="?module=order&act=search&status=<?=$status?>&bSearch=Search&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?> </a> 
                        <?php
                        }
                        //tính vị trí trang tiếp
                        $page = (($current_page+1)<=$total_pages)?($current_page+1):$total_pages;
                        if($_REQUEST["page"] == $total_pages)
                        {
                            $CSS_OffButtonCuoi = "href='#' class='OffButton'";
                            $CSS_OffButtonTiep = "href='#' class='OffButton'";
                        }
                        else
                        {
                            $CSS_OffButtonCuoi = "href='?module=order&act=search&status=$status&bSearch=Search&page=$total_pages'";
                            $CSS_OffButtonTiep = "href='?module=order&act=search&status=$status&bSearch=Search&page=$page'";
                        }
                        ?>
                        |<a <?=$CSS_OffButtonTiep?>> Tiếp </a>
                        |<a <?=$CSS_OffButtonCuoi?>> Cuối </a>
                    </div>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>