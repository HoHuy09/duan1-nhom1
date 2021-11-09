<?php 
	if(isset($_POST['btnSend'])){
		$msg = [];
		$target_dir = '../img/';
		$target_file = $target_dir.basename($_FILES['file']['name']);
        
		if($_FILES['file']['type'] > 5242880){
			$msg['fileUpload'] = 'File chỉ được dưới 5mb';
		}

		$file_type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$file_type_allow = ['jpg', 'jpeg', 'png', 'gif'];

		if(!in_array(strtolower($file_type), $file_type_allow)){
			$msg['fileUpload'] = 'chỉ được upload file ảnh';
		}

		if(file_exists($target_file)){
			$msg['fileUpload'] = 'file đã tồn tại trên hệ thống';
		}
      
		if(empty($msg)){
			move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
		}else{
			echo 'that bai';
		}
	}

 ?>

