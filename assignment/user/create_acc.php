<?php
    require_once 'libs/libs.php';
    
    $msg = [];
    if(isset($_POST['btn-create'])){
       $acc = $_POST['acc'];
       $pwd = $_POST['pwd'];
       $retype_pwd = $_POST['retype_pwd'];
       $name = $_POST['name'];
       $email = $_POST['email'];
       $roles = $_POST['roles'];
       $file = $_FILES['file']['name'];
       if(empty($acc && $pwd && $retype_pwd && $name && $email && $file)){
           $msg[] = '<script> alert("Bạn chưa điền đầy đủ thông tin") </script>';
        }
        $temp = $_FILES['file']['tmp_name'];
        move_uploaded_file($temp, 'img/' . $file);
       if($pwd !== $retype_pwd){
        $msg[] = '<script> alert("Mật khẩu không khớp") </script>';
       }
       if(empty($msg)){
            user_create_acc($acc, $pwd, $name, $email, $file, $roles);
       }
    }
?>