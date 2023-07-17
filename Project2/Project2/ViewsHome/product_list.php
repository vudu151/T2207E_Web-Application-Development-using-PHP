<div class="app">
    <div class="app__container">
        <div class="banner-product-list">
            <div class="banner-product-list-content">
                <h1>Danh sách sản phẩm</h1>
                <a href="index.php">Trang chủ</a>
            </div>
        </div>
        <div class="grid">
            <div class="grid__row app__content">
                <div class="grid__column-3">
                    <nav class="category">
                        <h3 class="category__heading">DANH MỤC SẢN PHẨM</h3>

                        <ul class="category-list">
                            <?php
                                $cat = new clsCategory();

                                $ketqua = $cat->GetCategoryList(1);
                                $rows = $cat->data;
                                foreach($rows as $row)
                                {
                                    ?>
                                        <li class="category-item">
                                            <a href="?module=product&categoryid=<?=$row["Id"]?>" class="category-item__link"><img src="https://theme.hstatic.net/200000343865/1001052087/14/hd_mainlink_icon2.png?v=117"><?=$row["Name"]?></a>
                                        </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
                
                <div class="grid__column-9">
                    <div class="home-filter">

                        <?php
                            $link = "";
                            if(isset($_REQUEST["keyword"]))
                                $link .= "&keyword=$keyword";
                            else if(isset($_REQUEST["categoryid"]))
                                $link .= "&categoryid=$categoryid";
                        ?>
                                
                        <span class="home-filter__label">Sắp xếp theo: </span>
                        <a href="?module=product<?=$link?>" class="home-filter__btn btn">Mới nhất</a>
                        <a href="?module=product<?=$link?>&sell=QuantitySold DESC" class="home-filter__btn btn">Bán chạy</a>

                        <div class="select-input">
                            <span class="select-input__label">Giá</span>
                            <i class="select-input__icon fas fa-angle-down"></i>
                            <!-- List option -->
                            <ul class="select-input__list">
                                <li class="select-input__item">
                                    <a href="?module=product<?=$link?>&sell=Price ASC" class="select-input__link">Giá Thấp đến Cao</a>
                                </li>
                                <li class="select-input__item">
                                    <a href="?module=product<?=$link?>&sell=Price DESC" class="select-input__link">Giá Cao đến Thấp</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="home-product">
                        <div class="grid__row">

                        <?php
                        //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
                        $limit =  8;
                        //B2.Tính tổng số sản phẩm 

                        $product_page = new clsProduct();

                        $total_records = $product_page->GetSumProductPaging($categoryid,$keyword);
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
                        $product_page->GetProductList($categoryid,$keyword,$sell,$start,$limit);
                        $rowsProduct = $product_page->data;
                        if($rowsProduct==NULL)
                            die("<h3> KHÔNG CÓ SẢN PHẨM NÀO </h3>");
                        foreach($rowsProduct as $row)
                        {
                            require_once("Models/clsComment.php");
                            $rating = new clsComment();
                            $num = $rating->GetSumCommentByProductId($row["Id"]);

                            $ketqua = $rating->GetProductCommentListByProductId($row["Id"]);
                            $rows = $rating->data;
                            
                            $sum=0;

                            foreach($rows as $r){
                                $sum += $r["RatingLevel"];
                            }
                            
                            $rate = 0;
                            if($num!=0){
                                $rate = $sum/$num;
                            }
                        ?>
                        <div class="grid__column-2-4">
                            <!--Product item-->
                            <a href="?module=productdetail&id=<?=$row["Id"]?>" class="home-product-item">
                            <div class="home-product-item__img" style="background-image: url(images/<?=$row["Image"]?>)"></div>
                                <h4 class="home-product-item__name"><?=$row["Name"]?></h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-current">Giá: <?=number_format($row["Price"])?>đ</span>
                                </div>
                                <div class="home-product-item__action">
                                    <div class="home-product-item__rating">
                                            <span style="font-size: 14px; padding-right: 5px;"><?=$rate?></span><i class="home-product-item__star__gold fas fa-star"></i>
                                        </div>
                                        <span style="color: black; font-size: 12px;" ><?=$num?> lượt đánh giá</span>
                                    <span class="home-product-item__sold"><?=$row["QuantitySold"]?> đã bán</span>
                                </div>
                                <div class="home-product-item__origin">
                                    <span style="padding-left: 5px;" class="home-product-item__brand">Còn: <?=$row["Quantity"]?></span>
                                    <span class="home-product-item__origin-name"><?=$row["CName"]?></span>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="pager">
                            <?php
                            if(isset($_REQUEST["sell"]))
                                $link .= "&sell=$sell";
                            //tính vị trí trang trước
                            $page = (($current_page-1)>0)?($current_page-1):1;
                            if($_REQUEST["page"] == 1)
                            {
                                $CSS_OffButtonDau = " class='OffButton'";
                                $CSS_OffButtonTruoc = " class='OffButton'";
                            }
                            else
                            {
                                $CSS_OffButtonDau = "href='?module=product$link&page=1'";
                                $CSS_OffButtonTruoc = "href='?module=product$link&page=$page'";
                            }
                            
                            ?>
                            
                            <a <?=$CSS_OffButtonDau?>> Đầu </a>
                            <a <?=$CSS_OffButtonTruoc?>> <i class="pagination-item__icon fas fa-angle-left"></i> </a> 
                            <?php
                            for($page=1; $page<=$total_pages; $page++)
                            {
                                $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
                            
                            ?>
                            <a href="?module=product<?=$link?>&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?></a> 
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
                                $CSS_OffButtonCuoi = "href='?module=product$link&page=$total_pages'";
                                $CSS_OffButtonTiep = "href='?module=product$link&page=$page'";
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

        