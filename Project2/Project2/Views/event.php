<div class="function">
    <a class="button" href="?module=event">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=event&act=add">THÊM SỰ KIỆN</a>
</div>
<div class="content">
    <h2 class="title__heading">Danh sách sự kiện</h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:5%">ID</th>
                        <th style="width:15%">Tên sự kiện</th>
                        <th style="width:10%">Ngày diễn ra</th>
                        <th style="width:10%">Hình ảnh</th>
                        <th style="width:45%">Mô tả</th>
                        <th style="width:15%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
                    $limit =  3;
                    //B2.Tính tổng số sản phẩm 

                    $event = new clsEvent();

                    $total_records = $event->GetSumEvent();
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
                    $event->GetEventListByLocation($start,$limit);
                    $rowsEvent = $event->data;
                    if($rowsEvent==NULL)
                        die("<h3> KHÔNG CÓ SẢN PHẨM NÀO </h3>");
                    foreach($rowsEvent as $row)
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
                            <p class="id"><?=$row["Date"]?></p>
                        </td>
                        <td >
                        <p class="id"><a href="images/<?=$row["Image"]?>"><img style="max-width: 80px; max-height: 60px;" src="images/<?=$row["Image"]?>"></a></p>
                        </td>
                        <td>
                        <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$row["Id"]?>" aria-expanded="false" aria-controls="collapse<?=$row["Id"]?>">
                                Hiển thị ...
                            </button>
                            </h2>
                            <div id="collapse<?=$row["Id"]?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="description"><?=$row["Description"]?></p>
                            </div>
                            </div>
                        </div>
                        </div>
                        </td>
                        <td>
                            <p class="button-cell">
                                <button class="edit-button">
                                    <a href="?module=event&act=fix&id=<?=$row["Id"]?>"><i class="fa fa-edit"></i></a>
                                </button>
                                <button class="delete-button">
                                    <a href="?module=event&act=delete&id=<?=$row["Id"]?>"><i class="fa fa-trash-alt"></i></a>
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
                            $CSS_OffButtonDau = "href='?module=event&page=1'";
                            $CSS_OffButtonTruoc = "href='?module=event&page=$page'";
                        }
                        
                        ?>
                        
                        <a <?=$CSS_OffButtonDau?>> Đầu </a>
                        |<a <?=$CSS_OffButtonTruoc?>> Trước </a> 
                        <?php
                        for($page=1; $page<=$total_pages; $page++)
                        {
                            $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
                        
                        ?>
                        |<a href="?module=event&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?> </a> 
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
                            $CSS_OffButtonCuoi = "href='?module=event&page=$total_pages'";
                            $CSS_OffButtonTiep = "href='?module=event&page=$page'";
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