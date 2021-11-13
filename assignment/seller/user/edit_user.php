<?php
    require_once '../../libs/libs.php';
   
    if(!isset($_GET['id'])){
        header('Location: ../frames_func.php?page_layout=category');
    }
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM user WHERE id_user = $id";
    $recordUser = select_product_detail_follow_id($sql, $id);
   
    $msg = [];
    if(isset($_POST['btnAdd'])){
        $acc = $_POST['acc'];
        $pwd = $_POST['pwd'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $file = $_FILES['avatar']['name'];
        if($_FILES['avatar']['name'] != ''){
            $temp = $_FILES['file']['tmp_name'];
            $target = move_uploaded_file($temp, '../../img/' . $file);
        }else{
            $target = '';
        }
        $roles = $_POST['roles'];
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        edit_user($acc, $pwd, $name, $email, $target, $id ,$roles);
        header('Location: ../frames_func.php?page_layout=user');
        //}
     }
?>
<?php  require_once '../nav_left-part.php'; ?>
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
                    <!-- form add -->
                    <form action="" class="content__box-product-add" method="POST" enctype="multipart/form-data">
                        <h3 class="content__box-product-add-name">Sửa thông tin khách hàng</h3>
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
                            <label for="">Tên đăng nhập: </label>
                            <input type="text" name="acc" placeholder="Tên đăng nhập" class="input-txt" value="<?php echo $recordUser['account']?>">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Mật khẩu: </label>
                            <input type="password" name="pwd" placeholder="Mật khẩu" class="input-txt" value="<?php echo $recordUser['passwd']?>" required>
                        </div>
                        <!-- <div class="content__box-product-add-field">
                            <label for="">Nhập lại mật khẩu: </label>
                            <input type="password" name="retype_pwd" placeholder="Nhập lại mật khẩu" class="input-txt" required>
                        </div> -->
                        <div class="content__box-product-add-field">
                            <label for="">Họ tên: </label>
                            <input type="text" name="name" placeholder="Họ tên" class="input-txt" value="<?php echo $recordUser['name']?>">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Email: </label>
                            <input type="email" name="email" placeholder="Email" class="input-txt" value="<?php echo $recordUser['email']?>">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Ảnh đại diện: </label>
                            <input type="file" name="avatar" class="input-file">
                            <img src="../../img/<?php echo $recordUser['avatar']?>" alt="" width="100px" height="100px" style="margin: 20px 0 0 251px; border: 1px solid #bbb;">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="roles">
                            <label class="form-check-label" for="inlineCheckbox1">Admin</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="0" name="roles">
                            <label class="form-check-label" for="inlineCheckbox2">Khách hàng</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="2" name="roles">
                            <label class="form-check-label" for="inlineCheckbox2">Seller</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="3" name="roles">
                            <label class="form-check-label" for="inlineCheckbox2">PostMan</label>
                        </div>
                        <div class="content__box-product-add-btn" style="width: 452px">
                            <button class="content__box-product-btn" name="btnAdd">Sửa thông tin</button>
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