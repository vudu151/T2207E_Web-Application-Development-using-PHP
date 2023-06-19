<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang chủ</title>
        <link rel="stylesheet" type="text/css" href="Style.css">
        <script language="javascript" src="jquery.min.js"></script>
        <script language="javascript">
            //Tham số p là vị trí trang cần hiển thị
            function ajaxShowSanpham(p)
            {
                $("#right").html("Loading...");
                $.ajax({url: "Sanpham.php",
                    data:{trang:p},type: "GET",
                    success: function(responseData) {
                        $("#right").html(responseData);
                    }
                });
            }

            function ajaxShowCart()
            {
                $("#right").html("Loading...");
                $.ajax({url: "Cart.php",
                    type:"GET",
                    success: function(responseData) {
                        $("#right").html(responseData);
                    }
                });
            }
        </script>
    </head>
    <body>
        <div id="container">
            <div id="left">
                <h1>MENU</h1>
                <ul>
                    <li><a href="#" id="mnSanpham"> SẢN PHẨM</a></li>
                    <li><a href="#" id="mnGiohang"> GIỎ HÀNG</a></li>
                </ul>
            </div>
            <div id="right">
                <h2>NỘI DUNG</h2>
            </div>
        </div>
    </body>
</html>