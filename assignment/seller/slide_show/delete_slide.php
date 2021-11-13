
<?php
    require_once '../../libs/libs.php';

    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=slide');
    }

    $id = intval($_GET['id']);
    $sql = "SELECT id_slide FROM slide WHERE id_slide = $id";
    $field = select_product_detail_follow_id($sql, $id);   

    $sql_delete = "DELETE FROM slide WHERE id_slide = $id";
    delete($sql_delete, $id);
    header("Location: ../frames_func.php?page_layout=slide");
    
?>
