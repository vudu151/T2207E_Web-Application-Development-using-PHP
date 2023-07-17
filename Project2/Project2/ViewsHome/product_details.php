<div class="grid">
    <?php
    if($sanpham->data==NULL)
    echo "<H2>KHÔNG TÌM THẤY SẢN PHẨM</H2>";
    else
    {
    $rowProduct = $sanpham->data;
    ?>
    <div class="flex-box">
        <div class="left">
            <div class="big-img">
                <img src="images/<?=$rowProduct["Image"]?>">
            </div>
            <div class="images">
                <div class="small-img">
                    <img src="images/<?=$rowProduct["Image"]?>" onclick="showImg(this.src)">
                </div>
                <?php
                $ketqua = $sanpham->GetProductImageByProductId($masp);
                $rowsImg = $sanpham->data;
                foreach($rowsImg as $row){
                ?>
                <div class="small-img">
                    <img src="images/<?=$row["Link"]?>" onclick="showImg(this.src)">
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="right">
            <div class="pname"><?=$rowProduct["Name"]?></div>
            <div class="ratings">
                <p class="sold"><span class="sold-num"><?=$rowProduct["QuantitySold"]?></span> Đã Bán</p>
            </div>

            <div class="price_items">
                <div class="price_pro">
                    <div class="price_current">
                        <div class="price_current-num">Giá: <?=number_format($rowProduct["Price"])?>đ</div>
                    </div>
                </div>
                
            </div>

            <ul class="content_pro">
                <li class="author_pro">Tác giả : <span class="author_pro-name"><?=$rowProduct["AName"]?></span></li>
                <li class="pub_name">Nhà xuất bản : Group 3</li>
                <li class="page_pro">Số trang : <?=$rowProduct["NumberPage"]?></li>
                <li class="weight_pro">Khối lượng : <?=$rowProduct["Mass"]?> gram</li>
                <li class="group_pro">Thể loại: <span class="group_pro-name"><?=$rowProduct["CName"]?></span></li>
            </ul>
            <form id="formadd" name="formadd" action="?module=cart&act=add" method="post">
            <input type="hidden" name="id" value="<?=$rowProduct["Id"]?>">
            <div class="quantity-container">

                <div class="quantity-title">Số lượng : </div>
                <div class="quantity-content">
                    <input style="border: 1px solid black;" type="number" name="quantity" class="quantity-input" value="1" min="1">
                </div>
            </div>
            
            <div class="btn-box">
                <input type="submit" name="button" value="Thêm vào giỏ hàng" class="cart-btn">
                <input type="submit" name="button" value="Mua ngay" class="buy-btn">
            </div>
            </form>
        </div>
    </div>
    <?php
    }
    ?>



<?php
    $user_cmt = new clsUser();
    if(isset($_SESSION["user"]))
    {
        $ketqua = $user_cmt->GetIdByUsername($_SESSION["user"]);
        if($ketqua==TRUE){
            $rowU = $user_cmt->data;
            $cmt = new clsComment();
            $ketqua2 = $cmt->GetProductCommentByUserIdAndProductId($rowU["Id"],$masp);
            $rowCmt = $cmt->data;
            if(isset($rowCmt["RatingLevel"])===FALSE)
            {

                ?>
                    <div class="product-comment" width: 100%;>
                        <h1 class="title__heading">Đánh giá</h1>
                        <form method="post" action="?module=productdetail&id=<?=$rowProduct["Id"]?>&act=addcomment" class="rating-form">
                            <table style="width: 100%;" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="30">Tài khoản: </td>
                                    <?php
                                        if(isset($_SESSION["user"]))
                                        {
                                            ?>
                                            <td><?=$_SESSION["user"]?></td>
                                            <?php
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td style="width: 10%;" height="30">Đánh giá:</td>
                                    <td style="width: 90%;">
                                    <div class="rating-stars">
                                        <input type="radio" name="rating" id="star-5" value="5">
                                        <label for="star-5">&#9733;</label>
                                        <input type="radio" name="rating" id="star-4" value="4">
                                        <label for="star-4">&#9733;</label>
                                        <input type="radio" name="rating" id="star-3" value="3">
                                        <label for="star-3">&#9733;</label>
                                        <input type="radio" name="rating" id="star-2" value="2">
                                        <label for="star-2">&#9733;</label>
                                        <input type="radio" name="rating" id="star-1" value="1">
                                        <label for="star-1">&#9733;</label>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30" valign="top">Nội dung: </td>
                                    <td><textarea class="des_cmt" style="width: 100%; height: 100px; border: 1px solid #a9171d; outline: 0;" name="description" id="description" rows="5" cols="50"></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input style="background-color: #a9171d; color: white; border: 0;" type="submit" name="button" id="button" value="Đồng ý"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php
                }
                else
                {
                    ?>
    
                        <div class="mycomment" style="width: 100%;">
                            <h1 class="title__heading">Đánh giá của bạn</h1>
                            <table style="width: 100%;">
                                <tr>
                                    <td>Ngày đánh giá: </td>
                                    <td><?=$rowCmt["Date"]?></td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;" height="30">Đánh giá của bạn: </td>
                                    <td>
                                        <?php
                                            for($i=0;$i<$rowCmt["RatingLevel"];$i++)
                                            {
                                                echo "<span style='color: gold; font-size: 25px; padding-right: 5px'>&#9733;</span>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nội dung: </td>
                                    <td><?=$rowCmt["Description"]?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a class="del_comment" href="?module=productdetail&act=deletecomment&id=<?=$masp?>">Xóa</a></td>
                                </tr>
                            </table>
                        </div>

                    <?php 
                }
            }
        }
        else
        {
?>

    <div class="product-comment" width: 100%;>
        <h1 class="title__heading">Đánh giá</h1>
        <form method="post" action="?module=productdetail&id=<?=$rowProduct["Id"]?>&act=addcomment" class="rating-form">
            <table style="width: 100%;" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="50">Tài khoản: </td>
                    <?php
                        if(isset($_SESSION["user"]))
                        {
                            ?>
                            <td><?=$_SESSION["user"]?></td>
                            <?php
                        }
                    ?>
                </tr>
                <tr>
                    <td style="width: 10%;" height="50">Đánh giá:</td>
                    <td style="width: 90%;">
                    <div class="rating-stars">
                        <input type="radio" name="rating" id="star-5" value="5">
                        <label for="star-5">&#9733;</label>
                        <input type="radio" name="rating" id="star-4" value="4">
                        <label for="star-4">&#9733;</label>
                        <input type="radio" name="rating" id="star-3" value="3">
                        <label for="star-3">&#9733;</label>
                        <input type="radio" name="rating" id="star-2" value="2">
                        <label for="star-2">&#9733;</label>
                        <input type="radio" name="rating" id="star-1" value="1">
                        <label for="star-1">&#9733;</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td height="50" valign="top">Nội dung: </td>
                    <td><textarea  style="width: 100%; height: 100px; border: 1px solid #a9171d; outline: 0;" name="description" id="description" rows="5" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td height="50"><input style="background-color: #a9171d; color: white; border: 0;" type="submit" name="button" id="button" value="Đồng ý"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        }
    ?>


    <div class="all-comment" style="width: 100%;">

    <?php
    //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
    $limit =  4;
    //B2.Tính tổng số sản phẩm 

    $comment_page = new clsComment();

    $total_records = $comment_page->GetSumCommentByProductId($masp);
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
    $comment_page->GetProductCommentListAndUsernameByProductId($masp,$start,$limit);
    $rowsComment = $comment_page->data;
    if($rowsComment==NULL)
        echo "<h3 class='title__heading'> KHÔNG CÓ BÌNH LUẬN NÀO </h3>";
    else{
        echo "<h3 class='title__heading'> TẤT CẢ BÌNH LUẬN </h3>";
    foreach($rowsComment as $row)
    {
        
    ?>
    <table class="table-all-comment" style="width: 100%;">
        <tr>
            <td>Tên tài khoản: </td>
            <td><?=$row["UsernameU"]?></td>
        </tr>
        <tr>
            <td>Ngày đánh giá: </td>
            <td><?=$row["Date"]?></td>
        </tr>
        <tr>
            <td style="width: 15%;">Đánh giá: </td>
            <td>
                <?php
                    for($i=0;$i<$row["RatingLevel"];$i++)
                    {
                        echo "<span style='color: gold; font-size: 25px; padding-right: 5px'>&#9733;</span>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Nội dung: </td>
            <td><?=$row["Description"]?></td>
        </tr>
    </table>
    <?php
    }
    ?>
    <div class="pager">
        <?php
        if(isset($_REQUEST["$masp"]))
            $link .= "&id=$masp";
        //tính vị trí trang trước
        $page = (($current_page-1)>0)?($current_page-1):1;
        if($_REQUEST["page"] == 1)
        {
            $CSS_OffButtonDau = " class='OffButton'";
            $CSS_OffButtonTruoc = " class='OffButton'";
        }
        else
        {
            $CSS_OffButtonDau = "href='?module=productdetail$link&page=1'";
            $CSS_OffButtonTruoc = "href='?module=productdetail$link&page=$page'";
        }
        
        ?>
        
        <a <?=$CSS_OffButtonDau?>> Đầu </a>
        <a <?=$CSS_OffButtonTruoc?>> <i class="pagination-item__icon fas fa-angle-left"></i> </a> 
        <?php
        for($page=1; $page<=$total_pages; $page++)
        {
            $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
        
        ?>
        <a href="?module=productdetail<?=$link?>&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?></a> 
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
            $CSS_OffButtonCuoi = "href='?module=productdetail$link&page=$total_pages'";
            $CSS_OffButtonTiep = "href='?module=productdetail$link&page=$page'";
        }
        ?>
        <a <?=$CSS_OffButtonTiep?>> <i class="pagination-item__icon fas fa-angle-right"></i> </a>
        <a <?=$CSS_OffButtonCuoi?>> Cuối </a>
    </div>
    <?php
    }
    ?>
    </div>

</div>

<script>
    let bigImg =document.querySelector('.big-img img');
    function showImg(pic){
        bigImg.src = pic;
    }
</script>