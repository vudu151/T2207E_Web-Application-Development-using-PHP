<div class="home-admin">
    <div class="home-admin-content">
        <div class="statistical">
            <div class="statistical-content">
                <div class="revenue box">
                    <?php
                        require("Models/clsOrder.php");
                        $totalmoney = new clsOrder();
                        $Money = $totalmoney->GetTotalMoneyComfirmedOrder();
                    ?>
                    <div class="revenue-icon admin-icon">
                        <i class="fa-solid fa-money-bills"></i>
                    </div>
                    <div class="revenue-content">
                        <p class="sta-number"><?=number_format($Money)?> VNĐ</p>
                        <span class="sta-title">Tổng doanh thu</span>
                    </div>
                </div>
                <div class="sale-number box">
                    <?php
                        require("Models/clsProduct.php");
                        $totalproduct = new clsProduct();
                        $SumQS = $totalproduct->GetSumQuantitySold();
                    ?>
                    <div class="sale-number-icon admin-icon">
                        <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="sale-number-content">
                        <p class="sta-number"><?=number_format($SumQS)?></p>
                        <span class="sta-title">Số sản phẩm bán ra</span>
                    </div>
                </div>
                <div class="product-number box">
                    <?php
                        
                        $SumP = $totalproduct->GetSumProduct();
                    ?>
                    <div class="product-number-icon admin-icon">
                        <i class="fa-sharp fa-solid fa-book"></i>
                    </div>
                    <div class="product-number-content">
                        <p class="sta-number"><?=number_format($SumP)?></p>
                        <span class="sta-title">Số sản phẩm</span>
                    </div>
                </div>
                <div class="user-number box">
                    <?php
                        require("Models/clsUser.php");
                        $totaluser = new clsUser();
                        $SumU = $totaluser->GetSumUser();
                    ?>
                    <div class="user-number-icon admin-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="user-number-content">
                        <p class="sta-number"><?=number_format($SumU)?></p>
                        <span class="sta-title">Số người dùng</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-chart">
            <div class="admin-chart-content">
                <div class="title-chart">THỐNG KÊ DOANH THU</div>
                <div class="chart-form">
                    <form name="fix-chart" method="get" action="#">
                        <table>
                        <tr>
                            <?php
                                if(isset($_REQUEST["date"]))
                                    $VaribleMiss = $_REQUEST["date"];
                            ?>
                            <td class="admin-td-title" >Doanh thu của:</td>
                            <td><input type="date" name="date" id="date" class="input-month" value="<?=$VaribleMiss?>"></td>
                            <td><input type="submit" name="button" id="button" class="btn-month" value="Tìm kiếm"></td>
                        </tr>
                        </table>
                    </form>
                    <div class="title-day">Doanh thu ngày: 
                        <?php
                            $SumMoneyDay = 0;
                            if(isset($_REQUEST["date"]))
                                $SumMoneyDay = $totalmoney->GetTotalMoneyByDate($_REQUEST["date"]);
                        ?>
                        <span class="money-month" ><?=number_format($SumMoneyDay)?> VNĐ</span>
                    </div>
                    <div class="title-month">Doanh thu tháng:
                        <?php
                            $SumMoneyMonth = 0;
                            if(isset($_REQUEST["date"]))
                                $SumMoneyMonth = $totalmoney->GetTotalMoneyInMonthByDate($_REQUEST["date"]);
                        ?>
                        <span class="money-month" ><?=number_format($SumMoneyMonth)?> VNĐ</span>
                    </div>
                </div>
                <div class="chart-content">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>

        <div class="unconfirmed-order">
            <div class="unconfirmed-order-content">
                <div class="title-chart">ĐƠN HÀNG CHƯA XÁC NHẬN</div>
                <div class="unconfirmed-order-list">

                    <table id="cart" class="table table-bordered tbale-condensed">
                        <thead>
                            <tr class="text-start text-center">
                                <th style="width:5%">ID</th>
                                <th style="width:10%">Tên người nhận</th>
                                <th style="width:15%">Địa chỉ</th>
                                <th style="width:10%">Điện thoại</th>
                                <th style="width:10%">Thời gian đặt hàng</th>
                                <th style="width:10%">Trạng thái</th>
                                <th style="width:20%">Mô tả</th>
                                <th style="width:5%">Tài khoản</th>
                                <th style="width:15%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("Models/clsOrder.php");
                            $unconfirmed = new clsOrder();
                            $unconfirmed->GetUnconfirmedOrder();
                            $rowUn = $unconfirmed->data;
                            foreach($rowUn as $row)
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
                                    <p class="name-product"><?=$row["Address"]?></p>
                                </td>
                                <td >
                                    <p class="name-product"><?=$row["Phone"]?></p>
                                </td>
                                <td >
                                    <p class="name-product"><?=$row["TimeOrder"]?></p>
                                </td>
                                <td >
                                    <p class="id"><?=$row["Status"]?></p>
                                </td>
                                <td>
                                    <p class="description"><?=$row["Description"]?></p>
                                </td>
                                <td >
                                    <p class="name-product"><?=$row["UserId"]?></p>
                                </td>
                                <td>
                                    <p class="button-cell">
                                        <button class="edit-button">
                                            <a href="?module=order&act=detail&id=<?=$row["Id"]?>"><i class="fa fa-edit"></i></a>
                                        </button>
                                        <button class="delete-button">
                                            <a href="?module=order&act=delete&id=<?=$row["Id"]?>"><i class="fa fa-trash-alt"></i></a>
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

<?php

    for($i=1;$i<=12;$i++){
        $SUM_MONTH[$i] = 0;
        if(isset($_REQUEST["date"]))
            $SUM_MONTH[$i] = $totalmoney->GetTotalMoneyOfMonthInYearByDate($_REQUEST["date"], $i);
        if($SUM_MONTH[$i]==-1)
            $SUM_MONTH[$i] = 0;
    }
    
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const labels = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12']

    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Doanh thu năm theo từng tháng',
                backgroundColor: '#a9171d',
                borderColor: '#a9171d',
                data: [<?=(int)$SUM_MONTH[1]?>, <?=(int)$SUM_MONTH[2]?>, <?=(int)$SUM_MONTH[3]?>, <?=(int)$SUM_MONTH[4]?>, <?=(int)$SUM_MONTH[5]?>, <?=(int)$SUM_MONTH[6]?>, <?=(int)$SUM_MONTH[7]?>, <?=(int)$SUM_MONTH[8]?>, <?=(int)$SUM_MONTH[9]?>, <?=(int)$SUM_MONTH[10]?>, <?=(int)$SUM_MONTH[11]?>, <?=(int)$SUM_MONTH[12]?>],
                tension: 0.4,
            },
        ],
    }

    const config = {
        type: 'line',
        data: data,
    }

    const canvas = document.getElementById('canvas')
    const chart = new Chart(canvas, config)
</script>