<?php
    require_once '../libs/libs.php';
    $sql = 'SELECT * FROM user ORDER BY id_user DESC';
    $listUser = select_all_follow_order($sql);
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
                        <h3 class="content__box-header">Danh sách khách hàng</h3>
                        <table class="content__box-product-table">
                            <!-- Tiêu đề thông tin khách hàng -->
                            <tr>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Ảnh đại diện</th>
                                <th>Phân quyền</th>
                                <th>Chức năng</th>
                            </tr>

                            <!-- lặp các thông tin khách hàng -->
                            <?php
                                foreach($listUser as $user){
                                    //link theo id, dm, th
                                    $delete = 'user/delete_user.php?id=' . $user['id_user'] ;
                                    $edit = 'user/edit_user.php?id=' . $user['id_user'];
                                    ?>
                                        <tr>
                                            <td width="100px"><?php echo $user['id_user'] ?></td>
                                            <td class="td-name"><?php echo $user['account'] ?></td>
                                            <td class="td-name"><?php echo $user['name'] ?></td>
                                            <td class="td-name"><?php echo $user['email'] ?></td>
                                            <td class="td-name">
                                                <img src="../img/<?php echo $user['avatar'] ?>" alt="" width="100px" height="100px">
                                            </td>
                                            <td class="td-name">
                                                <?php if ($user['roles'] == 1) {
                                                    echo "Admin";
                                                } elseif($user['roles'] == 0) {
                                                    echo "Khách hàng";
                                                } elseif($user['roles'] == 2) {
                                                    echo "Seller";
                                                } ?>
                                            </td>
                                            <td class="td-function" width="200px">
                                                <a href="<?php echo $edit ?>" class="link-function btn-repair" style="margin-right: 20px;">Sửa</a>
                                                <a onclick="return del('<?php echo $user['account']; ?>')" href="<?php echo $delete ?>" class="link-function btn-delete" name="btnDelete">Xóa</a>
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
