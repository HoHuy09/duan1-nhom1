<?php
        require_once '../../libs/libs.php';
        require_once '../../libs/upload_file.php';
        $msg = [];
        if(isset($_POST['btnSend'])){
            $name = $_POST['name'];
            $link = $_POST['link'];
            $file = $target_file;

            if(empty($name && $file && $link)){
                $msg[] =  'Bạn còn để trống dữ liệu !';
            }
            $file_type_allow = ['jpg', 'jpeg', 'png', 'gif'];
            if(!in_array(strtolower($file_type), $file_type_allow)){
                $msg['fileUpload'] = 'chỉ được upload file ảnh';
            }
            if(file_exists($target_file)){
                $msg['fileUpload'] = 'file đã tồn tại trên hệ thống';
            }
            if(empty($msg)){
                $sql = "INSERT INTO slide (ten_slide, anh_slide, link_slide) VALUES('$name', '$file', '$link')";
                add_slide($sql, $name, $file, $link);
                header('Location: ../frames_func.php?page_layout=slide');
            }           
         }

?>

         <?php    require_once '../nav_left-part.php'; ?>
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
                    <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                        <h3 class="content__box-product-add-name">Thêm slide</h3>
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
                            <label for="">Tên slide</label>
                            <input type="text" name="name" placeholder="tên slide" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Ảnh slide</label>
                            <input type="file" name="file" placeholder="ảnh sp" class="input-file">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Đường link</label>
                            <textarea name="link" id="" cols="30" rows="5" class="name-box" placeholder="Đường link"></textarea>
                        </div>
                        <div class="content__box-product-add-btn" style="width: 452px">
                            <button class="content__box-product-btn" name="btnSend">Thêm slide</button>
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
