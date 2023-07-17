<div class="function">
    <a class="button" href="?module=product">HIỂN THỊ DANH SÁCH</a>
    <a class="button" href="?module=product&act=add">THÊM SẢN PHẨM</a>
</div>
<div class="content">

    <div class="ProductSearch">
        <?php
        $keyword = isset($_REQUEST["keyword"])? $_REQUEST["keyword"]:"";
        $categoryid = isset($_REQUEST["categoryid"])?$_REQUEST["categoryid"]:0;
        ?>
        <form name="fTimkiem" id="fTiemkiem" action="">
        <input type="hidden" name="module" value="product">
        <input type="hidden" name="act" value="search">
        <span class="title-search">Từ khóa:</span><input type="text" name="keyword" id="keyword" value="<?=$keyword?>">
        <span class="title-search">Nhóm sản phẩm:</span>
        <select name="categoryid" id="categoryid">
            <option value="0">Tất tả nhóm SP</option>
            <?php
                require_once("Models/clsCategory.php");
                require_once("Function/Function.php");
                $nps = new clsCategory();
                //lấy nhóm SP tất cả trạng thái, sắp xếp theo thứu tự tăng dần
                $nps->GetCategoryList(1);
                ShowOptions($nps->data,"Id","Name",$categoryid);
            ?>
        </select>
        <input type="submit" name="bSearch" id="bSearch" value="Search">
        </form>
    </div>

    <h2 class="title__heading">Danh sách sản phẩm</h2>
    <div class="grid">
        <div class="container">
            <table id="cart" class="table table-bordered tbale-condensed">
                <thead>
                    <tr class="text-start text-center">
                        <th style="width:5%">ID</th>
                        <th style="width:10%">Tên sản phẩm</th>
                        <th style="width:5%">Số lượng</th>
                        <th style="width:7%">Giá</th>
                        <th style="width:8%">Khối lượng (gram)</th>
                        <th style="width:5%">Số trang</th>
                        <th style="width:10%">Ảnh</th>
                        <th style="width:20%"> Ảnh chi tiết</th>
                        <th style="width:5%">Lượt bán</th>
                        <th style="width:15%">Mô tả</th>
                        <th style="width:10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //B1.khai báo biến lưu giới hạn số sản phẩm cần hiển thị trên 1 trang
                    $limit =  3;
                    //B2.Tính tổng số sản phẩm 

                    $product = new clsProduct();

                    $total_records = $product->GetSumProductPaging($categoryid,$keyword);
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
                    $product->GetProductListByLocation($categoryid,$keyword,$start,$limit);
                    $rowsProduct = $product->data;
                    if($rowsProduct==NULL)
                        die("<h3> KHÔNG CÓ SẢN PHẨM NÀO </h3>");
                    foreach($rowsProduct as $row)
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
                            <p class="id"><?=$row["Quantity"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=number_format($row["Price"])?>đ</p>
                        </td>
                        <td >
                            <p class="id"><?=$row["Mass"]?></p>
                        </td>
                        <td >
                            <p class="id"><?=$row["NumberPage"]?></p>
                        </td>
                        <td >
                            <p class="id"><a href="images/<?=$row["Image"]?>"><img style="width: 60px; height: 80px;" src="images/<?=$row["Image"]?>"></a></p>
                        </td>
                        <td >
                            <?php
                                $ketqua = $sanpham->GetProductImageByProductId($row["Id"]);
                                $rowsImg = $sanpham->data;
                                foreach($rowsImg as $img)
                                {
                                    ?>
                                        <p class="id">
                                            <a class="image-detail" href="images/<?=$img["Link"]?>"><?=$img["Link"]?></a>
                                            <span><a class="btn-pimage" href="?module=product&act=deleteProductImage&id=<?=$img["Id"]?>"><i class="fa fa-trash-alt"></i></a></span>
                                        </p>
                                    <?php
                                }
                            ?>

                            <p><a class="btn-pimage" href="?module=product&act=addProductImage&id=<?=$row["Id"]?>">Thêm ảnh<i class="fa-solid fa-square-plus"></i></a></p>
                        </td>
                        <td >
                            <p class="id"><?=$row["QuantitySold"]?></p>
                        </td>
                        <td>
                            <p class="description"><?=$row["Description"]?></p>
                        </td>
                        <td>
                            <p class="button-cell">
                                <button class="edit-button">
                                    <a href="?module=product&act=fix&id=<?=$row["Id"]?>"><i class="fa fa-edit"></i></a>
                                </button>
                                <button class="delete-button">
                                    <a href="?module=product&act=delete&id=<?=$row["Id"]?>"><i class="fa fa-trash-alt"></i></a>
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
                            $CSS_OffButtonDau = "href='?module=product&act=search&keyword=$keyword&categoryid=$categoryid&bSearch=Search&page=1'";
                            $CSS_OffButtonTruoc = "href='?module=product&act=search&keyword=$keyword&categoryid=$categoryid&bSearch=Search&page=$page'";
                        }
                        
                        ?>
                        
                        <a <?=$CSS_OffButtonDau?>> Đầu </a>
                        |<a <?=$CSS_OffButtonTruoc?>> Trước </a> 
                        <?php
                        for($page=1; $page<=$total_pages; $page++)
                        {
                            $CSS_curPage = ($page==$current_page)?" class='curPage' ": "";
                        
                        ?>
                        |<a href="?module=product&act=search&keyword=<?=$keyword?>&categoryid=<?=$categoryid?>&bSearch=Search&page=<?=$page?>" <?=$CSS_curPage?>> <?=$page?> </a> 
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
                            $CSS_OffButtonCuoi = "href='?module=product&act=search&keyword=$keyword&categoryid=$categoryid&bSearch=Search&page=$total_pages'";
                            $CSS_OffButtonTiep = "href='?module=product&act=search&keyword=$keyword&categoryid=$categoryid&bSearch=Search&page=$page'";
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