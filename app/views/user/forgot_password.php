<section class="container login">
    <div class="row">
        <div class="col-md-7 img">
            <img src="/public/Image/icon/authen.png" alt="learning english">
        </div>
        <div class="col-md-5">
            <div class="login-form">
                <div class="title">Quên mật khẩu</div>
                <hr>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="email" placeholder="Địa chỉ Email" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['email']))?$errors['email']:false; ?></div>
                    </div>
                    <?php echo (isset($msg))?'<div class="text-danger mb-3">* '.$msg.'</div>':false; ?>
                    <div class="mb-3">
                        <button class="btn btn-primary form-control">Lấy lại mật khẩu</button>
                    </div>
                </form>
                <a href="/dang-ky.html" class="btn btn-outline-primary d-block">Quay lại đăng nhập</a>
                <a href="/dang-nhap.html" class="action-theme mt-2 d-block">Tạo tài khoản mới</a>
            </div>
        </div>
    </div>
</section>