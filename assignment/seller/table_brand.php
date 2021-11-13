<?php
    require_once '../libs/libs.php';
    $sql = 'SELECT * FROM thuong_hieu ORDER BY id_th DESC';
    $listBrand = select_page($sql);
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
                        <h3 class="content__box-header">Danh sách thương hiệu</h3>
                        
                        <a href="brand/add_brand.php" class="content__box-add">Thêm thương hiệu</a>
                        
                        <!-- bảng hiện thị thương hiệu -->
                        <table class="content__box-product-table">
                            <!-- Tiêu đề thông tin thương hiệu -->
                            <tr>
                                <th>STT</th>
                                <th>Tên thương hiệu</th>
                                <th>Chức năng</th>
                            </tr>

                            <!-- lặp các thông tin sản phẩm -->
                            <?php
                                foreach($listBrand as $brand){
                                    //link theo id, dm, th
                                    $delete = 'brand/delete_brand.php?id=' . $brand['id_th'] ;
                                    $edit = 'brand/edit_brand.php?id=' . $brand['id_th'];
                                    ?>
                                        <tr>
                                            <td width="100px"><?php echo $brand['id_th'] ?></td>
                                            <td class="td-name" width><?php echo $brand['ten_th'] ?></td>
                                            <td class="td-function" width="200px">
                                                <a href="<?php echo $edit ?>" class="link-function btn-repair" style="margin-right: 20px;">Sửa</a>
                                                <a onclick="return del('<?php echo $brand['ten_th']; ?>')" href="<?php echo $delete ?>" class="link-function btn-delete" name="btnDelete">Xóa</a>
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
