<!DOCTYPE html>
<html>
    <head>
        <meta charset="Utf-8" />
        <title>Xử lý đăng nhập</title>
    </head>
    <body>
        <h2>Xử lý Login</h2>
        <?php
            session_start();
            $user = $_REQUEST["tUser"];
            $pass = $_REQUEST["tPassword"];
            //Kết nối CSDL
            $servername = "localhost";
            $userSQL = "root";
            $passSQL = "";
            try
            {
                $conn =  new PDO("mysql:host=$servername;dbname=t22072e_php_s4_csdl_dangnhap",$userSQL,$passSQL);
                $conn -> query("SET NAMES UTF8");
                echo "<p>Kết nối thành công</p>";
            }
            catch (PDOException $e)
            {
                echo "Lỗi kết nối: " . $e->getMessage();
                die();
            }
            //Thực hiện truy vấn CSDL
            $sql = "SELECT * FROM tbUser WHERE username='$user' AND password='$pass'";
            $pdo_stm = $conn->prepare($sql);    //Gán câu lệnh sql cho đói tượng PDO Statement
            $ketqua = $pdo_stm->execute();      //Thực thi câu lệnh truy vấn
            if($ketqua==false)
                die("Lỗi lệnh sql");
            //Kiểm tra đăng nhập
            if($pdo_stm->rowCount()>0)
            {
                $row = $pdo_stm->fetch();//Lấy 1 dòng từ dữ liệu SELECT dạng Array
                $_SESSION["logined"] = "OK";   //Tạo ra biến $_SEESION["logined"]
                $_SESSION["user"] = $row["username"];  //Lấy giá trị cột username
                $_SESSION["hoten"] = $row["hoten"];   //Lấy giá trị cột hoten từ bảng tbUser
                echo "<h3>Đăng nhập thành công</h3>";
                echo "<a href=\"Admin.php\">Mời vào trang Admin</a>";
            }
            else
            {
                echo"<h3>Đăng nhập ko thành công</h3>";
                echo "<a href=\"Login.php\">Mời đăng nhập lại</a>";
            }
        ?>
    </body>
</html>