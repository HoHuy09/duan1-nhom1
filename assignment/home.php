<?php
require_once 'user/create_acc.php';
require_once 'user/login.php';
require_once 'index.php';

$sql = "SELECT * FROM san_pham ORDER BY giam_gia desc limit 6";
$listSale = select_page($sql);
//
$sql = "SELECT * FROM san_pham ORDER BY luot_xem desc limit 10";
$luotXem = select_page($sql);
//
$sql = "SELECT * FROM san_pham ORDER BY id_sp desc limit 6";
$sanPhamMoi = select_page($sql);
//
$sql = "SELECT * FROM slide ORDER BY id_slide DESC";
$listSlide = select_all_follow_order($sql);// slide
?>

<main class="wrapper__content">
    <div class="grid wide">
        <!-- slide -->
        <div class="row col">
            <section class="l-8 col">
                <div class="content__slide">
                    <div class="content__slide-img">
                        <?php
                        foreach ($listSlide as $imgSlide) {
                            ?>
                            <a href="<?php echo $imgSlide['link_slide'] ?>" target="_blank">
                                <img src="img/<?php echo $imgSlide['anh_slide'] ?>" alt=""
                                     class="content__slide-img-main">
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>

            <section class="l-4 col no-pad">
                <div class="content__sale">
                    <div class="content__sale-box">
                        <a href="" class="content__sale-link">
                            <img src="img/fe213f37352801.573d3df297da5.jpg" alt="" class="content__sale-img">
                        </a>
                    </div>
                    <div class="content__sale-box">
                        <a href="" class="content__sale-link">
                            <img src="img/508715_cwnzgmlximpsrlv6njlgg9jpo.jpg" alt="" class="content__sale-img">
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- row sale -->
        <h1 class="content__product-name-event fix">Sale</h1>
        <br>
        <div class="row col row-sale fix">
            <?php
            foreach ($listSale as $rowSale) : ?>
                <section class="l-2 col">
                    <div class="content__product-sale">
                        <a href="detail.php?id=<?= $rowSale['id_sp'] ?>" class="content__product-sale-link">
                            <div class="content__product-sale-box">
                                <img src="img/<?php echo ltrim($rowSale['anh_sp'], ' ') ?>" alt=""
                                     class="content__product-sale-img">
                            </div>
                            <p class="content__product-sale-price">Gi??: <?php echo number_format($rowSale['gia_sp']) ?>
                                ??</p>
                            <span class="content__product-sale-status">Tr???ng th??i:
                                            <?php
                                            if ($rowSale['trang_thai'] >= '1') {
                                                echo 'C??n h??ng';
                                            } else if ($rowSale['trang_thai'] <= '0') {
                                                echo 'H???t h??ng';
                                            }
                                            ?>
                                    </span>
                            </span>
                            <div class="content__product-box-sale">
                                <p class="content__product-box-sale-price"><?php echo $rowSale['giam_gia'] ?>%</p>
                                <p class="content__product-box-sale-txt">Gi???m</p>
                            </div>
                        </a>
                    </div>
                </section>
                <?php endforeach; ?>
        </div>

        <!-- row product -->
        <h1 class="content__product-name-event fix">Top 10 y??u th??ch</h1>
        <div class="row col">
            <?php
            foreach ($luotXem as $row) : ?>
                <section class="l-2 col content__product-general">
                    <div class="content__product-sale">
                        <a href="detail.php?id=<?= $row['id_sp'] ?>" class="content__product-sale-link row__general-product">
                            <div class="content__product-sale-box">
                                <img src="img/<?php echo ltrim($row['anh_sp'], ' ') ?>" alt=""
                                     class="content__product-sale-img">
                            </div>
                            <p class="content__product-sale-name"><?php echo $row['ten_sp'] ?></p>
                            <p class="content__product-general-price">Gi??: <span
                                        class="price_color"><?php echo number_format($row['gia_sp']) ?> ??</span></p>
                            <span class="content__product-general-status">View:
                                        <?php echo $row['luot_xem'] ?>
                                    </span>
                        </a>
                    </div>
                </section>
                <?php endforeach; ?>

        </div>

        <h1 class="content__product-name-event fix">S???n ph???m m???i</h1>
        <div class="row col">
            <?php
            foreach ($sanPhamMoi as $row) : ?>
                <section class="l-2 col content__product-general">
                    <div class="content__product-sale">
                        <a href="detail.php?id=<?= $row['id_sp'] ?>" class="content__product-sale-link row__general-product">
                            <div class="content__product-sale-box">
                                <img src="img/<?php echo ltrim($row['anh_sp'], ' ') ?>" alt=""
                                     class="content__product-sale-img">
                            </div>
                            <p class="content__product-sale-name"><?php echo $row['ten_sp'] ?></p>
                            <p class="content__product-general-price">Gi??: <span
                                        class="price_color"><?php echo number_format($row['gia_sp']) ?> ??</span></p>
                            <span class="content__product-general-status">Tr???ng th??i:
                                        <?php
                                        if ($row['trang_thai'] >= '1') {
                                            echo 'C??n h??ng';
                                        } else if ($row['trang_thai'] <= '0') {
                                            echo 'H???t h??ng';
                                        }
                                        ?>
                                    </span>
                        </a>
                    </div>
                </section>
            <?php endforeach; ?>

        </div>

        <?php require_once 'create_and_login.php' ?>
    </div>
</main>


