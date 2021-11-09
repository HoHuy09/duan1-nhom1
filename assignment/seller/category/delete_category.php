<?php
    require_once '../../libs/libs.php';

    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=category');
    }

    $id = intval($_GET['id']);
    $sql = "SELECT id_dm FROM danh_muc WHERE id_dm = $id";
    $field = select_product_detail_follow_id($sql, $id);   

    $sql_delete = "DELETE FROM danh_muc WHERE id_dm = $id";
    delete($sql_delete, $id);
    header("Location: ../frames_func.php?page_layout=category");
    
?>