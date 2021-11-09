<?php
    require_once '../../libs/libs.php';
    require_once '../../libs/upload_file.php';

    if(!isset($_GET['id'])){
        header('Location: ../table_slide.php');
    }

    $idSlide = intval($_GET['id']);
    $field = select_slide_follow_id($idSlide);

    // sửa 
    if(isset($_POST['btnSend'])){
        $name = $_POST['name'];
        $link = $_POST['link'];   
            
        if($_FILES['file']['name'] != ''){
            $file = $target_file;
        }else{
            $file = '';
        }
        edit_slide($name, $file, $link, $idSlide);
        header('Location: ../frames_func.php?page_layout=slide');
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
                    <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                        <h3 class="content__box-product-add-name">Sửa slide</h3>
                        <div class="content__box-product-add-field">
                            <label for="">Tên slide :</label>
                            <input type="text" name="name" placeholder="tên slide" class="input-txt" value="<?php echo $field['ten_slide'] ?>">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Ảnh slide :</label>
                            <input type="file" name="file" placeholder="ảnh sp" class="">
                            <img src="../<?php echo $field['anh_slide'] ?>" alt="" class="img-slide-edit">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Đường link :</label>
                            <textarea name="link" id="" cols="30" rows="5" class="name-box"> <?php echo $field['link_slide'] ?> </textarea>
                        </div>
                        <div class="content__box-product-add-btn">
                            <button class="content__box-product-btn" name="btnSend">Sửa slide</button>
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