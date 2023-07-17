<div class="home">
    <div class="slide-show">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/banner0.png" class="d-block w-100" alt="...">
                </div>
                <?php
                    require_once("Models/clsBanner.php");
                    $banner = new clsBanner();

                    $ketqua = $banner->GetBannerList(1);
                    $rowsB = $banner->data;

                    foreach($rowsB as $row)
                    {
                        ?>
                        <div class="carousel-item">
                            <img src="images/<?=$row["Link"]?>" class="d-block w-100" alt="...">
                        </div>
                        <?php
                    }
                ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="new-items">
        <div class="ni-content">
            <div class="title__heading">SẢN PHẨM MỚI</div>
            <div class="show-ni">
                <div class="owl-carousel owl-theme">
                    <?php
                        foreach($rowsNew as $row)
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
                            <div style="width: 100%;" class="grid__column-2-4">
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
                                        <span style="margin-left: 0;" class="home-product-item__sold"><?=$row["QuantitySold"]?> đã bán</span>
                                    </div>
                                    <div class="home-product-item__origin">
                                        <div class="home-product-item__brand">Còn: <?=$row["Quantity"]?></div>
                                        <div class="home-product-item__origin-name"><?=$row["CName"]?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="best-selling-items">
        <div class="bsi-content">
            <div class="title__heading">SẢN PHẨM BÁN CHẠY</div>
            <div class="show-bsi">
                <div class="owl-carousel owl-theme">
                    <?php
                        $ketqua = $sanpham->GetTheLatestProductsByQuantitySold(10);
                        $rowsQS = $sanpham->data;

                        foreach($rowsQS as $row)
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
                            <div style="width: 100%;" class="grid__column-2-4">
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
                                        <span style="margin-left: 0;" class="home-product-item__sold"><?=$row["QuantitySold"]?> đã bán</span>
                                    </div>
                                    <div class="home-product-item__origin">
                                        <div class="home-product-item__brand">Còn: <?=$row["Quantity"]?></div>
                                        <div class="home-product-item__origin-name"><?=$row["CName"]?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</div>