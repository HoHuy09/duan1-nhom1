<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/grid.css" />
    <link rel="stylesheet" href="../../css/base.css" />
    <link rel="stylesheet" href="../../css/setting.css" />
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <title>Quản lý website</title>
</head>
<body>
    <div class="wrapper">
        <div class="wrapper__group">
            <!-- nav left -->
            <div class="wrapper__nav">
                <div class="nav__header">
                <a href="frames_func.php" class="nav__header-link">
                        <img src="../../img/<?= $_SESSION['user']['avatar']?>" alt="" class="nav__header-img">
                    </a>
                    <span class="nav__header-author"><?= $_SESSION['user']['name']?></span>
                </div>
                <div class="nav__name">
                    <h1 class="nav__name-header">Danh mục</h1>
                </div>

                <!-- list nav -->
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../frames_func.php" class="nav__link">
                            <i class="fas fa-home"></i>
                            <span class="nav__link-txt">Thống kê</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="../frames_func.php?page_layout=category" class="nav__link">
                            <i class="fas fa-sitemap"></i>
                            <span class="nav__link-txt">Danh mục sp</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="../frames_func.php?page_layout=product" class="nav__link">
                            <i class="fas fa-shopping-bag"></i>
                            <span class="nav__link-txt">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="../frames_func.php?page_layout=brand" class="nav__link">
                            <i class="fas fa-gem"></i>
                            <span class="nav__link-txt">Thương hiệu</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="../frames_func.php?page_layout=comment" class="nav__link">
                            <i class="fas fa-comments"></i>                         
                            <span class="nav__link-txt">Comment</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="../frames_func.php?page_layout=tintuc" class="nav__link">
                            <i class="fa fa-book" aria-hidden="true"></i>                         
                            <span class="nav__link-txt">Tin Tức</span>
                        </a>
                    </li>
                </ul>
            </div>
