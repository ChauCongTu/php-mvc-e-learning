<section class="container login">
    <div class="row">
        <div class="col-md-7 img">
            <img src="/public/Image/icon/authen.png" alt="learning english">
        </div>
        <div class="col-md-5">
            <div class="login-form">
                <div class="title">Đăng nhập diễn đàn</div>
                <a href="" class="btn btn-primary form-control">Đăng nhập với Facebook</a>
                <a href="" class="btn btn-danger form-control mt-2">Đăng nhập với Google</a>
                <hr>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['username']))?$errors['username']:false; ?></div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['password']))?$errors['password']:false; ?></div>
                    </div>
                    <?php echo (isset($msg))?'<div class="text-danger mb-3">* '.$msg.'</div>':false; ?>
                    <div class="mb-3">
                        <button class="btn btn-primary form-control">Đăng nhập</button>
                    </div>
                </form>
                <a href="/dang-ky.html" class="btn btn-outline-primary d-block">Tạo tài khoản</a>
                <a href="/quen-mat-khau.html" class="action-theme mt-2 d-block">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
</section>