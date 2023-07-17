<div class="function">
    <a class="button" href="?module=category">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=category&act=add">THÊM LOẠI SẢN PHẨM</a>
</div>
<div class="content">
    <h2 class="title__heading">Danh sách loại sản phẩm</h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:10%">ID</th>
                        <th style="width:30%">Tên loại sản phẩm</th>
                        <th style="width:55%">Mô tả</th>
                        <th style="width:15%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
                    $limit =  3;
                    //B2.Tính tổng số sản phẩm 

                    $category = new clsCategory();

                    $total_records = $category->GetSumCategory();
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
                    $category->GetCategoryListByLocation($start,$limit);
                    $rowsCategory = $category->data;
                    if($rowsCategory==NULL)
                        die("<h3> KHÔNG CÓ SẢN PHẨM NÀO </h3>");
                    foreach($rowsCategory as $row)
                    {
                    ?>
                    <tr class="py-3">
                        <td>
                            <p class="id"><?=$row["Id"]?></p>
                        </td>
                        <td >
                            <p class="name-product"><?=$row["Name"]?></p>
                        </td>
                        <td>
                            <p class="description"><?=$row["Description"]?></p>
                        </td>
                        <td>
                            <p class="button-cell">
                                <button class="edit-button">
                                    <a href="?module=category&act=fix&id=<?=$row["Id"]?>"><i class="fa fa-edit"></i></a>
                                </button>
                                <button class="delete-button">
                                    <a href="?module=category&act=delete&id=<?=$row["Id"]?>"><i class="fa fa-trash-alt"></i></a>
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
                            $CSS_OffButtonDau = "href='?module=category&page=1'";
                            $CSS_OffButtonTruoc = "href='?module=category&page=$page'";
                        }
                        
                        ?>
                        
                        <a <?=$CSS_OffButtonDau?>> Đầu </a>
                        |<a <?=$CSS_OffButtonTruoc?>> Trước </a> 
                        <?php
                        for($page=1; $page<=$total_pages; $page++)
                        {
                            $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
                        
                        ?>
                        |<a href="?module=category&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?> </a> 
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
                            $CSS_OffButtonCuoi = "href='?module=category&page=$total_pages'";
                            $CSS_OffButtonTiep = "href='?module=category&page=$page'";
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