<?php
    
    require_once '../../libs/libs.php';
    require_once '../../libs/upload_file.php';

    $listCate = select_danh_muc();
    $sql = 'SELECT id_th, ten_th FROM thuong_hieu';
    $listBrand = select_thuong_hieu($sql);
    $msg = [];
    if(!isset($_GET['id']) && !isset($_GET['id_dm']) && !isset($_GET['th'])){
        header('Location: ../frames_func.php?page_layout=product');
    }
    // get id
    $id = intval($_GET['id']);
    $id_dm = intval($_GET['id_dm']);
    $th = intval($_GET['th']);

    $sql = "SELECT * FROM san_pham WHERE id_sp = $id && id_dm = $id_dm && id_th = $th";
    $field = select_product_follow_id($sql, $id, $id_dm, $th);//truy vấn
    // sửa 
    if(isset($_POST['btnSend'])){      
        $danh_muc = $_POST['danh_muc'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $sale = $_POST['sale'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $status = $_POST['status'];  
        if($_FILES['file']['name'] != ''){
            $target = $target_file;
        }else{
            $target = '';
        }
        // if(!empty($name && $target && $price && $brand && $desc && $status)){
        //     $msg[] =  'Bạn còn để trống dữ liệu !';
        // }
        edit_product($danh_muc, $name, $target, $price, $brand, $sale, $desc, $date, $status, $id);
        header('Location: ../frames_func.php?page_layout=product');
       
    }
?>
    <?php  require_once '../nav_left-part.php'; ?>
            <!-- content main -->
            <div class="wrapper__content">
                <div class="content_header">
                    <h1 class="content__header-name">Quản lý website</h1>
                    <a href="/PHP1/assignment/index.php" class="content__link-logout">
                        Trang Chủ
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

                <!-- box edit product -->
                <div class="content__box">
                    <!-- form edit -->
                    <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                        <h3 class="content__box-product-add-name">Sửa sản phẩm</h3>
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
                                    foreach($listCate as $valueCate){
                                        if($valueCate['id_dm'] == $id_dm){
                                            $selected = "selected";
                                        }else{
                                            $selected = '';
                                        }
                                        ?>
                                            <option value="<?php echo $valueCate['id_dm']?>" <?php echo $selected ?>>
                                                <?php echo $valueCate['ten_dm'] ?>
                                            </option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Tên sản phẩm :</label>
                            <textarea name="name" id="" cols="30" rows="5" class="name-box" ><?php echo $field['ten_sp'] ?></textarea>
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Ảnh sản phẩm :</label>
                            <input type="file" name="file" placeholder="ảnh sp" class="input-file">
                            <img src="../<?php echo ltrim($field['anh_sp'], ' ') ?>" alt="" class="img-old">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Giá sản phẩm :</label>
                            <input type="text" name="price" placeholder="giá sp" class="input-txt" value="<?php echo $field['gia_sp'] ?>" >
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Thương hiệu :</label>
                            <select name="brand" id="" class="select-value">
                                <?php
                                    foreach($listBrand as $valueBrand){
                                        if($valueBrand['id_th'] == $th){
                                            $selected = "selected";
                                        }else{
                                            $selected = '';
                                        }
                                        ?>
                                            <option value="<?php echo $valueBrand['id_th'] ?>" <?php echo $selected ?>>
                                                <?php echo $valueBrand['ten_th'] ?>
                                            </option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Sale :</label>
                            <input type="text" name="sale" placeholder="giảm giá" class="input-txt" value="<?php echo $field['giam_gia'] ?> ">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Bảo hành :</label>
                            <input type="text" name="date" placeholder="bảo hành" class="input-txt" value="<?php echo $field['bao_hanh'] ?>">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Trạng thái :</label>
                            <input type="number" name="status" placeholder="trạng thái" class="input-txt" value="<?php echo $field['trang_thai'] ?>">
                        </div>
                        <div class="content__box-product-add-field editer">
                                <label for="" class="label-editer">Mô tả :</label>
                                <textarea name="desc" id="" cols="30" rows="10" placeholder="mô tả" class="txt-box"><?php echo $field['mo_ta']?></textarea>
                                <script>
                                    CKEDITOR.replace( 'desc' );
                                </script>
                        </div>
                        <div class="content__box-product-add-btn">
                            <button class="content__box-product-btn" name="btnSend">Sửa sản phẩm</button>
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