<?php
    require_once '../../libs/libs.php';
    $msg = [];
    if(isset($_POST['btnAdd'])){
        $acc = $_POST['acc'];
        $pwd = $_POST['pwd'];
        $retype_pwd = $_POST['retype_pwd'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $file = $_FILES['avatar']['name'];
        if(empty($acc && $pwd && $retype_pwd && $name && $email && $file)){
            $msg[] =  'Bạn còn để trống dữ liệu !';
         }
        $temp = $_FILES['file']['tmp_name'];
        move_uploaded_file($temp, '../../img/' . $file);
        if($pwd !== $retype_pwd){
            $msg[] = 'Mật khẩu không khớp';
        }
        if(empty($msg)){
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (account, passwd, name, email, avatar) 
            VALUE ('$acc', '$pwd', '$name', '$email', '$file')";
            add_user($sql, $acc, $pwd, $name, $email, $file);
            header('Location: ../frames_func.php?page_layout=user');
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
                        <h3 class="content__box-product-add-name">Thêm khách hàng</h3>
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
                            <input type="text" name="acc" placeholder="Tên đăng nhập" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Mật khẩu: </label>
                            <input type="password" name="pwd" placeholder="Mật khẩu" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Nhập lại mật khẩu: </label>
                            <input type="password" name="retype_pwd" placeholder="Nhập lại mật khẩu" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Họ tên: </label>
                            <input type="text" name="name" placeholder="Họ tên" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Email: </label>
                            <input type="email" name="email" placeholder="Email" class="input-txt">
                        </div>
                        <div class="content__box-product-add-field">
                            <label for="">Ảnh đại diện: </label>
                            <input type="file" name="avatar" class="input-file">
                        </div>
                        <div class="content__box-product-add-btn" style="width: 452px">
                            <button class="content__box-product-btn" name="btnAdd">Thêm khách hàng</button>
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