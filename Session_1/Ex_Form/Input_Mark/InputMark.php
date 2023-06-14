<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Input Mark</title>
        <script language="JavaScript" src="MyScript.js"></script>
        <style type="text/css">
            .tieude
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h2 class="tieude">Nhập điểm</h2>
        <form id="form_1" name="form_1" method="get" action="Result.php">
            <div id="baoloi"style="color:red"></div>
            <table width="500" border="0" align="center">
                <tr>
                    <td width="176">Điểm toán: </td>
                    <td width="314">
                        <input type="text" name="tToan"id="tToan" onblur="check(this)"/>
                    </td>
                </tr>
                <tr>
                    <td width="176">Điểm văn: </td>
                    <td>
                        <input type="text" name="tVan"id="tVan" onblur="check(this)"/>
                    </td>
                </tr>
                <tr>
                    <td width="176">Điểm anh: </td>
                    <td>
                        <input type="text" name="tAnh"id="tAnh" onblur="check(this)"/>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="button"id="button" value="Xem kết quả" onclick="return kiemtra();"/>
                    </td>
                </tr>
            </table>
        </form>
        <p>&nbsp;</p>
    </body>
</html>