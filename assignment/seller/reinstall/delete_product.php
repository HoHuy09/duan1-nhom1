
<?php
    require_once '../../libs/libs.php';

    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=product');
    }

    $id = intval($_GET['id']);
    $sql = "SELECT id_sp FROM san_pham WHERE id_sp = $id";
    $field = select_product_detail_follow_id($sql, $id);   

    $sql_delete = "DELETE FROM san_pham WHERE id_sp = $id";
    delete($sql_delete, $id);
    header("Location: ../frames_func.php?page_layout=product");
    
?>

