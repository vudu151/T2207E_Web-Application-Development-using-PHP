<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Danh sách sản phẩm</title>
        <link rel="stylesheet" type="text/css" href="Style.css">
    </head>
    <body>
        <h1>Demo phân trang sản phẩm</h1>
        <?php
            require("Database.php");
            //B1: Khai báo biến lưu giới hạn số sản phẩm hiển thị trên 1 trang
            $limit = 3;

            //B2: Tính tổng số sản phẩm
            $total_records = DemTongSoSanPham();
            if($total_records==null)
                die("<h3>Lỗi truy vấn CSDL</h3>");

            //B3: Tính tổng số trang sẽ có bằng: ceil(Tổng số sản phẩm/Số sản phẩm trên một trang)
            //$total_pages để dùng cho vòng lặp hiển thị các trang: 1|2|...|$total_pages
            $total_pages = ceil($total_records/$limit);

            //B4: Xác định vị trí trang muốn hiển thị(Từ link phân trang)
            //VD: index.php?trang=1,...
            $current_page = 1;         //Gán mặc định trang cần hiển thị =1
            if(isset($_REQUEST["trang"]) && is_numeric($_REQUEST["trang"]))
            {
                $current_page = $_REQUEST["trang"];
            }
            if($current_page<=0) 
            {  //Nếu trang cần hiển thị bé hơn= 0 thì mặc định là trang 1
                $current_page = 1;
            }
            if($current_page>$total_pages)
            {   //Nếu vượt quá tổng số trang thì gán bằng chính trang cuối
                $current_page = $total_pages;
            }

            //B5: Tính vị trí đầu tiên của bản ghi cần truy vấn ứng số vị trí trang cần hiển thị
            $start = ($current_page-1) * $limit;     //Giả sử trang hiện tại là 3, $limit(số sản phẩm mỗi trang là 10 =>Tính được vị trí của bản gi đầu tiên là bắt đầu từ 20)
            $rows = DanhSach_SP_Theo_Vitri($start,$limit);
            if($rows == null)
                die("<h3>Lỗi truy vấn CSDL</h3>");
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
                <a href='?trang=1'>Đầu</a>
                <?php
                    //Tính vị trí trang trước
                    $trang = (($current_page-1)>0)?($current_page-1):1;
                    ?>
                    |<a href='?trang=<?=$trang?>">Trước</a>
                    <?php
                    for($trang=1;$trang<=$total_pages;$trang++)
                    {
                        $CSS_curPage = ($trang==$current_page)?"class='curPage'":"";
                    ?>
                    |<a href="?trang=<?=$trang?>" <?=$CSS_curPage?>> <?=$trang?> </a>
                    <?php
                    }
                    //Tính vị trí trang tiếp
                    $trang = (($current_page+1)<=$total_pages)?($current_page+1):$total_pages;
                    ?>
                    |<a href="?trang=<?=$trang?>"> Tiếp </a>
                    |<a href="?trang=<?=$total_pages?>"> Cuối </a>
            </div>
    </body>
</html>