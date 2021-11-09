<?php
session_start();
$session = isset($_SESSION['user']) ? $_SESSION['user'] : "";
require_once 'libs/libs.php';
require_once 'user/create_acc.php';
require_once 'user/login.php';
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/grid.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/products.css"/>
    <link rel="stylesheet" href="css/detail.css"/>
    <title>Trang chủ</title>
</head>
<body>
<?php
require_once 'header.php';
require_once 'home.php';
require_once 'footer.php';
?>
</body>
</html>
