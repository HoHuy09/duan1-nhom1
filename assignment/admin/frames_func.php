<?php
session_start();
$session = isset($_SESSION['user']) ? $_SESSION['user'] : "";
if (empty($session) || $session['roles'] != 1) {
    header("location:" . "/PHP1/assignment" . "/admin/login.php");
}
require_once 'nav_left.php';
$page_layout = isset($_GET['page_layout']) ? $_GET['page_layout'] : '';

switch ($page_layout) {
    case 'category':
        require_once 'table_category.php';
        break;
    case 'product':
        require_once 'table_product.php';
        break;
    case 'slide':
        require_once 'table_slide.php';
        break;
    case 'brand':
        require_once 'table_brand.php';
        break;
    case 'user':
        require_once 'table_user.php';
        break;
    case 'comment':
        require_once 'table_comment.php';
        break;
    default:
        require_once 'setting.php';
        break;
}

?>