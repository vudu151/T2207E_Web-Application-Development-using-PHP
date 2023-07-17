<?php
    require_once("Models/clsProduct.php");
    $product = new clsProduct();
    $totalP = $product->GetSumProductByAuthorId($masp);
?>

<div class="grid">
    <?php
    if($author->data==NULL)
    echo "<H2>KHÔNG TÌM THẤY SẢN PHẨM</H2>";
    else
    {
    $rowAuthor = $author->data;
    ?>
    <div class="container-fluid author">
        <div class="row">
            <div class="col-1 col-sm-2 col-md-3">
                
            </div>
            <div class="col-10 col-sm-8 col-md-6 author-card">
                <img src="images/<?=$rowAuthor["Image"]?>" alt="<?=$rowAuthor["Name"]?>">
                <div class="author-card-body">
                    <h2 class="fw-bolder author-name"><?=$rowAuthor["Name"]?></h2>
                    <hr>
                    <h3><?=$totalP?> tác phẩm</h3>
                    <p><?=$rowAuthor["Description"]?></p>
                </div>
            </div>
            <div class="col-1 col-sm-2 col-md-3">
                
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<div class="container tac_pham">
    <div class="row ds_tac_pham">
        <?php
            $ketqua = $product->GetProductByAuthorId($masp);
            $rows = $product->data;
            foreach($rows as $row)
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
                
                <div  class="col-6 col-sm-6 col-md-4 col-lg-3 mo_ta_tac_pham">
                    <div class="inner_div">
                        <a href="?module=productdetail&id=<?=$row["Id"]?>">
                            <div>
                                <img src="images/<?=$row["Image"]?>" alt="book1">
                                <div class="book-card-body">
                                    <h5 class="fw-bolder book-name"><?=$row["Name"]?></h5>
                                    <div class="price fw-bolder">
                                        <?=number_format($row["Price"])?> đ
                                    </div>
                                    <div class="ratingsInAuthor">
                                        <?=$rate?><i class="fa fa-star rating-color"></i>
                                    </div>
                                    <h6 class="review-count">(<?=$num?> đánh giá)</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
            }
        ?>
    </div>
</div>