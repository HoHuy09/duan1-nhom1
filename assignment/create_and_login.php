 <!-- form login -->
 <div class="content__form">
            <form action="" class="content__form-box-login" method="POST">
                <i class="fas fa-times icon-close"></i>
                <h1 class="content__form-header">Đăng nhập tài khoản ?</h1>
                <div class="content__form-field">
                    <label for="" class="content__form-field-header">Tài khoản ?</label>
                    <input type="text" class="content__form-input" placeholder="Tài khoản" name="acc">
                </div>
                <div class="content__form-field">
                    <label for="" class="content__form-field-header">Mật khẩu</label>
                    <input type="password" class="content__form-input" placeholder="Mật khẩu" name="pwd">
                </div>
                
                <div class="content__form-btn">
                    <button class="content__form-btn-login" name="btn-login">Đăng nhập</button>
                </div>
            </form>
        </div>

        <!-- form create account -->
        <div class="content__form form-create">                  
            <form action="" class="content__form-box-create form-box-create" name="form-create" method="POST" enctype="multipart/form-data">               
                <i class="fas fa-times icon-close icon"></i>
                <h1 class="content__form-header-create">Đăng kí thành viên ?</h1>
                <p><?php echo implode(' ', $msg); ?></p>
                <div class="content__form-box-group">
                    <div class="content__form-box-group-left">
                        <img src="img/people.jpg" alt="" class="content__form-box-group-left-img">
                    </div>
                    <div class="content__form-group-field">
                        <div class="content__form-group-field-box">
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Tài khoản ?</label>
                                 <input type="text" class="content__form-input-box" placeholder="Tài khoản" name="acc" required>
                             </div>
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Mật khẩu</label>
                                 <input type="password" class="content__form-input-box" placeholder="Mật khẩu" name="pwd" required>
                             </div>
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Nhập lại mật khẩu</label>
                                 <input type="password" class="content__form-input-box" placeholder="Nhập lại mật khẩu" name="retype_pwd" required>
                             </div>
                        </div>
                        <div class="content__form-group-field-box">
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Họ tên ?</label>
                                 <input type="text" class="content__form-input-box" placeholder="eg:hothichhuy" name="name" required>
                             </div>
                             
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Email</label>
                                 <input type="email" class="content__form-input-box" placeholder="eg:huyhtph07087@fpt.edu.vn" name="email" required>
                             </div>
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Quyền</label>
                                 <input type="radio" name="roles" value="0">
                                 <label for="html">Guest</label>
                                
                             </div>
                             <div class="content__form-field">
                                 <label for="" class="content__form-field-header-cre">Ảnh đại diện</label>
                                 <input type="file" class="picture-file"  name="file" required>
                             </div>
                        </div>
                    </div>
                </div>
                
                <div class="content__form-btn">
                    <button class="content__form-btn-create" name="btn-create">Đăng ký</button>
                </div>
            </form>
        </div>  