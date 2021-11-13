<?php
require_once 'libs/libs.php';
$sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc desc limit 6";
$tintuc = select_page($sql);
$sql = "SELECT * FROM danh_muc";
$listRecord = select_page($sql);
$sql = "SELECT * FROM thuong_hieu";
$thuonghieu = select_page($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Tin Tức</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <link rel="stylesheet" href="css/index.css" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>



</head>

<body>
    <div class="wrapper">
        <header class="wrapper__header">
            <div class="header__group">
                <div class="grid wide">
                    <div class="row col">
                        <section class="l-6 col">
                            <div class="header__social">
                                <span class="header__social-box">
                                    <i class="fas fa-phone-volume icon-social"></i>
                                    <span class="header__social-box-title">096-5422-573</span>
                                </span>
                                <span class="header__social-box">
                                    <i class="fas fa-envelope icon-social"></i>
                                    <span class="header__social-box-title title-email">huyhtph07087@fpt.edu.vn</span>
                                </span>
                            </div>
                        </section>
                        <section class="l-6 col">
                            <div class="header__info">
                                <span class="header__info-box">
                                    <i class="fas fa-user-circle icon-user"></i>
                                    <button class="header__info-box-link create">Đăng Kí</button>
                                    <span class="header__info-box-link-border">/</span>
                                    <button class="header__info-box-link login">Đăng nhập</button>
                                </span>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="header__group2">
                <div class="grid wide">
                    <div class="row col header__group2-box">
                        <div class="l-12 col header__search-box">
                            <div class="row">
                                <!-- logo -->
                                <section class="l-2 col">
                                    <a href="index.php" class="header__logo">Wshop</a>
                                </section>
                                <!-- box search -->
                                <section class="l-7 col">
                                    <form action="products.php" class="header__form">
                                        <div class="header__form-file">
                                            <input type="text" class="header__form-search" placeholder="Tìm kiếm trên Wshop" name="search-box" value="">
                                            <!-- <input type="hidden" name="search" value="tìm kiếm"> -->
                                            <button type="submit" style="padding: 9px; margin-top: -3px;" class="btn btn-warning">Tìm Kiếm</button>
                                        </div>
                                    </form>
                                </section>
                                <!-- thông tin người dùng , giỏ hàng -->
                                <section class="l-3 col ">
                                    <div class="header__group-info">
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                        ?>
                                            <div class="header__user">
                                                <i class="fas fa-user-circle header__icon-user"></i>
                                                <ul class="header__user-list">
                                                    <li class="header__user-item">
                                                        <i class="fas fa-cog user-item-icon"></i>
                                                        <a href="<?php
                                                                    if ($_SESSION['user']['roles'] == 1) {
                                                                        echo 'http://localhost/duan1-nhom1/assignment/admin/frames_func.php';
                                                                    } elseif ($_SESSION['user']['roles'] == 2) {
                                                                        echo 'http://localhost/duan1-nhom1/assignment/seller/frames_func.php';
                                                                    } elseif ($_SESSION['user']['roles'] == 0) {
                                                                        echo 'http://localhost/duan1-nhom1/assignment/';
                                                                    }
                                                                    ?>" class="header__user-link">Quản lý</a><span style="color: red;">
                                                            <?php
                                                            if ($_SESSION['user']['roles'] == 0) {
                                                                echo 'No';
                                                            }
                                                            ?>
                                                        </span>

                                                    </li>
                                                    <li class="header__user-item">
                                                        <i class="fas fa-sign-out-alt user-item-icon"></i>
                                                        <a href="user/logout.php" class="header__user-link">Đăng xuất</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="header__shopping">
                                                <a href="" class="header__shopping-link">
                                                    <i class="fas fa-shopping-cart icon-shopping"></i>
                                                </a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="header__shopping">
                                                <a href="" class="header__shopping-link">
                                                    <i class="fas fa-shopping-cart icon-shopping"></i>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>

                                </section>
                            </div>
                        </div>
                        <!-- nav menu -->
                        <nav class="l-12 col header__nav">
                            <ul class="header__nav-list">
                                <li class="header__nav-item">
                                    <a href="index.php" class="header__nav-link">Trang chủ</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="products.php" class="header__nav-link">Sản Phẩm</a>
                                    <ul class="menu_cap2_ul">
                                        <?php foreach ($listRecord as $menu) : ?>
                                            <li class="menu_cap2_li">
                                                <a href="products.php?id=<?= $menu['id_dm'] ?>" class="menu_cap2_a">
                                                    <?php echo $menu['ten_dm'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="header__nav-item">
                                    <a href="products.php" class="header__nav-link">Thương hiệu</a>
                                    <ul class="menu_cap2_ul">
                                        <?php foreach ($thuonghieu as $menu) : ?>
                                            <li class="menu_cap2_li">
                                                <a href="productss.php?th=<?= $menu['id_th'] ?>" class="menu_cap2_a">
                                                    <?php echo $menu['ten_th'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="header__nav-item">
                                    <a href="gioithieu.php" class="header__nav-link">Giới Thiệu</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="tintuc.php" class="header__nav-link">Tin Tức</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="#" class="header__nav-link">Liên Hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <main class="container">
        <br>

        <?php foreach ($tintuc as $item) : ?>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><?= $item['tieu_de'] ?></h3>
                            <div class="mb-1 text-muted"><?= $item['ngay_dang_tin'] ?></div>
                            <p class="card-text mb-auto"><?= $item['nd_ngan'] ?> </p>
                            <a href="tintuc_detail.php/id=<?= $item['ma_tin_tuc'] ?>" class="stretched-link">Xem chi tiết</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="<?= $item['anh'] ?>" width="400" height="200">


                            </img>

                        </div>
                    </div>
                </div>


            </div>
        <?php endforeach; ?>
    </main>
    <?php

    require_once 'footer.php';
    ?>