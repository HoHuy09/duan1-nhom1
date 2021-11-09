<?php
    require_once '../../libs/libs.php';

    if(!isset($_GET['id_bl']) && !isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=comment');
    }
    $id = intval($_GET['id_bl']);
    $id_sp = intval($_GET['id_sp']);
    $sql = "SELECT id_bl, id_sp FROM binh_luan WHERE id_bl = $id && id_sp = $id_sp";
    $field = select_fetch_3($sql, $id, $id_sp);   
    var_dump($field);
    $sql = "DELETE FROM binh_luan WHERE id_bl = $id && id_sp = $id_sp";
    delete_3($sql, $id, $id_sp);
    header("Location: ../frames_func.php?page_layout=comment");
    
?>