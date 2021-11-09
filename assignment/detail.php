<?php
session_start();
$session = isset($_SESSION['user']) ? $_SESSION['user'] : "";
require_once 'user/create_acc.php';
require_once 'user/login.php';
require_once 'libs/libs.php';
//
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th WHERE id_sp = $id";
    $product = select_dmuc($sql);
}
//
$sql = "SELECT * FROM san_pham ORDER BY giam_gia DESC LIMIT 4";
$salesPrdt = select_page($sql);
//
$a = $product['id_dm'];
$b = $product['id_sp'];

$sql = "SELECT * FROM san_pham WHERE  id_dm = '$a' AND id_sp != '$b' LIMIT 6";
$products = select_page($sql);
//
$sql = "SELECT * FROM binh_luan INNER JOIN user ON binh_luan.id_user = user.id_user WHERE id_sp = '$id' ORDER BY id_bl DESC LIMIT 4";
$binhLuan = select_page($sql);
//
$luotXemUD = $product['luot_xem'] + 1;
$sqlUd = "UPDATE san_pham SET luot_xem='$luotXemUD' WHERE id_sp = '$id'";
$conn = pdo_connect();
$stmt = $conn->prepare($sqlUd);
$stmt->execute();
//
if (isset($_POST['btnComment'])) {
    $id_user = $session['id_user'];
    extract($_POST);
    if ($content == "") {
        $err_comment = "Bạn cần nhập vào bình luận";

    }
    $id_sp = $id;
    $dates = date('Y-m-d H:i:s');
    $sql = "INSERT INTO binh_luan (id_user,id_sp,noi_dung,thoi_gian) VALUES ('$id_user','$id_sp','$content','$dates')";
    $conn = pdo_connect();
    $stmt = $conn->prepare($sql);
    if ($id_user != 0) {
        if (!isset($err_comment)) {
            $stmt->execute();
            header("location:" . "/PHP1/assignment" . "/detail.php?id=" . $id . "#comment");
        }
    } else {
        echo "<script>
                alert('Bạn cần đăng nhập để được Bình luận.');
                history.back();
            </script>";
    }
}
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
<main class="wrapper__content content__detail">
    <div class="grid wide">
        <div class="row col content__detail-product">
            <section class="l-5 col">
                <div class="content__product-img-group">
                    <div class="l-12 col content__product-img-main-box">
                        <img src="img/<?php echo ltrim($product['anh_sp'], ' ') ?>" alt=""
                             class="content__product-img-main">
                    </div>
                </div>
            </section>
            <section class="l-7 col">
                <div class="content__product-title-group">
                    <h1 class="content__product-title-name"><?php echo $product['ten_sp'] ?></h1>
                    <p class="content__product-title-brand">Thương hiệu:
                        <?php echo $product['ten_th'] ?>
                    </p>
                    <p class="content__product-title-price">Giá:
                        <span class="price-note"><?php echo number_format($product['gia_sp']) ?> đ</span>
                    </p>
                    <div class="content__product-title-quantity-box">
                        <span class="content__product-title-quantity-title">Số lượng :</span>
                        <input type="number" class="content__product-title-quantity-input" value="1">
                    </div>
                    <div>

                    </div>
                    <div class="content__product-title-grift">
                        <div class="content__product-title-grift-event">
                                    <span class="content__product-title-grift-note">
                                            <i class="fas fa-gift"></i>
                                            Tặng 100.000 đ
                                    </span>
                            mua hàng tại website sShop.vn, áp dụng khi mua Online tại Tp.HCM, Tp. Nha Trang, Tp. Phan
                            Thiết và 1 số khu vực khác.
                        </div>
                        <div class="content__product-title-grift-event">
                                    <span class="content__product-title-grift-note">
                                            <i class="fas fa-gift"></i>
                                            Giảm giá đến 50%
                                    </span>
                            cho những khách hàng sử dụng gói mua sắm tiện tích.
                        </div>
                        <div class="content__product-title-grift-event">
                                    <span class="content__product-title-grift-note">
                                        <i class="fas fa-shipping-fast"></i>
                                        Miễn phí
                                    </span>
                            giao hàng cho những khách hàng với tiền thanh toán lớn hớn 1.000.000 đ trên toàn quốc.
                        </div>
                    </div>
                    <a href="./add_cart.php" class="content__product-title-btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="content__product-title-btn-txt">Chọn mua</span>
                    </a>
                </div>
            </section>
        </div>

        <!-- chi tiết sản phẩm -->
        <div class="row col row-detail-title">
            <section class="l-9 col">
                <div class="content__detail-group">
                    <div class="content__detail-group-box">
                        <h1 class="content__detail-header">CHI TIẾT SẢN PHẨM</h1>
                        <p class="content__detail-brand">
                            <span class="content__detail-title-name">Thương hiệu: </span>
                            <span class="content__detail-main">
                                        <?php echo $product['ten_th'] ?>
                                    </span>
                        </p>
                        <p class="content__detail-date">
                            <span class="content__detail-title-name">Bảo hành: </span>
                            <span class="content__detail-main"><?php echo $product['bao_hanh'] ?></span>
                        </p>
                    </div>
                    <div class="content__detail-group-box2">
                        <h1 class="content__detail-header">MÔ TẢ SẢN PHẨM</h1>
                        <div class="content__detail-name">
                                <span class="content__detail-main-box">
                                    <span class="content__detail-title-name fix-name">Tên sản phẩm:</span>
                                    <?php echo $product['ten_sp'] ?>
                                </span>
                        </div>
                        <div class="content__detail-description">
                            <span class="content__detail-title-des">Mô tả: </span>
                            <p class="content__detail-main"><?php echo $product['mo_ta'] ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="l-3 col">
                <div class="content__sidebar-prod">
                    <ul class="content__sidebar-prod-list">
                        <div class="content__sidebar-prod-list-box">
                            <img src="img/sale.jpg" alt="" width="80px" height="60px">
                            <h2 class="content__sidebar-prod-list-header">Sản phẩm giảm giá</h2>
                        </div>
                        <?php
                        foreach ($salesPrdt as $sale) : ?>
                            <li class="content__sidebar-prod-item">
                                <a href="detail.php?id=<?= $sale['id_sp'] ?>" class="content__sidebar-prod-item-box">
                                    <img src="img/<?php echo ltrim($sale['anh_sp'], ' ') ?>" alt=""
                                         class="content__sidebar-prod-img">
                                    <div class="content__sidebar-prod-item-sub">
                                        <h3 class="content__sidebar-prod-name">
                                            <?php echo $sale['ten_sp'] ?>
                                        </h3>
                                        <span class="content__sidebar-prod-price"> <?php echo number_format($sale['gia_sp']) ?> đ</span>
                                        <span class="content__sidebar-prod-brand">Giảm giá:  <?php echo $sale['giam_gia'] ?>%</span>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </div>


        <!-- danh sách đã comment -->
        <h1 class="content__cmt-header fix">Bình luận sản phẩm</h1>
        <!-- comment -->
        <div class="row col">
            <section class="l-9 col" >
                <div class="content__cmt-box-write">
                    <form action="" class="content__cmt-form" method="POST" id="comment">
                        <div class="content__cmt-form-box">
                            <div class="content__cmt-form-avatar">
                                <img src="img/<?php
                                if (empty($session)) {
                                    echo "avatar.jpg";
                                } else {
                                    echo $session['avatar'];
                                } ?>" alt="" class="content__cmt-form-img">
                            </div>
                            <div class="content__cmt-form-func">
                            <?php
                                if (empty($session)) {
                                    
                                } else {
                                    echo '<textarea name="content" id="" cols="30" rows="10" class="content__cmt-form-txt"
                                    placeholder="viết bình luận"></textarea>
                                <div class="content__cmt-form-group">
                                <button class="content__cmt-form-btn" name="btnComment">Bình luận</button>
                                </div>';
                                } ?>
                                    
                                
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- -->
        <?php foreach ($binhLuan as $comment) : ?>
            <div class="row col box-print-comment" >
                <section class="l-9 col">
                    <div class="content__cmt-box-print">
                        <div class="content__cmt-form-avatar">
                            <img src="img/<?php echo $comment['avatar'] ?>" alt="" class="content__cmt-form-img">
                        </div>
                        <div class="content__cmt-form-info">
                            <a href="" class="content__cmt-form-info-name">
                                <?php echo $comment['name'] ?>
                            </a>
                            <p class="content__cmt-form-info-param">
                                <?php echo $comment['noi_dung'] ?>
                            </p>
                            <div class="content__cmt-form-info-box">
                                                <span class="content__cmt-form-info-date">
                                                    <?php echo $comment['thoi_gian'] ?>
                                                </span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>
        <!-- sản phẩm liên quan -->
        <h1 class="content__product-name-event fix">Các sản phẩm liển quan</h1>
        <div class="row col" style="margin-top: 20px">
            <?php
            foreach ($products as $row) : ?>
                <section class="l-2 col">
                    <div class="content__product-sale">
                        <a href="detail.php?id=<?= $row['id_sp'] ?>"
                           class="content__product-sale-link row__general-product">
                            <div class="content__product-sale-box">
                                <img src="img/<?php echo ltrim($row['anh_sp'], ' ') ?>" alt=""
                                     class="content__product-sale-img">
                            </div>
                            <p class="content__product-sale-name"><?php echo $row['ten_sp'] ?></p>
                            <p class="content__product-general-price">Giá: <span class="price_color">
                                                <?php echo number_format($row['gia_sp']) ?>đ
                                            </span></p>
                            <span class="content__product-general-status">Trạng thái:
                                                <?php
                                                if ($row['trang_thai'] >= '1') {
                                                    echo 'Còn hàng';
                                                } else if ($row['trang_thai'] = '0') {
                                                    echo 'Hết hàng';
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
<?php
require_once 'footer.php';
?>
</body>
</html>