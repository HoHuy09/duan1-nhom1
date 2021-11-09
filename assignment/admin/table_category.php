<?php
    require_once '../libs/libs.php';
    $list = select_danh_muc();
    
?>

            <!-- content main -->
            <div class="wrapper__content">
                <!-- header -->
                <div class="content_header">
                    <h1 class="content__header-name">Quản lý website</h1>
                    <a href="/PHP1/assignment/index.php" class="content__link-logout">
                        Trang Chủ
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

                <!-- content -->
                <div class="content__box">
                    <div class="content__box-product ">
                        <h3 class="content__box-header">Các danh mục</h3>
                        
                        <a href="category/add_category.php" class="content__box-add">Thêm danh mục</a>
                        <table class="content__box-product-table"> 
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                            
                            <?php
                                foreach($list as $row){
                                    $delete = 'category/delete_category.php?id=' . $row['id_dm'];
                                    $edit = 'category/edit_category.php?id=' . $row['id_dm'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id_dm'] ?></td>
                                            <td><?php echo $row['ten_dm'] ?></td>
                                            <td class="td-function">
                                                <a href="<?php echo $edit ?>" class="link-function btn-repair">Sửa</a>
                                                <a onclick="return del('<?php echo $row['ten_dm']; ?>')" href="<?php echo $delete ?>" class="link-function btn-delete" name="btnDelete">Xóa</a>
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
