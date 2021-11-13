<?php 
    require_once '../libs/libs.php';
    $sql = 'SELECT sp.id_sp, sp.id_dm, sp.id_th, sp.ten_sp, sp.anh_sp, sp.gia_sp, sp.giam_gia, 
    sp.bao_hanh, sp.trang_thai, th.ten_th FROM san_pham AS sp 
    INNER JOIN thuong_hieu AS th ON sp.id_th = th.id_th ORDER BY sp.id_sp DESC';
    $list = select_all_product($sql);
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
                        <h3 class="content__box-header">Danh sách sản phẩm</h3>
                        
                        <a href="reinstall/add_product.php" class="content__box-add">Thêm sản phẩm</a>
                        
                        <!-- bản hiện thị sản phẩm -->
                        <table class="content__box-product-table">
                            <!-- Tiêu đề thông tin sản phẩm -->
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá sp</th>
                                <th class="th-brand">Thương hiệu</th>
                                <th>Sale</th>
                                <th>Bảo hành</th>
                                <!-- <th>Mô tả</th> -->
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>

                            <!-- lặp các thông tin sản phẩm -->
                            <?php
                                foreach($list as $row){
                                    //link theo id, dm, th
                                    $delete = 'reinstall/delete_product.php?id=' . $row['id_sp'] ;
                                    $edit = 'reinstall/repair_product.php?id=' . $row['id_sp'] . '&id_dm=' . $row['id_dm'] . '&th=' . $row['id_th'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id_sp'] ?></td>
                                            <td class="td-name"><?php echo $row['ten_sp'] ?></td>
                                            <td class="td-img"><img src="<?php echo $row['anh_sp'] ?>" alt=""></td>
                                            <td><?php echo number_format($row['gia_sp']) ?>đ</td>
                                            <td><?php echo $row['ten_th'] ?></td>
                                            <td><?php echo $row['giam_gia'] ?>%</td>
                                            <td><?php echo $row['bao_hanh'] ?></td>
                                            <!-- <td class="td-desc"></td> -->
                                            <td>
                                                <?php
                                                    if($row['trang_thai'] >= '1'){
                                                    echo 'Còn hàng';
                                                    }else if($row['trang_thai'] <= '0'){
                                                        echo 'Hết hàng';
                                                    }
                                                ?>
                                            </td>
                                            <td class="td-function">
                                                <a href="<?php echo $edit ?>" class="link-function btn-repair">Sửa</a>
                                                <a onclick="return del('<?php echo $row['ten_sp']; ?>')" href="<?php echo $delete ?>" class="link-function btn-delete" name="btnDelete">Xóa</a>
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
