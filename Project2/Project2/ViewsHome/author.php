<div class="app">
    <div class="app__container">
        <div class="banner-product-list">
            <div class="banner-product-list-content">
                <h1>Danh sách tác giả</h1>
                <a href="index.php">Trang chủ</a>
            </div>
        </div>
        <div class="grid">
            <div class="grid__row app__content">
                <div class="grid__column-3">
                    <nav class="category">
                        <h3 class="category__heading">DANH MỤC</h3>

                        <ul class="category-list">
                            <li class="category-item">
                                <a href="?module=aboutus" class="category-item__link">Giới thiệu cửa hàng</a>
                                <a href="?module=contactus" class="category-item__link">Hệ thống nhà sách</a>
                                <a href="?module=author" class="category-item__link">Danh sách tác giả</a>
                                <a href="?module=faqs" class="category-item__link">Những câu hỏi thường gặp</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <div class="grid__column-9">

                    <div class="home-product">
                        <div class="grid__row">

                        <?php
                        //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
                        $limit =  8;
                        //B2.Tính tổng số sản phẩm 

                        $event_page = new clsAuthor();

                        $total_records = $event_page->GetSumAuthor();
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
                        $event_page->GetAuthorListByLocation($start,$limit);
                        $rowsEvent = $event_page->data;
                        if($rowsEvent==NULL)
                            die("<h3> KHÔNG CÓ SẢN PHẨM NÀO </h3>");
                        foreach($rowsEvent as $row)
                        {
                        ?>
                        <div class="grid__column-2-4">
                            <!--Product item-->
                            <a href="?module=authordetail&id=<?=$row["Id"]?>" class="home-product-item">
                            <div class="home-product-item__img" style="background-image: url(images/<?=$row["Image"]?>);  height: 100px;"></div>
                                <h4 class="home-product-item__name"><?=$row["Name"]?></h4>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__origin-name"><?=$row["Description"]?></span>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="pager">
                            <?php
                            //tính vị trí trang trước
                            $page = (($current_page-1)>0)?($current_page-1):1;
                            if($_REQUEST["page"] == 1)
                            {
                                $CSS_OffButtonDau = " class='OffButton'";
                                $CSS_OffButtonTruoc = " class='OffButton'";
                            }
                            else
                            {
                                $CSS_OffButtonDau = "href='?module=event&page=1'";
                                $CSS_OffButtonTruoc = "href='?module=event&page=$page'";
                            }
                            
                            ?>
                            
                            <a <?=$CSS_OffButtonDau?>> Đầu </a>
                            <a <?=$CSS_OffButtonTruoc?>> <i class="pagination-item__icon fas fa-angle-left"></i> </a> 
                            <?php
                            for($page=1; $page<=$total_pages; $page++)
                            {
                                $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
                            
                            ?>
                            <a href="?module=event&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?></a> 
                            <?php
                            }
                            //tính vị trí trang tiếp
                            $page = (($current_page+1)<=$total_pages)?($current_page+1):$total_pages;
                            if($_REQUEST["page"] == $total_pages)
                            {
                                $CSS_OffButtonCuoi = " class='OffButton'";
                                $CSS_OffButtonTiep = " class='OffButton'";
                            }
                            else
                            {
                                $CSS_OffButtonCuoi = "href='?module=event&page=$total_pages'";
                                $CSS_OffButtonTiep = "href='?module=event&page=$page'";
                            }
                            ?>
                            <a <?=$CSS_OffButtonTiep?>> <i class="pagination-item__icon fas fa-angle-right"></i> </a>
                            <a <?=$CSS_OffButtonCuoi?>> Cuối </a>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

        