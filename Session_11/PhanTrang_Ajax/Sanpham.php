<h1>Demo Phân trang sản phẩm - Ajax</h1>
<?php
    require("Database.php");
    //B1: Khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang 
    $limit = 2;

    //B2: Tính tổng số sản phẩm
    $total_records = DemTongSoSanPham();
    if($total_records==null)
        die("<h3>Lỗi truy vấn CSDL</h3>");

    //B3: Tính tổng số trang sẽ có = ceil(Tổng số sản phẩm/ Số sản phẩm trên 1 trang)
    //$total_records để dùng cho vòng lặp hiển thị các trang : 1|2|...|$total_pages
    $total_pages = ceil($total_records/$limit);

    //B4: Xác định vị trí trang muốn hiển thị ( từ link phân trang)
    //Ví dụ: index.php?trang=1, index.php?trang=2
    $current_page = 1;         //Gán mặc định trang cần hiển thị = 1;
    if(isset($_REQUEST["trang"]) && is_numeric($_REQUEST["trang"]))
    {
        $current_page = $_REQUEST["trang"];
    }
    if($current_page<=0)
    {   //Nếu trang cần hiển thị <=0 thì gán về trang 1
        $current_page = 1;
    }
    if($current_page>$total_pages)
    {   //Nếu vượt qua tổng số trang thì gán bằng trang cuối
        $current_page = $total_pages;
    }

    //B5: Tính vị trí đầu tiên của bản ghi cần truy vấn ứng với số vị trí trang cần hiển thị 
    $start = ($current_page-1)*$limit;
    $rows = DanhSach_SP_Theo_Vitri($start, $limit);
    if($rows==null)
    {
        die("<h3>Lỗi truy vấn CSDL</h3>");
    }
    foreach($rows as $row)
    {
        ?>
        <div class="pro">
            <h2><?=$row["title"]?></h2>
            <p>Tác giả: <?=$row["author"]?> - Giá: <?=number_format($row["price"])?> VNĐ</p>
        </div>
        <?php
    }
    ?>
    <div class="paper">
        <B>Trang:</B>
        <a href="#" onClick="ajaxShowSanpham(1);"> Đầu </a>
        <?php
        //Tính vị trí trang trước
        $trang = (($current_page-1)>0)?($current_page-1):1;
        ?>
        |<a href="#" onClick="ajaxShowSanpham(<?=$trang?>);"> Trước </a> 
        <?php
        for($trang=1;$trang<=$total_pages;$trang++)
        {
            $CSS_curPage = ($trang==$current_page)?"class='curPage'":"";
        ?>
        |<a href="#" <?=$CSS_curPage?> onClick="ajaxShowSanpham(<?=$trang?>);"> <?=$trang?> </a> 
        <?php
        }

        //Tính vị trí trang tiếp
        $trang = (($current_page+1)>=$total_pages)?($current_page+1):$total_pages;
        ?>
        |<a href="#" onClick="ajaxShowSanpham(<?=$trang?>);"> Tiếp </a>
        |<a href="#" onClick="ajaxShowSanpham(<?=$total_pages?>);"> Cuối </a>   
    </div>

<?php
    sleep(1);
?>