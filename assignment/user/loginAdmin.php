<?php
if(isset($_POST['btn_login'])){
    $acc = $_POST['acc'];
    $pwd = $_POST['pwd'];

    try{
        $userInfo = user_login($acc);
        if(empty($userInfo)){
            echo '<script>alert("Tài khoản không tồn tại")</script>';
        }else{
            if(password_verify($pwd, $userInfo['passwd'])){
                $_SESSION['user'] = $userInfo;
                echo '<script>alert("Đăng nhập thành công")</script>';
                header('Location:frames_func.php');
            }else{
                echo '<script>alert("Mật khẩu không chính xác")</script>';
            }
        }
    }catch(PDOException $e){
        die("Lỗi kết nối" .$e->getMessage());
    }
}
?>