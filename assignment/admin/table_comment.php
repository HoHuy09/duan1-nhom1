<?php
    require_once '../libs/libs.php';
    $sql = "SELECT sp.ten_sp, bl.id_bl,bl.thoi_gian, COUNT(bl.id_sp) as sl, bl.id_sp 
     FROM binh_luan AS bl INNER JOIN san_pham AS sp ON bl.id_sp = sp.id_sp 
     GROUP BY sp.ten_sp ORDER BY bl.id_bl DESC";
    $listCmt = select_all_follow_order($sql);
    
?>

            <!-- content main -->
            <div class="wrapper__content">
                <!-- header -->
                <div class="content_header">
                    <h1 class="content__header-name">Quản lý website</h1>
                    <a href="/duan1-nhom1/assignment/index.php" class="content__link-logout">
                        Trang Chủ
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

                <!-- content -->
                <div class="content__box">
                    <div class="content__box-product ">
                        <h3 class="content__box-header">Tổng hợp bình luận</h3>
                        
                        <!-- <a href="category/add_category.php" class="content__box-add">Thêm danh mục</a> -->
                        <table class="content__box-product-table"> 
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thời gian</th>
                                <th>Chức năng</th>
                            </tr>
                            
                            <?php
                                foreach($listCmt as $cmt){
                                    $detail = 'comment/detail_cmt.php?id_bl=' . $cmt['id_bl'] . '&id_sp=' . $cmt['id_sp'];
                                    ?>
                                        <tr>
                                            <td><?php echo $cmt['id_bl'] ?></td>
                                            <td><?php echo $cmt['ten_sp'] ?></td>
                                            <td><?php echo $cmt['sl'] ?></td>
                                            <td><?php echo $cmt['thoi_gian'] ?></td>
                                            <td class="td-function">
                                                <a href="<?php echo $detail ?>" class="link-function btn-repair">Chi tiết</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        
                        </table>
                    </div>
                </div>
                <!-- footer -->
                <div class="content__footer">
                    <span class="content__footer-txt">&copy; huyhtph07087 Full-Stack - in the near future</span>
                </div>
           </div>
        </div>
        
    </div>

    <script src="../js/delete.js"></script>
</body>
</html>
