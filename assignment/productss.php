<?php
session_start();
$session = isset($_SESSION['user']) ? $_SESSION['user'] : "";
require_once 'libs/libs.php';
require_once 'user/create_acc.php';
require_once 'user/login.php';
//
if (isset($_GET['th'])) {
    $id = $_GET['th'];
    $sql = "SELECT * FROM san_pham   where id_th = '$id'";
} else {
    $value = isset($_GET['search-box']) ? $_GET['search-box'] : "";
    $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th WHERE 
                        ten_sp like '%$value%'
                        OR gia_sp LIKE '%$value%' 
                        OR mo_ta LIKE '%$value%'
                        ";

}
$result = select_page($sql);
//
if (!empty($id)) {
    $sql = "SELECT * FROM thuong_hieu where id_th = '$id'";
}
$danhMuc = select_dmuc($sql);
//
$sql = "SELECT * FROM thuong_hieu";
$thuongHieu = select_page($sql);
//
$sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th ORDER BY luot_xem desc limit 6";
$view = select_page($sql);


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
?>
<main class="wrapper__content">
    <div class="grid wide">
        <div class="row col box2">
            <section class="l-3 col">
                <!-- sản phẩm thịnh hành -->
                <ul class="content__sidebar-prod-list">
                    <h2 class="content__sidebar-list-header">Sản phẩm nổi bật</h2>
                    <hr>
                    <?php foreach ($view as $prdView) : ?>
                        <li class="content__sidebar-prod-item">
                            <a href="detail.php?id=<?= $prdView['id_sp'] ?>" class="content__sidebar-prod-item-box">
                                <img src="img/<?php echo ltrim($prdView['anh_sp'], ' ') ?>" alt=""
                                     class="content__sidebar-prod-img">
                                <div class="content__sidebar-prod-item-sub">
                                    <h3 class="content__sidebar-prod-name">
                                        <?php echo $prdView['ten_sp'] ?>
                                    </h3>
                                    <span class="content__sidebar-prod-price"><?php echo number_format($prdView['gia_sp']) ?> đ</span>
                                    <span class="content__sidebar-prod-brand">
                                                       Thương hiệu: <?php echo $prdView['ten_th'] ?>
                                                    </span>
                                </div>
                            </a>
                        </li>
                        <br>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="l-9 col">
                <!-- nav btn trạng thái -->
                <h1 style="font-size: 30px; padding: 10px; background-color: white;"><?php if (empty($id)) {
                        echo "Tất cả sản phẩm";
                    } else {
                        echo $danhMuc["ten_th"];
                    }
                    ?></h1>
                <div class="trend">
                    <div class="row col content__list-product-group">
                        <?php
                        foreach ($result as $rowPhone) : ?>
                            <div class="l-4 col box-product">
                                <a href="detail.php?id=<?= $rowPhone['id_sp'] ?>" class="content__list-product">
                                    <div class="content__list-product-box">
                                        <img src="img/<?php echo ltrim($rowPhone['anh_sp'], ' ') ?>" alt=""
                                             class="content__list-product-img">
                                    </div>
                                    <div class="content__list-product-info">
                                        <h1 class="content__list-product-name"><?php echo $rowPhone['ten_sp'] ?></h1>
                                        <div class="content__list-product-price">
                                                            <span class="content__list-product-price-old">
                                                                Giá:<span
                                                                        class="content__list-product-price-old-number"></span>
                                                            </span>
                                            <span class="content__list-product-price-new"><?php echo number_format($rowPhone['gia_sp']) ?> đ</span>
                                        </div>
                                        <p class="content__list-product-status">Trạng thái:
                                            <?php
                                            if ($rowPhone['trang_thai'] >= '1') {
                                                echo 'Còn hàng';
                                            } else if ($rowPhone['trang_thai'] <= '0') {
                                                echo 'Hết hàng';
                                            }
                                            ?>
                                        </p>
                                        
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="new">
                </div>
            </section>
        </div>

        <?php require_once 'create_and_login.php' ?>
    </div>
</main>
<?php
require_once 'footer.php';
?>
</body>
</html>
