<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tìm kiếm sử dụng Ajax</title>
        <script language="JavaScript" src="jquery.min.js"></script>
        <script language="JavaScript">
            $document.ready(function(e)
            {
                //Lập trình sử dụng sự kiện keyup chung cho input
                $("input").keyup(function(e)
                {
                    tk = $("#tukhoa").val();    //Lấy giá trị của input tukhoa
                    $.post("Ketqua.php",{tukhoa:tk},function(responseData,status)
                    {
                        if(status == "success")
                            $("#Ketqua").html(responseData);
                        else
                            $("#Ketqua").html("<h3>Có lỗi xảy ra</h3>");
                    });
                });
            });
        </script>
    </head>
    <body>
        <form name="f1" id="f1">
            Từ khóa: <input type="text" name="tukhoa" id="tukhoa">
        </form>
        <h3>Kết quả trang Ketqua.php</h3>
        <div id="Ketqua" style="width:300px; height:200px; border:1px red solid;overflow: auto;"></div>
    </body>
</html>