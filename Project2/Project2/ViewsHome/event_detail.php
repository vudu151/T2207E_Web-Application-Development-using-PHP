<div class="grid">
    <?php
    if($event->data==NULL)
    echo "<H2>KHÔNG TÌM THẤY SẢN PHẨM</H2>";
    else
    {
    $rowEvent = $event->data;
    ?>
    

    
    <div class="grid__row app__content">
        <div class="grid__column-3">
            <nav class="category">
                <h3 class="category__heading">DANH MỤC</h3>

                <ul class="category-list">
                    <li class="category-item">
                        <a href="#" class="category-item__link">Hoạt động</a>
                        <a href="?module=event" class="category-item__link">Sự kiện</a>
                        <a href="#" class="category-item__link">Điểm sách</a>
                        <a href="#" class="category-item__link">Lịch phát hành</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="grid__column-9">
            <div class="event-detail">
                <div class="event-name"><?=$rowEvent["Name"]?></div>
            </div>
            <div class="ed-content">
                <div class="e-img">
                    <img src="images/<?=$rowEvent["Image"]?>">
                </div>
                <div class="event-content">
                    <div><?=$rowEvent["Description"]?></div>
                </div>
            </div>
        </div>
    </div>


    <?php
    }
    ?>


<h1 class="title__heading">Bình luận của bạn</h1>
<?php
    $user_cmt = new clsUser();
    if(isset($_SESSION["user"]))
    {
        $ketqua = $user_cmt->GetIdByUsername($_SESSION["user"]);
        if($ketqua==TRUE){
            $rowU = $user_cmt->data;
            $cmt = new clsComment();
            $ketqua2 = $cmt->GetEventCommentByUserIdAndEventId($rowU["Id"],$masp);
            $rowCmt = $cmt->data;
            foreach($rowCmt as $row)
            {
            
                ?>

                    <div class="mycomment" style="width: 100%;">
                        
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 15%">Ngày: </td>
                                <td><?=$row["Date"]?></td>
                            </tr>
                            <tr>
                                <td>Nội dung: </td>
                                <td><?=$row["Description"]?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a class="del_comment" href="?module=eventtdetail&act=deletecomment&id=<?=$masp?>">Xóa</a></td>
                            </tr>
                        </table>
                    </div>

                <?php 
            }
        }
    }

?>

    <div class="product-comment" width: 100%;>
        <h1 class="title__heading">Bình luận</h1>
        <form method="post" action="?module=eventdetail&id=<?=$rowEvent["Id"]?>&act=addcomment" class="rating-form">
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
  
    ?>


    <div class="all-comment" style="width: 100%;">

    <?php
    //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
    $limit =  4;
    //B2.Tính tổng số sản phẩm 

    $comment_page = new clsComment();

    $total_records = $comment_page->GetSumEventCommentByEventId($masp);
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
    $comment_page->GetEventCommentListAndUsernameByEventId($masp,$start,$limit);
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
            <td style="width: 15%;">Tên tài khoản: </td>
            <td><?=$row["UsernameU"]?></td>
        </tr>
        <tr>
            <td>Ngày: </td>
            <td><?=$row["Date"]?></td>
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
            $CSS_OffButtonDau = "href='?module=eventdetail$link&page=1'";
            $CSS_OffButtonTruoc = "href='?module=eventdetail$link&page=$page'";
        }
        
        ?>
        
        <a <?=$CSS_OffButtonDau?>> Đầu </a>
        <a <?=$CSS_OffButtonTruoc?>> <i class="pagination-item__icon fas fa-angle-left"></i> </a> 
        <?php
        for($page=1; $page<=$total_pages; $page++)
        {
            $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
        
        ?>
        <a href="?module=eventdetail<?=$link?>&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?></a> 
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
            $CSS_OffButtonCuoi = "href='?module=eventdetail$link&page=$total_pages'";
            $CSS_OffButtonTiep = "href='?module=eventdetail$link&page=$page'";
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