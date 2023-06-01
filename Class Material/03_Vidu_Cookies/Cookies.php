<?php
setcookie("user", "John Doe", time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie("phone", "12345", time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ Cookies</title>
</head>
<body>
<?php
if(!isset($_COOKIE["user"])) {
  echo "Cookie named 'user' is not set!";
} else {
  echo "Cookie 'user' is set!";
  echo "Value is: " . $_COOKIE["user"];
}
if(!isset($_COOKIE["phone"])) {
    echo "<br>Cookie named 'phone' is not set!";
  } else {
    echo "<br>Cookie 'usphoneer' is set!";
    echo "<br>Value is: " . $_COOKIE["phone"];
  }
?>
</body>
</html>