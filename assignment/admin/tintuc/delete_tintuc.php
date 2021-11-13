<?php
    require_once '../../libs/libs.php';
    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=user');
    }
    $id = intval($_GET['id']);
    $sql = "SELECT id_user FROM user WHERE id_user = $id";
    $field = select_product_detail_follow_id($sql, $id);   
    $sql_delete = "DELETE FROM user WHERE id_user = $id";
    delete($sql_delete, $id);
    header("Location: ../frames_func.php?page_layout=user");
    
?>