<?php
    
    require_once '../../libs/libs.php';
    $msg = [];
    if(isset($_POST['btnAdd'])){
        $name = $_POST['name'];
        if(empty($name)){
            $msg[] =  'Bạn còn để trống dữ liệu !';
        }
        if(empty($msg)){
            $sql = "INSERT INTO thuong_hieu (ten_th) VALUE ('$name')";
            add_category($sql, $name);
            header('Location: ../frames_func.php?page_layout=brand');
        }
     }
?>
<?php  require_once '../nav_left-part.php'; ?>
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
                    <!-- form add -->
                    <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                        <h3 class="content__box-product-add-name">Thêm thương hiệu</h3>
                        <?php
                            if(!empty($msg)){
                                ?>
                                <p class="msg-err">
                                    <span class="msg-err-txt"><?php echo implode('', $msg) ?></span>
                                </p>
                                <?php
                            }
                        ?>
                        <div class="content__box-product-add-field">
                            <label for="">Tên thương hiệu: </label>
                            <input type="text" name="name" placeholder="Tên thương hiệu" class="input-txt">
                        </div>
                        <div class="content__box-product-add-btn" style="width: 452px">
                            <button class="content__box-product-btn" name="btnAdd">Thêm thương hiệu</button>
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