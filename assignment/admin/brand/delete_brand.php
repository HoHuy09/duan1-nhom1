<?php
    require_once '../../libs/libs.php';

    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=brand');
    }
    $id = intval($_GET['id']);
    $sql = "SELECT id_th FROM thuong_hieu WHERE id_th = $id";
    $field = select_product_detail_follow_id($sql, $id);   

    $sql_delete = "DELETE FROM thuong_hieu WHERE id_th = $id";
    delete($sql_delete, $id);
    header("Location: ../frames_func.php?page_layout=brand");
    
?>