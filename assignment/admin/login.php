<?php
session_start();
$session = isset($_SESSION['user']) ? $_SESSION['user'] : "";
require_once "../libs/libs.php";
//
require_once "../user/loginAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/grid.css"/>
    <link rel="stylesheet" href="../css/products.css"/>
    <link rel="stylesheet" href="../css/detail.css"/>
    <link rel="stylesheet" href="../css/index.css">
    <title>Trang chủ</title>
</head>
<body>
<div class="content__form" style="visibility: visible;">
    <form action="login.php" class="content__form-box-login" method="POST">
        <a href="../index.php"><i class="fas fa-times icon-close"></i></a>
        <h1 class="content__form-header">Đăng nhập tài khoản ?</h1>
        <div class="content__form-field">
            <label for="" class="content__form-field-header">Tài khoản ?</label>
            <input type="text" class="content__form-input" placeholder="Tài khoản" name="acc">
        </div>
        <div class="content__form-field">
            <label for="" class="content__form-field-header">Mật khẩu</label>
            <input type="password" class="content__form-input" placeholder="Mật khẩu" name="pwd">
        </div>

        <div class="content__form-btn">
            <button class="content__form-btn-login" type="submit" name="btn_login">Đăng nhập</button>
        </div>
    </form>
</div>
<script src="../js/nav_fiexd.js"></script>
<script src="../js/login_form.js"></script>
<script src="../js/list_control.js"></script>
<script src="../js/slide.js"></script>
<script src="../js/filter_product.js"></script>
</body>
</html>