<?php
    
    require_once '../../libs/libs.php';
    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=brand');
    }
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM thuong_hieu WHERE id_th = '$id'";
    $brand = select_danh_muc_fllow_id($sql,$id);

    // sửa 
    if(isset($_POST['btnEdit'])){
       $name = $_POST['name'];
       $sql = "UPDATE thuong_hieu SET ten_th = '$name' WHERE id_th = '$id'";
        edit_category($sql, $id);
        header('Location: ../frames_func.php?page_layout=brand');
    }
?>

       <?php require_once '../nav_left-part.php'; ?>
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
                        <!-- form edit -->
                        <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                            <h3 class="content__box-product-add-name">Sửa thương hiệu</h3>
                            <div class="content__box-product-add-field">
                                <label for="">Danh mục</label>
                                <input type="text" name="name" class="input-txt" value="<?php echo $brand['ten_th'] ?>">
                            </div>
                            <div class="content__box-product-add-btn" style="width: 452px">
                                <button class="content__box-product-btn" name="btnEdit">Sửa thương hiệu</button>
                            </div>
                        </form>
                </div>

                 <!-- footer -->
                <div class="content__footer">
                    <span class="content__footer-txt">&copy; daonltph07885 Full-Stack - in the near future</span>
                </div>
           </div>
        </div>
        
    </div>

    <script src="js/setting.js"></script>
</body>
</html>