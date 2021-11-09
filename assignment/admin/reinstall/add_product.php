<?php 
        
        require_once '../../libs/libs.php';
        require_once '../../libs/upload_file.php';
       
        $listCate = select_danh_muc();  

        $sql = 'SELECT id_th, ten_th FROM thuong_hieu';
        $listBrand = select_thuong_hieu($sql);
        $msg = [];
        if(isset($_POST['btnSend'])){
            $danh_muc = $_POST['danh_muc'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $brand = $_POST['brand'];
            $sale = $_POST['sale'];
            $desc = $_POST['desc'];
            $date = $_POST['date'];
            $status = $_POST['status'];                     
            $target = $target_file;           
            if(empty($name && $target && $price && $brand && $desc && $status)){
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
                add_product($danh_muc, $name, $target, $price, $brand, $sale, $desc, $date, $status);
                header('Location: ../frames_func.php?page_layout=product');
            }
         }

?>

    <?php  require_once '../nav_left-part.php'; ?>
    
            <!-- content right -->
            <div class="wrapper__content">
                <!-- header -->
                <div class="content_header">
                    <h1 class="content__header-name">Quản lý website</h1>
                    <a href="/PHP1/assignment/index.php" class="content__link-logout">
                        Trang Chủ
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
                
                <!-- form add info product -->
                <div class="content__box">
                    <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                        <h3 class="content__box-product-add-name">Thêm sản phẩm</h3>
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
                            <label for="">Danh mục :</label>
                            <select name="danh_muc" id="" class="select-value">
                                <?php 
                                    foreach($listCate as $value){
                                        ?>
                                            <option value="<?php echo $value['id_dm'] ?>"><?php echo $value['ten_dm'] ?></option>
                                        <?php
                                    }
                                ?>

                            </select>
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Tên sản phẩm :</label>
                            <textarea name="name" id="" cols="30" rows="5" class="name-box"></textarea>
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Ảnh sản phẩm :</label>
                            <input type="file" name="file" placeholder="ảnh sp" class="input-file">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Giá sản phẩm :</label>
                            <input type="text" name="price" placeholder="giá sp" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Thương hiệu :</label>
                            <select name="brand" id="" class="select-value">
                                <?php 
                                    foreach($listBrand as $value){
                                        ?>
                                            <option value="<?php echo $value['id_th'] ?>"><?php echo $value['ten_th'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Sale :</label>
                            <input type="number" name="sale" placeholder="giảm giá" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Bảo hành :</label>
                            <input type="text" name="date" placeholder="bảo hành" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Trạng thái :</label>
                            <input type="number" name="status" placeholder="trạng thái" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field editer">
                            <label for="" class="label-editer">Mô tả :</label>
                            <textarea name="desc" id="" cols="30" rows="10" placeholder="mô tả" class="txt-box"></textarea>
                            <script>
                                CKEDITOR.replace( 'desc' );
                            </script>
                        </div>
                        <div class="content__box-product-add-btn">
                            <button class="content__box-product-btn" name="btnSend">Thêm sản phẩm</button>
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
