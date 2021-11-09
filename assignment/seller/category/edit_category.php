<?php
    require_once '../../libs/libs.php';
    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=category');
    }
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM danh_muc WHERE id_dm = '$id'";
    $field = select_danh_muc_fllow_id($sql,$id);

    // sửa 
    if(isset($_POST['btnEdit'])){
        $name = $_POST['name'];
        $sql = "UPDATE danh_muc SET ten_dm = '$name' WHERE id_dm = '$id'";
        edit_category($sql, $id);
        header('Location: ../frames_func.php?page_layout=category');
    }
?>
       <?php require_once '../nav_left-part.php'; ?>
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
                        <!-- form edit -->
                        <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                            <h3 class="content__box-product-add-name">Sửa danh mục</h3>
                            <div class="content__box-product-add-field">
                                <label for="">Danh mục :</label>
                                <input type="text" name="name" class="input-txt" value="<?php echo $field['ten_dm'] ?>">
                            </div>
                            <div class="content__box-product-add-btn" style="width: 552px">
                                <button class="content__box-product-btn" name="btnEdit">Sửa danh mục</button>
                            </div>
                        </form>
                </div>

                 <!-- footer -->
                <div class="content__footer">
                    <span class="content__footer-txt">&copy; huyhtph07087 Full-Stack - in the near future</span>
                </div>
           </div>
        </div>
        
    </div>

    <script src="js/setting.js"></script>
</body>
</html>