<?php 
    require '../libs/libs.php';
    require 'nav_left.php';
    $sql = 'SELECT * FROM slide ORDER BY id_slide DESC';
    $listSlide = select_all_follow_order($sql);
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
                        <h3 class="content__box-header">Ảnh slide</h3>
                        
                        <a href="slide_show/add_slide.php" class="content__box-add">Thêm slide</a>
                        <table class="content__box-product-table"> 
                            <tr>
                                <th>STT</th>
                                <th>Ảnh slide</th>
                                <th>Tên slide</th>
                                <th>Đường link</th>
                                <th>Chức năng</th>
                            </tr>
                            
                            <?php
                                foreach($listSlide as $rowSlide){
                                    $delete = 'slide_show/delete_slide.php?id=' . $rowSlide['id_slide'];
                                    $edit = 'slide_show/edit_slide.php?id=' . $rowSlide['id_slide'];
                                    ?>
                                        <tr>
                                            <td><?php echo $rowSlide['id_slide'] ?></td>
                                            <td class="td-img-slide">
                                                <img src="<?php echo $rowSlide['anh_slide'] ?>" alt="" class="img-slide">
                                            </td>
                                            <td><?php echo $rowSlide['ten_slide'] ?></td>
                                            <td><?php echo $rowSlide['link_slide'] ?></td>
                                            <td class="td-function">
                                                <a href="<?php echo $edit ?>" class="link-function btn-repair" style="margin-right: 20px;">Sửa</a>
                                                <a onclick="return del('<?php echo $rowSlide['ten_slide']; ?>')" href="<?php echo $delete ?>" class="link-function btn-delete" name="btnDelete">Xóa</a>
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
