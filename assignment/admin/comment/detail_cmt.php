<?php
    require_once '../../libs/libs.php';
    if(!isset($_GET['id_bl']) && !isset($_GET['id_sp'])){
        header('Location: ../frames_func.php?page_layout=comment');
    }
    $id = intval($_GET['id_bl']);
    $id_sp = intval($_GET['id_sp']);
    $sql = "SELECT u.name, bl.noi_dung, bl.thoi_gian, bl.id_bl, bl.id_sp FROM binh_luan AS bl 
    INNER JOIN user AS u ON bl.id_user = u.id_user WHERE bl.id_bl = '$id' || bl.id_sp = '$id_sp'";
    $detailCmt = detail_cmt($sql, $id, $id_sp);
?>
        <?php require_once '../nav_left-part.php'?>
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
                        <h3 class="content__box-header">Chi tiết bình luận</h3>
                        <table class="content__box-product-table"> 
                            <tr>
                                <th>STT</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Người bình luận</th>
                                <th>Chức năng</th>
                            </tr>
                                                       
                            <?php
                                foreach($detailCmt as $cmt){
                                    $deleteCmt = 'delete_cmt.php?id_bl=' . $cmt['id_bl'] . '&id_sp=' . $id_sp; 
                                    ?>
                                        <tr>
                                            <td><?php echo $cmt['id_bl'] ?></td>
                                            <td><?php echo $cmt['noi_dung'] ?></td>
                                            <td><?php echo $cmt['thoi_gian'] ?></td>
                                            <td><?php echo $cmt['name'] ?></td>
                                            <td class="td-function">
                                                <a onclick="return del('<?php echo $cmt['noi_dung']; ?>')" href="<?php echo $deleteCmt ?>" class="link-function btn-repair">Xóa</a>
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

    <script src="../../js/delete.js"></script>
</body>
</html>
