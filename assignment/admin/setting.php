<?php
require_once '../libs/libs.php';
//
$sql = 'SELECT count(id_dm) FROM danh_muc';
$cate = count_all($sql);

$sql = 'SELECT count(id_sp) FROM san_pham';
$product = count_all($sql);

$sql = 'SELECT count(id_th) FROM thuong_hieu';
$brand = count_all($sql);

$sql = 'SELECT count(id_slide) FROM slide';
$slide = count_all($sql);

$sql = 'SELECT count(id_user) FROM user';
$user = count_all($sql);

$sql = 'SELECT count(id_bl) FROM binh_luan';
$comment = count_all($sql);

?>
<div class="wrapper__content">
    <div class="content_header">
        <h1 class="content__header-name">Quản lý website</h1>
        <a href="/PHP1/assignment/index.php" class="content__link-logout">
            Trang Chủ
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>

    <!-- content -->
    <div class="content__box">
        <div class="content__box-product ">
            <h3 class="content__box-header">Tất cả danh mục</h3>
            <div class="row col row-2">
                <div class="l-3 box-represent">
                    <i class="fas fa-sitemap icon-represent"></i>
                    <div class="content__box-text">
                        <span class="content__box-title">Danh mục SP</span>
                        <span class="content__box-count">
                                        <?php
                                        echo $cate;
                                        ?>
                                    </span>
                    </div>
                </div>
                <div class="l-3 box-represent">
                    <i class="fas fa-shopping-bag icon-represent"></i>
                    <div class="content__box-text">
                        <span class="content__box-title">Số sản phẩm</span>
                        <span class="content__box-count">
                                        <?php
                                        echo $product;
                                        ?>
                                    </span>
                    </div>
                </div>
                <div class="l-3 box-represent">
                    <i class="fas fa-gem icon-represent"></i>
                    <div class="content__box-text">
                        <span class="content__box-title">Số thương hiệu</span>
                        <span class="content__box-count">
                                        <?php
                                        echo $brand;
                                        ?>
                                    </span>
                    </div>
                </div>
                <div class="l-3 box-represent">
                    <i class="fas fa-images icon-represent"></i>
                    <div class="content__box-text">
                        <span class="content__box-title">Số slide</span>
                        <span class="content__box-count">
                                        <?php
                                        echo $slide;
                                        ?>
                                    </span>
                    </div>
                </div>
            </div>

            <div class="row col row-2">
                <div class="l-3 col box-represent">
                    <i class="fas fa-users icon-represent"></i>
                    <div class="content__box-text">
                        <span class="content__box-title">Tài khoản User</span>
                        <span class="content__box-count">
                                        <?php
                                        echo $user;
                                        ?>
                                    </span>
                    </div>
                </div>
                <div class="l-3 col box-represent">
                    <i class="fas fa-comments icon-represent"></i>
                    <div class="content__box-text">
                        <span class="content__box-title">Số bình luận</span>
                        <span class="content__box-count">
                                        <?php
                                        echo $comment;
                                        ?>
                                    </span>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- footer -->
    <div class="content__footer">
        <span class="content__footer-txt">&copy; huyhtph07087 Full-Stack - in the near future</span>
    </div>
</div>
</div>

</div>


<!-- <script src="js/setting.js"></script> -->
</body>
</html>
