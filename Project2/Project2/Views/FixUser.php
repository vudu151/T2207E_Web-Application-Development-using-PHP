<div class="function">
    <a class="button" href="?module=user">HIỂN THỊ DANH SÁCH</a>
</div>
<div class="order-detail">
    <h2 style="text-align: left; padding-left: 150px;" class="title__heading">Chi tiết tài khoản</h2>
    <?php
    $row = $sanpham->data;
    ?>
    <div class="order-detail-content">
        <form name="form1" method="post" action="?module=<?=$module?>&act=handlefix&id=<?=$row["Id"]?>">
            <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="250" height="30"><p>Mã tài khoản: </p></td>
                <td width="380"><p><?=$id?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Họ: </p></td>
                <td width="380"><p><?=$row["FirstName"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Tên: </p></td>
                <td width="380"><p><?=$row["LastName"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Địa chỉ: </p></td>
                <td width="380"><p><?=$row["Address"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Email: </p></td>
                <td width="380"><p><?=$row["Email"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Điện thoại: </p></td>
                <td width="380"><p><?=$row["Phone"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Tên tài khoản: </p></td>
                <td width="380"><p><?=$row["Username"]?></p></td>
            </tr>
            <tr>
                <td width="250" height="30"><p>Sửa mật khẩu: </p></td>
                <td width="380"><input type="text" name="password" id="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="button" id="button" value="Đồng ý"></td>
            </tr>
            </table>
        </form>
    </div>
    <?php
    ?>
</div>


<div style="padding-top: 30px" class="accordion" id="accordionExample">
<div class="accordion-item">
    <h2 class="accordion-header">
    <button style="padding-left: 150px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
        Danh sách bình luận tác phẩm
    </button>
    </h2>
    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        
        <div class="content">
            
            <div class="grid">
                <div class="container">
                    <table id="cart" class="table table-bordered tbale-condensed">
                        <thead>
                            <tr class="text-start text-center">
                                <th style="width:5%">ID</th>
                                <th style="width:10%">Date</th>
                                <th style="width:10%">Mức đánh giá</th>
                                <th style="width:45%">Mô tả</th>
                                <th style="width:10%">Mã sản phẩm</th>
                                <th style="width:10%">Mã người dùng</th>
                                <th style="width:10%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("Models/clsComment.php");
                            $cmt = new clsComment();
                            $ketqua = $cmt->GetProductCommentListByUserId($id);
                            $rows = $cmt->data;
                            foreach($rows as $r)
                            {
                            ?>
                            <tr class="py-3">
                                <td>
                                    <p class="id"><?=$r["Id"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["Date"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["RatingLevel"]?></p>
                                </td>
                                <td >
                                    <p class="name-product"><?=$r["Description"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["ProductId"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["UserId"]?></p>
                                </td>
                                <td>
                                    <p class="button-cell">
                                        <button class="delete-button">
                                            <a href="?module=user&act=deleteproductcomment&id=<?=$r["Id"]?>"><i class="fa fa-trash-alt"></i></a>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header">
    <button style="padding-left: 150px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
        Danh sách bình luận sự kiện
    </button>
    </h2>
    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        
        <div class="content">
            
            <div class="grid">
                <div class="container">
                    <table id="cart" class="table table-bordered tbale-condensed">
                        <thead>
                            <tr class="text-start text-center">
                                <th style="width:10%">ID</th>
                                <th style="width:10%">Date</th>
                                <th style="width:50%">Mô tả</th>
                                <th style="width:10%">Mã sự kiện</th>
                                <th style="width:10%">Mã người dùng</th>
                                <th style="width:10%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cmtevent = new clsComment();
                            $ketqua = $cmtevent->GetEventCommentListByUserId($id);
                            $rows = $cmtevent->data;
                            foreach($rows as $r)
                            {
                            ?>
                            <tr class="py-3">
                                <td>
                                    <p class="id"><?=$r["Id"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["Date"]?></p>
                                </td>
                                <td >
                                    <p class="name-product"><?=$r["Description"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["EventId"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$r["UserId"]?></p>
                                </td>
                                <td>
                                    <p class="button-cell">
                                        <button class="delete-button">
                                            <a href="?module=user&act=deleteeventcomment&id=<?=$r["Id"]?>"><i class="fa fa-trash-alt"></i></a>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

</div>