<?php
function ConnectDB()
{
    $conn = NULL;
    try
    {
    $conn = new PDO("mysql:host=localhost;dbname=csdl_ketnoi2bang","root","");
    $conn->query("SET NAMES UTF8");//thiết lập chế độ unicode
    }
    catch(PDOException $ex)
    {
        echo "<p>" . $ex->getMessage() . "</p>";//thông báo lỗi hệ thống
        die ("<h3> LỖI KẾT NỐI CSDL </h3>");
    }
    return $conn;//trả về đối tượng PDO
}
?>